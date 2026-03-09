// Enhanced JavaScript for Best Website Experience

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // 1. Smooth Scroll to Top Button
    // ============================================
    createScrollTopButton();
    
    // ============================================
    // 2. Navbar Scroll Effect
    // ============================================
    handleNavbarScroll();
    
    // ============================================
    // 3. AOS (Animate On Scroll) Initialization
    // ============================================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    
    // ============================================
    // 4. Enhanced Button Click Effects
    // ============================================
    addRippleEffect();
    
    // ============================================
    // 5. Lazy Loading Images
    // ============================================
    lazyLoadImages();
    
    // ============================================
    // 6. Form Validation Enhancement
    // ============================================
    enhanceFormValidation();
    
    // ============================================
    // 7. Table Search & Filter
    // ============================================
    addTableSearch();
    
    // ============================================
    // 8. Performance Monitoring
    // ============================================
    logPerformance();
    
    // ============================================
    // 9. Accessibility Enhancements
    // ============================================
    enhanceAccessibility();
    
    // ============================================
    // 10. Service Worker Registration (PWA)
    // ============================================
    registerServiceWorker();
    
});

// ============================================
// Function Definitions
// ============================================

function createScrollTopButton() {
    // Create scroll to top button
    const scrollBtn = document.createElement('button');
    scrollBtn.id = 'scrollTopBtn';
    scrollBtn.innerHTML = '↑';
    scrollBtn.setAttribute('aria-label', 'Scroll to top');
    scrollBtn.setAttribute('title', 'Back to top');
    document.body.appendChild(scrollBtn);
    
    // Show/hide on scroll
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollBtn.style.display = 'flex';
            scrollBtn.style.animation = 'fadeInUp 0.3s';
        } else {
            scrollBtn.style.display = 'none';
        }
    });
    
    // Smooth scroll to top
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

function handleNavbarScroll() {
    const navbar = document.querySelector('.navbar-custom');
    if (!navbar) return;
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

function addRippleEffect() {
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
}

function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

function enhanceFormValidation() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                
                // Show validation feedback
                const invalidFields = this.querySelectorAll(':invalid');
                if (invalidFields.length > 0) {
                    invalidFields[0].focus();
                    if (typeof swal !== 'undefined') {
                        swal('Validation Error', 'Please fill in all required fields correctly.', 'error');
                    }
                }
            }
            this.classList.add('was-validated');
        });
    });
}

function addTableSearch() {
    const tables = document.querySelectorAll('table');
    tables.forEach(table => {
        // Create search input
        const searchWrapper = document.createElement('div');
        searchWrapper.className = 'mb-3';
        searchWrapper.innerHTML = `
            <input type="text" class="form-control" placeholder="🔍 Search table..." aria-label="Search table">
        `;
        
        if (table.parentElement) {
            table.parentElement.insertBefore(searchWrapper, table);
            
            const searchInput = searchWrapper.querySelector('input');
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        }
    });
}

function logPerformance() {
    if ('performance' in window) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log(`⚡ Page loaded in ${pageLoadTime}ms`);
            }, 0);
        });
    }
}

function enhanceAccessibility() {
    // Add skip to content link
    const skipLink = document.createElement('a');
    skipLink.href = '#main-content';
    skipLink.className = 'skip-link';
    skipLink.textContent = 'Skip to main content';
    skipLink.style.cssText = `
        position: absolute;
        top: -40px;
        left: 0;
        background: #000;
        color: #fff;
        padding: 8px;
        text-decoration: none;
        z-index: 100;
    `;
    skipLink.addEventListener('focus', () => {
        skipLink.style.top = '0';
    });
    skipLink.addEventListener('blur', () => {
        skipLink.style.top = '-40px';
    });
    document.body.insertBefore(skipLink, document.body.firstChild);
    
    // Ensure all images have alt text
    const images = document.querySelectorAll('img:not([alt])');
    images.forEach(img => {
        img.setAttribute('alt', 'Image');
    });
}

function registerServiceWorker() {
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            // Service worker registration would go here for PWA functionality
            console.log('✅ Service Worker support detected');
        });
    }
}

// ============================================
// Utility Functions
// ============================================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Copy to clipboard
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            if (typeof swal !== 'undefined') {
                swal('Copied!', 'Text copied to clipboard', 'success');
            }
        });
    }
}

// Show notification
function showNotification(title, message, type = 'info') {
    if (typeof swal !== 'undefined') {
        swal(title, message, type);
    } else {
        alert(`${title}: ${message}`);
    }
}

// Export functions for external use
window.injessview = {
    debounce,
    throttle,
    copyToClipboard,
    showNotification
};

console.log('✨ Injessview Enhanced JavaScript Loaded Successfully!');
