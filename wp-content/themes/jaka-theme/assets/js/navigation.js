/**
 * ChenXuan Robotics - Navigation Module
 */
(function() {
    'use strict';

    const DOM = {
        header: document.getElementById('site-header'),
        mobileMenu: document.getElementById('mobile-menu'),
        mobileToggle: document.getElementById('mobile-menu-toggle'),
        mobileClose: document.getElementById('mobile-menu-close'),
    };

    let lastScrollY = 0;
    let ticking = false;

    /* ── Sticky Header on Scroll ── */
    function handleScroll() {
        const scrollY = window.scrollY;
        if (DOM.header) {
            if (scrollY > 80) {
                DOM.header.classList.add('scrolled');
            } else {
                DOM.header.classList.remove('scrolled');
            }
            // Hide/show on scroll direction
            if (scrollY > 300) {
                if (scrollY > lastScrollY + 5) {
                    DOM.header.classList.add('header-hidden');
                } else if (scrollY < lastScrollY - 5) {
                    DOM.header.classList.remove('header-hidden');
                }
            } else {
                DOM.header.classList.remove('header-hidden');
            }
        }
        lastScrollY = scrollY;
        ticking = false;
    }

    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(handleScroll);
            ticking = true;
        }
    }, { passive: true });

    /* ── Mobile Menu Toggle ── */
    function openMobileMenu() {
        if (DOM.mobileMenu) {
            DOM.mobileMenu.classList.add('active');
            document.body.classList.add('menu-open');
            if (DOM.mobileToggle) {
                DOM.mobileToggle.querySelector('.hamburger').classList.add('active');
            }
        }
    }

    function closeMobileMenu() {
        if (DOM.mobileMenu) {
            DOM.mobileMenu.classList.remove('active');
            document.body.classList.remove('menu-open');
            if (DOM.mobileToggle) {
                DOM.mobileToggle.querySelector('.hamburger').classList.remove('active');
            }
        }
    }

    if (DOM.mobileToggle) {
        DOM.mobileToggle.addEventListener('click', function() {
            if (DOM.mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    if (DOM.mobileClose) {
        DOM.mobileClose.addEventListener('click', closeMobileMenu);
    }

    /* ── Mobile Submenu Accordion ── */
    document.querySelectorAll('.mobile-nav-item.has-children > a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            const isOpen = parent.classList.contains('open');

            // Close all others
            document.querySelectorAll('.mobile-nav-item.open').forEach(function(item) {
                if (item !== parent) item.classList.remove('open');
            });

            parent.classList.toggle('open', !isOpen);
        });
    });

    /* ── Mega Menu Desktop Interaction ── */
    const megaMenuItems = document.querySelectorAll('.menu-item.has-mega-menu');
    let megaTimeout;

    megaMenuItems.forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            clearTimeout(megaTimeout);
            // Close other mega menus
            megaMenuItems.forEach(function(other) {
                if (other !== item) other.classList.remove('mega-open');
            });
            item.classList.add('mega-open');
        });

        item.addEventListener('mouseleave', function() {
            megaTimeout = setTimeout(function() {
                item.classList.remove('mega-open');
            }, 150);
        });
    });

    /* ── Close mega menu on ESC ── */
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            megaMenuItems.forEach(function(item) {
                item.classList.remove('mega-open');
            });
            closeMobileMenu();
        }
    });

    /* ── Close mobile menu on resize ── */
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992 && DOM.mobileMenu && DOM.mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });

    /* ── Language Switcher ── */
    const langSwitcher = document.querySelector('.language-switcher');
    if (langSwitcher) {
        const langDropdown = langSwitcher.querySelector('.lang-dropdown');
        if (langDropdown) {
            langDropdown.querySelectorAll('a').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');
                    const lang = this.getAttribute('data-lang');
                    if (!href || !lang) return;

                    try {
                        document.cookie = 'jaka_lang=' + encodeURIComponent(lang) + '; path=/; max-age=31536000';
                        localStorage.removeItem('jaka_lang');
                        localStorage.removeItem('jaka_language');
                    } catch (err) {}

                    const target = new URL(href, window.location.href);
                    target.searchParams.set('lang', lang);
                    window.location.assign(target.toString());
                });
            });
        }
    }

})();
