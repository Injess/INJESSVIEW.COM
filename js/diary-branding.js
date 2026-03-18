(function (window) {
    'use strict';

    var STORAGE_KEY = 'public-service.diary.branding.v3';
    var LEGACY_STORAGE_KEY = 'injessview.diary.branding.v1';
    var LEGACY_STORAGE_KEY_V2 = 'injessview.diary.branding.v2';
    var BLANK_PROFILE_KEY = 'default-profile';
    var MAX_UPLOAD_BYTES = 2 * 1024 * 1024;
    var TARGET_MAX_BYTES = 380 * 1024;
    var MAX_WIDTH = 520;
    var MAX_HEIGHT = 260;

    function notify(title, message, type) {
        if (typeof window.swal === 'function') {
            window.swal(title, message, type || 'info');
            return;
        }
        window.alert(message);
    }

    function sanitizeOrgName(value) {
        var sanitized = String(value || '').replace(/\s+/g, ' ').trim();
        return sanitized.slice(0, 120);
    }

    function normalizeOrgKey(value) {
        var orgName = sanitizeOrgName(value);
        if (!orgName) {
            return BLANK_PROFILE_KEY;
        }
        return orgName.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '') || BLANK_PROFILE_KEY;
    }

    function createProfile(orgName, logoData, logoName) {
        var cleanOrgName = sanitizeOrgName(orgName);
        return {
            orgName: cleanOrgName,
            logoData: typeof logoData === 'string' ? logoData : '',
            logoName: typeof logoName === 'string' ? logoName : '',
            updatedAt: new Date().toISOString()
        };
    }

    function createStore() {
        return {
            activeOrgKey: '',
            profiles: {}
        };
    }

    function ensureStoreShape(store) {
        if (!store || typeof store !== 'object') {
            return createStore();
        }

        if (!store.profiles || typeof store.profiles !== 'object') {
            store.profiles = {};
        }

        Object.keys(store.profiles).forEach(function (key) {
            var profile = store.profiles[key] || {};
            store.profiles[key] = {
                orgName: sanitizeOrgName(profile.orgName || ''),
                logoData: typeof profile.logoData === 'string' ? profile.logoData : '',
                logoName: typeof profile.logoName === 'string' ? profile.logoName : '',
                updatedAt: profile.updatedAt || ''
            };
        });

        if (!store.activeOrgKey || !store.profiles[store.activeOrgKey]) {
            var keys = Object.keys(store.profiles);
            store.activeOrgKey = keys.length > 0 ? keys[0] : '';
        }

        return store;
    }

    function readLegacyProfile() {
        try {
            var raw = window.localStorage.getItem(LEGACY_STORAGE_KEY);
            if (!raw) {
                return null;
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return null;
            }
            var cleanOrgName = sanitizeOrgName(parsed.orgName || '');
            var logoData = typeof parsed.logoData === 'string' ? parsed.logoData : '';
            var logoName = typeof parsed.logoName === 'string' ? parsed.logoName : '';
            if (!cleanOrgName && !logoData) {
                return null;
            }
            return {
                orgName: cleanOrgName,
                logoData: logoData,
                logoName: logoName
            };
        } catch (error) {
            return null;
        }
    }

    function migrateLegacyStoreIfNeeded() {
        var legacy = readLegacyProfile();
        var rawV2 = null;

        if (!legacy) {
            try {
                rawV2 = window.localStorage.getItem(LEGACY_STORAGE_KEY_V2);
                if (rawV2) {
                    return ensureStoreShape(JSON.parse(rawV2));
                }
            } catch (error) {
                return createStore();
            }
        }

        if (!legacy) {
            return createStore();
        }

        var migrated = createStore();
        var key = normalizeOrgKey(legacy.orgName);
        migrated.activeOrgKey = key;
        migrated.profiles[key] = createProfile(legacy.orgName, legacy.logoData, legacy.logoName);

        try {
            window.localStorage.removeItem(LEGACY_STORAGE_KEY);
            window.localStorage.removeItem(LEGACY_STORAGE_KEY_V2);
        } catch (error) {
            return migrated;
        }

        return migrated;
    }

    function readStore() {
        try {
            var raw = window.localStorage.getItem(STORAGE_KEY);
            if (!raw) {
                return migrateLegacyStoreIfNeeded();
            }
            return ensureStoreShape(JSON.parse(raw));
        } catch (error) {
            return createStore();
        }
    }

    function saveStore(store) {
        try {
            window.localStorage.setItem(STORAGE_KEY, JSON.stringify(store));
            return true;
        } catch (error) {
            notify('Storage Limit Reached', 'Could not save branding profile in this browser. Try a smaller logo.', 'warning');
            return false;
        }
    }

    function clearAllProfiles() {
        try {
            window.localStorage.removeItem(STORAGE_KEY);
            window.localStorage.removeItem(LEGACY_STORAGE_KEY);
            window.localStorage.removeItem(LEGACY_STORAGE_KEY_V2);
        } catch (error) {
            return;
        }
    }

    function getOrCreateProfileByName(store, orgName, persist) {
        var cleanName = sanitizeOrgName(orgName);
        var key = normalizeOrgKey(cleanName);
        var profile = store.profiles[key];

        if (!profile) {
            profile = createProfile(cleanName, '', '');
            if (persist) {
                store.profiles[key] = profile;
            }
        } else if (!profile.orgName || profile.orgName !== cleanName) {
            profile.orgName = cleanName;
        }

        return {
            key: key,
            profile: profile
        };
    }

    function getActiveProfile(store) {
        store = ensureStoreShape(store || readStore());
        var profile = store.activeOrgKey && store.profiles[store.activeOrgKey]
            ? store.profiles[store.activeOrgKey]
            : { orgName: '', logoData: '', logoName: '', updatedAt: '' };
        return {
            orgName: profile.orgName,
            logoData: profile.logoData,
            logoName: profile.logoName,
            updatedAt: profile.updatedAt
        };
    }

    function setLogoPreview(previewElement, statusElement, logoData, logoName) {
        if (!previewElement) {
            return;
        }

        if (logoData) {
            previewElement.src = logoData;
            previewElement.style.display = 'block';
            if (statusElement) {
                statusElement.textContent = logoName ? ('Loaded: ' + logoName) : 'Logo ready';
            }
            return;
        }

        previewElement.removeAttribute('src');
        previewElement.style.display = 'none';
        if (statusElement) {
            statusElement.textContent = 'No logo selected';
        }
    }

    function dataUrlSizeBytes(dataUrl) {
        if (!dataUrl) {
            return 0;
        }
        var base64 = dataUrl.split(',')[1] || '';
        return Math.floor((base64.length * 3) / 4);
    }

    function resizeAndEncode(file) {
        return new Promise(function (resolve, reject) {
            var reader = new FileReader();

            reader.onerror = function () {
                reject(new Error('Unable to read the selected logo file.'));
            };

            reader.onload = function (event) {
                var image = new Image();

                image.onerror = function () {
                    reject(new Error('Invalid image file. Please choose another logo.'));
                };

                image.onload = function () {
                    var scale = Math.min(MAX_WIDTH / image.width, MAX_HEIGHT / image.height, 1);
                    var width = Math.max(1, Math.round(image.width * scale));
                    var height = Math.max(1, Math.round(image.height * scale));

                    var canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;

                    var context = canvas.getContext('2d');
                    context.fillStyle = '#ffffff';
                    context.fillRect(0, 0, width, height);
                    context.drawImage(image, 0, 0, width, height);

                    var quality = 0.92;
                    var encoded = canvas.toDataURL('image/jpeg', quality);

                    while (dataUrlSizeBytes(encoded) > TARGET_MAX_BYTES && quality > 0.55) {
                        quality -= 0.08;
                        encoded = canvas.toDataURL('image/jpeg', quality);
                    }

                    if (dataUrlSizeBytes(encoded) > TARGET_MAX_BYTES * 1.7) {
                        reject(new Error('Logo is still too large after compression. Use a simpler image.'));
                        return;
                    }

                    resolve(encoded);
                };

                image.src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    }

    function initForm(options) {
        var opts = options || {};

        var form = document.querySelector(opts.formSelector || 'form');
        if (!form) {
            return;
        }

        var orgInput = document.querySelector(opts.orgInputSelector);
        var logoInput = document.querySelector(opts.logoInputSelector);
        var logoPreview = document.querySelector(opts.logoPreviewSelector);
        var clearButton = document.querySelector(opts.clearButtonSelector);
        var hiddenOrg = opts.hiddenOrgSelector ? document.querySelector(opts.hiddenOrgSelector) : null;
        var hiddenLogo = opts.hiddenLogoSelector ? document.querySelector(opts.hiddenLogoSelector) : null;
        var logoStatus = document.querySelector(opts.logoStatusSelector);

        if (!orgInput || !logoInput) {
            return;
        }

        var store = ensureStoreShape(readStore());
        var active = getActiveProfile(store);
        var activeOrgName = active.orgName || '';

        function syncHiddenFields(profile) {
            if (!hiddenOrg && !hiddenLogo) return; // Hidden fields not present; skip sync
            var currentOrg = sanitizeOrgName(orgInput.value);
            if (hiddenOrg) hiddenOrg.value = currentOrg;
            if (hiddenLogo) hiddenLogo.value = profile && profile.logoData ? profile.logoData : '';
        }

        function applyProfileByOrgName(orgName, shouldPersistIfMissing) {
            var cleanOrgName = sanitizeOrgName(orgName);
            var resolved = getOrCreateProfileByName(store, cleanOrgName, false);
            var profile = resolved.profile;
            var key = resolved.key;
            var shouldPersistProfile = cleanOrgName !== '' || !!profile.logoData;

            store.activeOrgKey = shouldPersistProfile || store.profiles[key] ? key : '';
            activeOrgName = profile.orgName || '';
            orgInput.value = activeOrgName;

            setLogoPreview(logoPreview, logoStatus, profile.logoData, profile.logoName);
            syncHiddenFields(profile);

            if (shouldPersistIfMissing) {
                if (shouldPersistProfile) {
                    profile.updatedAt = new Date().toISOString();
                    store.profiles[key] = profile;
                    store.activeOrgKey = key;
                } else if (store.profiles[key]) {
                    delete store.profiles[key];
                    if (store.activeOrgKey === key) {
                        store.activeOrgKey = '';
                    }
                }

                saveStore(store);
            }

            return profile;
        }

        var initialProfile = applyProfileByOrgName(activeOrgName, false);
        syncHiddenFields(initialProfile);

        orgInput.addEventListener('input', function () {
            var candidateName = sanitizeOrgName(orgInput.value);
            var key = normalizeOrgKey(candidateName);
            var existingProfile = store.profiles[key];

            if (existingProfile) {
                setLogoPreview(logoPreview, logoStatus, existingProfile.logoData, existingProfile.logoName);
                syncHiddenFields(existingProfile);
                return;
            }

            setLogoPreview(logoPreview, logoStatus, '', '');
            syncHiddenFields({ logoData: '' });
        });

        orgInput.addEventListener('blur', function () {
            applyProfileByOrgName(orgInput.value, true);
        });

        logoInput.addEventListener('change', function () {
            var file = logoInput.files && logoInput.files[0];
            if (!file) {
                return;
            }

            var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
            if (allowedTypes.indexOf((file.type || '').toLowerCase()) === -1) {
                notify('Unsupported Logo Type', 'Please upload a PNG, JPG, or WEBP image.', 'error');
                logoInput.value = '';
                return;
            }

            if (file.size > MAX_UPLOAD_BYTES) {
                notify('Logo Too Large', 'Please upload a logo smaller than 2MB.', 'error');
                logoInput.value = '';
                return;
            }

            resizeAndEncode(file)
                .then(function (encodedLogo) {
                    var resolved = getOrCreateProfileByName(store, orgInput.value, true);
                    var key = resolved.key;
                    var profile = resolved.profile;

                    profile.logoData = encodedLogo;
                    profile.logoName = file.name;
                    profile.updatedAt = new Date().toISOString();

                    store.activeOrgKey = key;
                    store.profiles[key] = profile;

                    if (!saveStore(store)) {
                        return;
                    }

                    applyProfileByOrgName(profile.orgName, false);
                    logoInput.value = '';
                })
                .catch(function (error) {
                    notify('Logo Upload Failed', error.message || 'Unable to process logo. Try a different image.', 'error');
                    logoInput.value = '';
                });
        });

        if (clearButton) {
            clearButton.addEventListener('click', function () {
                var orgName = sanitizeOrgName(orgInput.value);
                var key = normalizeOrgKey(orgName);

                if (store.profiles[key]) {
                    delete store.profiles[key];
                }

                if (store.activeOrgKey === key) {
                    store.activeOrgKey = '';
                }

                saveStore(store);

                orgInput.value = orgName;
                setLogoPreview(logoPreview, logoStatus, '', '');
                syncHiddenFields({ logoData: '' });
                if (orgName) {
                    notify('Branding Cleared', 'Saved branding for "' + orgName + '" has been removed.', 'success');
                    return;
                }

                notify('Branding Cleared', 'Saved browser branding has been removed.', 'success');
            });
        }

        form.addEventListener('submit', function () {
            var activeProfile = applyProfileByOrgName(orgInput.value, true);
            syncHiddenFields(activeProfile);
        });
    }

    window.DiaryBranding = {
        initForm: initForm,
        readProfile: function () {
            return getActiveProfile(readStore());
        },
        clearProfile: clearAllProfiles
    };
})(window);
