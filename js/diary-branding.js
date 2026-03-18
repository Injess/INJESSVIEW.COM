(function (window) {
    'use strict';

    var STORAGE_KEY = 'injessview.diary.branding.v1';
    var DEFAULT_ORG_NAME = 'INJESSVIEW';
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

    function readProfile() {
        try {
            var raw = window.localStorage.getItem(STORAGE_KEY);
            if (!raw) {
                return null;
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return null;
            }
            return {
                orgName: sanitizeOrgName(parsed.orgName || ''),
                logoData: typeof parsed.logoData === 'string' ? parsed.logoData : '',
                logoName: typeof parsed.logoName === 'string' ? parsed.logoName : '',
                updatedAt: parsed.updatedAt || ''
            };
        } catch (error) {
            return null;
        }
    }

    function saveProfile(profile) {
        try {
            window.localStorage.setItem(STORAGE_KEY, JSON.stringify(profile));
            return true;
        } catch (error) {
            notify('Storage Limit Reached', 'Could not save branding profile in this browser. Try a smaller logo.', 'warning');
            return false;
        }
    }

    function clearProfile() {
        try {
            window.localStorage.removeItem(STORAGE_KEY);
        } catch (error) {
            return;
        }
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
        var hiddenOrg = document.querySelector(opts.hiddenOrgSelector);
        var hiddenLogo = document.querySelector(opts.hiddenLogoSelector);
        var logoStatus = document.querySelector(opts.logoStatusSelector);

        if (!orgInput || !logoInput || !hiddenOrg || !hiddenLogo) {
            return;
        }

        var profile = readProfile() || {
            orgName: DEFAULT_ORG_NAME,
            logoData: '',
            logoName: '',
            updatedAt: ''
        };

        function syncHiddenFields() {
            var currentOrg = sanitizeOrgName(orgInput.value) || DEFAULT_ORG_NAME;
            hiddenOrg.value = currentOrg;
            hiddenLogo.value = profile.logoData || '';
        }

        function persistOrganizationName() {
            profile.orgName = sanitizeOrgName(orgInput.value) || DEFAULT_ORG_NAME;
            profile.updatedAt = new Date().toISOString();
            saveProfile(profile);
            syncHiddenFields();
        }

        orgInput.value = profile.orgName || DEFAULT_ORG_NAME;
        setLogoPreview(logoPreview, logoStatus, profile.logoData, profile.logoName);
        syncHiddenFields();

        orgInput.addEventListener('input', persistOrganizationName);
        orgInput.addEventListener('blur', persistOrganizationName);

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
                    profile.orgName = sanitizeOrgName(orgInput.value) || DEFAULT_ORG_NAME;
                    profile.logoData = encodedLogo;
                    profile.logoName = file.name;
                    profile.updatedAt = new Date().toISOString();

                    if (!saveProfile(profile)) {
                        return;
                    }

                    setLogoPreview(logoPreview, logoStatus, profile.logoData, profile.logoName);
                    syncHiddenFields();
                    logoInput.value = '';
                })
                .catch(function (error) {
                    notify('Logo Upload Failed', error.message || 'Unable to process logo. Try a different image.', 'error');
                    logoInput.value = '';
                });
        });

        if (clearButton) {
            clearButton.addEventListener('click', function () {
                clearProfile();
                profile = {
                    orgName: DEFAULT_ORG_NAME,
                    logoData: '',
                    logoName: '',
                    updatedAt: ''
                };
                orgInput.value = DEFAULT_ORG_NAME;
                logoInput.value = '';
                setLogoPreview(logoPreview, logoStatus, '', '');
                syncHiddenFields();
                notify('Branding Reset', 'Organization branding has been reset for this browser.', 'success');
            });
        }

        form.addEventListener('submit', function () {
            persistOrganizationName();
            syncHiddenFields();
        });
    }

    window.DiaryBranding = {
        initForm: initForm,
        readProfile: readProfile,
        clearProfile: clearProfile
    };
})(window);
