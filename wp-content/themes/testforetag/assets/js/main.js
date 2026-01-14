/**
 * Testföretag Theme JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initStickyHeader();
        initCookieConsent();
        initModals();
        initFilterTags();
        initSmoothScroll();
    });

    /**
     * Mobile Menu
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mobileNav = document.querySelector('.mobile-navigation');
        const mobileOverlay = document.querySelector('.mobile-overlay');

        if (!menuToggle || !mobileNav) return;

        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            this.setAttribute('aria-expanded', !isExpanded);
            this.classList.toggle('active');
            mobileNav.classList.toggle('active');
            mobileNav.setAttribute('aria-hidden', isExpanded);
            
            if (mobileOverlay) {
                mobileOverlay.classList.toggle('active');
            }

            // Prevent body scroll when menu is open
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Close menu when clicking overlay
        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function() {
                menuToggle.click();
            });
        }

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                menuToggle.click();
            }
        });
    }

    /**
     * Sticky Header Shadow
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Cookie Consent
     */
    function initCookieConsent() {
        const cookieConsent = document.getElementById('cookie-consent');
        const cookieModal = document.getElementById('cookie-modal');
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');
        const settingsBtn = document.getElementById('cookie-settings');
        const saveSettingsBtn = document.getElementById('save-cookie-settings');
        const modalCloseBtn = document.querySelector('#cookie-modal .modal-close');
        const modalCloseBtnAlt = document.getElementById('modal-close');
        const settingsLink = document.getElementById('cookie-settings-link');

        if (!cookieConsent) return;

        // Check if user has already made a choice
        const cookieChoice = localStorage.getItem('cookieConsent');
        if (!cookieChoice) {
            setTimeout(function() {
                cookieConsent.classList.add('active');
            }, 1000);
        }

        // Accept cookies
        if (acceptBtn) {
            acceptBtn.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'accepted');
                localStorage.setItem('analyticsCookies', 'true');
                localStorage.setItem('marketingCookies', 'true');
                cookieConsent.classList.remove('active');
            });
        }

        // Reject cookies
        if (rejectBtn) {
            rejectBtn.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'rejected');
                localStorage.setItem('analyticsCookies', 'false');
                localStorage.setItem('marketingCookies', 'false');
                cookieConsent.classList.remove('active');
            });
        }

        // Open settings modal
        function openCookieModal() {
            if (cookieModal) {
                cookieModal.classList.add('active');
                document.body.style.overflow = 'hidden';

                // Set checkboxes based on saved preferences
                const analyticsCheckbox = document.getElementById('analytics-cookies');
                const marketingCheckbox = document.getElementById('marketing-cookies');
                
                if (analyticsCheckbox) {
                    analyticsCheckbox.checked = localStorage.getItem('analyticsCookies') === 'true';
                }
                if (marketingCheckbox) {
                    marketingCheckbox.checked = localStorage.getItem('marketingCookies') === 'true';
                }
            }
        }

        if (settingsBtn) {
            settingsBtn.addEventListener('click', openCookieModal);
        }

        if (settingsLink) {
            settingsLink.addEventListener('click', function(e) {
                e.preventDefault();
                openCookieModal();
            });
        }

        // Close modal
        function closeCookieModal() {
            if (cookieModal) {
                cookieModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        if (modalCloseBtn) {
            modalCloseBtn.addEventListener('click', closeCookieModal);
        }

        if (modalCloseBtnAlt) {
            modalCloseBtnAlt.addEventListener('click', closeCookieModal);
        }

        // Save settings
        if (saveSettingsBtn) {
            saveSettingsBtn.addEventListener('click', function() {
                const analyticsCheckbox = document.getElementById('analytics-cookies');
                const marketingCheckbox = document.getElementById('marketing-cookies');

                localStorage.setItem('cookieConsent', 'custom');
                localStorage.setItem('analyticsCookies', analyticsCheckbox ? analyticsCheckbox.checked : false);
                localStorage.setItem('marketingCookies', marketingCheckbox ? marketingCheckbox.checked : false);

                closeCookieModal();
                cookieConsent.classList.remove('active');
            });
        }

        // Close on background click
        if (cookieModal) {
            cookieModal.addEventListener('click', function(e) {
                if (e.target === cookieModal) {
                    closeCookieModal();
                }
            });
        }
    }

    /**
     * Property and Premises Modals
     */
    function initModals() {
        // Property modal
        const propertyModal = document.getElementById('property-modal');
        const propertyButtons = document.querySelectorAll('.open-property-modal');

        propertyButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const title = this.dataset.title;
                const location = this.dataset.location;
                const area = this.dataset.area;
                const type = this.dataset.type;
                const image = this.dataset.image;

                document.getElementById('modal-property-title').textContent = title;
                document.getElementById('modal-property-location').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> ' + location;
                document.getElementById('modal-property-area').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg> ' + area + ' m²';
                document.getElementById('modal-property-type').textContent = type;
                document.getElementById('modal-property-image').src = image;

                propertyModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Premises modal
        const premisesModal = document.getElementById('premises-modal');
        const premisesButtons = document.querySelectorAll('.open-premises-modal');

        premisesButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const title = this.dataset.title;
                const address = this.dataset.address;
                const area = this.dataset.area;
                const rent = this.dataset.rent;
                const type = this.dataset.type;
                const availability = this.dataset.availability;
                const image = this.dataset.image;

                document.getElementById('modal-premises-title').textContent = title;
                document.getElementById('modal-premises-address').textContent = address;
                document.getElementById('modal-premises-area').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg> ' + area + ' m²';
                document.getElementById('modal-premises-rent').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> ' + rent + ' kr/m²/år';
                document.getElementById('modal-premises-type').textContent = type;
                document.getElementById('modal-premises-availability').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> ' + availability;
                document.getElementById('modal-premises-image').src = image;

                premisesModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close modals
        document.querySelectorAll('.modal-close, .modal-close-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        // Close on background click
        document.querySelectorAll('.modal').forEach(function(modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        // Close on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.active').forEach(function(modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
        });
    }

    /**
     * Filter Tags
     */
    function initFilterTags() {
        const filterTags = document.querySelectorAll('.filter-tag');
        const cards = document.querySelectorAll('.property-card, .premises-card');

        filterTags.forEach(function(tag) {
            tag.addEventListener('click', function() {
                const filter = this.dataset.filter;

                // Update active state
                filterTags.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Filter cards
                cards.forEach(function(card) {
                    if (filter === 'all' || card.dataset.type === filter) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update results count
                const visibleCards = document.querySelectorAll('.property-card:not([style*="display: none"]), .premises-card:not([style*="display: none"])');
                const resultsCount = document.getElementById('results-count');
                if (resultsCount) {
                    resultsCount.textContent = visibleCards.length + ' lokaler hittade';
                }
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

})();
