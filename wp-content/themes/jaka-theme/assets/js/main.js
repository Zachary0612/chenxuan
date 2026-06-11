/**
 * ChenXuan Robotics - Main JavaScript
 */
(function() {
    'use strict';

    /* ══ AOS Init ══ */
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
            disable: function() { return window.innerWidth < 576; }
        });
    }

    function refreshAOS() {
        if (typeof AOS === 'undefined') return;
        window.setTimeout(function() {
            if (typeof AOS.refreshHard === 'function') {
                AOS.refreshHard();
            } else if (typeof AOS.refresh === 'function') {
                AOS.refresh();
            }
        }, 220);
    }

    /* ══ GSAP ScrollTrigger Animations ══ */
    function initGSAP() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        // Parallax hero background
        if (document.querySelector('.hero-slide-overlay')) {
            gsap.to('.hero-slide-overlay', {
                scrollTrigger: {
                    trigger: '.hero-section',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                },
                opacity: 0.95
            });
        }

        // Hero content parallax
        if (document.querySelector('.hero-slide-content')) {
            gsap.to('.hero-slide-content', {
                scrollTrigger: {
                    trigger: '.hero-section',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                },
                y: 100,
                opacity: 0.3
            });
        }

        // Section headers reveal
        gsap.utils.toArray('.section-header:not([data-aos])').forEach(function(header) {
            gsap.from(header, {
                scrollTrigger: {
                    trigger: header,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                ease: 'power3.out'
            });
        });


        // Stagger product cards
        gsap.utils.toArray('.product-grid').forEach(function(grid) {
            gsap.from(grid.children, {
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 85%'
                },
                y: 60,
                opacity: 0,
                duration: 0.6,
                stagger: 0.1,
                ease: 'power3.out'
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initGSAP);

    function initHomeSolutionsScroll(swiper) {
        if (!swiper || typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
        var section = document.querySelector('.home-solutions-section');
        if (!section || !window.matchMedia('(min-width: 1024px)').matches) return;

        var scrollLength = function() {
            return Math.max(window.innerHeight * 1.55, swiper.slides.length * 300);
        };

        ScrollTrigger.create({
            id: 'home-solutions-scroll',
            trigger: section,
            start: 'top top+=8',
            end: function() { return '+=' + scrollLength(); },
            scrub: 0.7,
            pin: true,
            anticipatePin: 1,
            invalidateOnRefresh: true,
            onUpdate: function(self) {
                swiper.setProgress(self.progress, 0);
            }
        });
    }

    /* ══ Swiper Carousels ══ */
    function initSwipers() {
        if (typeof Swiper === 'undefined') return;

        // Hero Banner Swiper
        new Swiper('.hero-swiper', {
            slidesPerView: 1,
            loop: true,
            autoHeight: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            speed: 800,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            pagination: {
                el: '.hero-section .swiper-pagination',
                clickable: true
            },
            simulateTouch: false,
            touchStartPreventDefault: false,
            passiveListeners: true
        });

        // Product Showcase Swiper (i_part1)
        if (document.querySelector('.product-showcase-swiper')) {
            new Swiper('.product-showcase-swiper', {
                slidesPerView: 1,
                loop: true,
                autoplay: { delay: 4000, disableOnInteraction: false },
                speed: 600,
                pagination: {
                    el: '.showcase-pagination',
                    clickable: true
                }
            });
        }

        // Solutions Swiper
        if (document.querySelector('.solutions-swiper')) {
            var solutionsSwiper = new Swiper('.solutions-swiper', {
                slidesPerView: 1.15,
                spaceBetween: 20,
                centeredSlides: false,
                grabCursor: true,
                speed: 650,
                watchOverflow: false,
                pagination: {
                    el: '.solutions-pagination',
                    clickable: true
                },
                navigation: {
                    prevEl: '.solutions-prev',
                    nextEl: '.solutions-next'
                },
                breakpoints: {
                    576: { slidesPerView: 1.5, spaceBetween: 20 },
                    768: { slidesPerView: 2.2, spaceBetween: 24 },
                    992: { slidesPerView: 3, spaceBetween: 24 },
                    1200: { slidesPerView: 3.35, spaceBetween: 28 },
                    1600: { slidesPerView: 3.65, spaceBetween: 30 }
                }
            });
            initHomeSolutionsScroll(solutionsSwiper);
        }

        if (document.querySelector('.about-timeline-swiper')) {
            var timelineRail = document.querySelector('.about-timeline-rail');
            var timelineRailItems = document.querySelectorAll('.about-timeline-rail [data-timeline-index]');
            var timelinePhaseItems = document.querySelectorAll('.about-history-tab[data-timeline-index]');
            var updateTimelineRail = function(active) {
                var total = timelineRailItems.length;
                var safeActive = Math.max(0, Math.min(active || 0, total - 1));
                var activeSlide = document.querySelectorAll('.about-timeline-card')[safeActive];
                var activePhase = activeSlide ? activeSlide.getAttribute('data-history-phase') : '0';

                timelineRailItems.forEach(function(item, index) {
                    var isActive = index === safeActive;
                    item.classList.toggle('is-active', isActive);
                    if (isActive) {
                        item.setAttribute('aria-current', 'true');
                    } else {
                        item.removeAttribute('aria-current');
                    }
                });

                timelinePhaseItems.forEach(function(item) {
                    var isPhaseActive = item.getAttribute('data-history-phase') === activePhase;
                    item.classList.toggle('is-active', isPhaseActive);
                    if (isPhaseActive) {
                        item.setAttribute('aria-current', 'true');
                    } else {
                        item.removeAttribute('aria-current');
                    }
                });

                if (timelineRail && total > 1) {
                    timelineRail.style.setProperty('--timeline-progress', ((safeActive / (total - 1)) * 100) + '%');
                }
            };
            var timelineSwiper = new Swiper('.about-timeline-swiper', {
                slidesPerView: 1.08,
                spaceBetween: 24,
                centeredSlides: true,
                initialSlide: 1,
                grabCursor: true,
                watchSlidesProgress: true,
                slideToClickedSlide: true,
                speed: 650,
                navigation: {
                    prevEl: '.about-timeline-prev',
                    nextEl: '.about-timeline-next'
                },
                breakpoints: {
                    640: { slidesPerView: 1.55, spaceBetween: 24 },
                    992: { slidesPerView: 3, spaceBetween: 30 },
                    1366: { slidesPerView: 3, spaceBetween: 36 }
                },
                on: {
                    slideChange: function() {
                        updateTimelineRail(this.activeIndex || 0);
                    }
                }
            });
            timelineRailItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var targetIndex = parseInt(item.getAttribute('data-timeline-index'), 10);
                    if (!Number.isNaN(targetIndex)) {
                        timelineSwiper.slideTo(targetIndex);
                    }
                });
            });
            timelinePhaseItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var targetIndex = parseInt(item.getAttribute('data-timeline-index'), 10);
                    if (!Number.isNaN(targetIndex)) {
                        timelineSwiper.slideTo(targetIndex);
                    }
                });
            });
            updateTimelineRail(timelineSwiper.activeIndex || 0);
        }

        refreshAOS();
    }

    document.addEventListener('DOMContentLoaded', initSwipers);
    window.addEventListener('load', refreshAOS);

    /* ══ Product Tab Switching ══ */
    function initProductTabs() {
        var tabs = document.querySelectorAll('.product-tab[data-tab]');
        var panels = document.querySelectorAll('.product-panel');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                var target = this.getAttribute('data-tab');

                tabs.forEach(function(t) { t.classList.remove('active'); });
                panels.forEach(function(p) { p.classList.remove('active'); });

                this.classList.add('active');
                var targetPanel = document.getElementById('panel-' + target);
                if (targetPanel) {
                    targetPanel.classList.add('active');
                    // Re-init swiper if needed
                    var swiperEl = targetPanel.querySelector('.swiper');
                    if (swiperEl && swiperEl.swiper) {
                        swiperEl.swiper.update();
                    }
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initProductTabs);

    /* ══ Case Filters ══ */
    function initCaseFilters() {
        var buttons = document.querySelectorAll('[data-case-filter-type][data-case-filter]');
        var cards = document.querySelectorAll('.case-card[data-case-industry][data-case-application]');
        var empty = document.querySelector('.case-empty');
        if (!buttons.length || !cards.length) return;

        var filters = { industry: 'all', application: 'all' };
        function applyFilters() {
            var visibleCount = 0;
            cards.forEach(function(card) {
                var industry = card.getAttribute('data-case-industry');
                var application = card.getAttribute('data-case-application');
                var show = (filters.industry === 'all' || industry === filters.industry) &&
                    (filters.application === 'all' || application === filters.application);
                card.style.display = show ? '' : 'none';
                if (show) visibleCount += 1;
            });
            if (empty) empty.style.display = visibleCount ? 'none' : '';
        }

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var type = button.getAttribute('data-case-filter-type');
                var value = button.getAttribute('data-case-filter');
                if (!filters.hasOwnProperty(type)) return;
                filters[type] = value;

                var row = button.closest('.case-filter-row');
                var rowButtons = row ? row.querySelectorAll('[data-case-filter-type="' + type + '"]') : buttons;
                rowButtons.forEach(function(el) { el.classList.remove('active'); });
                button.classList.add('active');
                applyFilters();
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initCaseFilters);

    /* ══ News Filters ══ */
    function initProductFilters() {
        var sidebar = document.getElementById('pls-sidebar');
        var results = document.getElementById('products-list');
        if (!sidebar || !results) return;

        var links = sidebar.querySelectorAll('.pls-first[data-product-filter]');
        var cards = document.querySelectorAll('.pls-product-box[data-product-family]');
        var title = document.getElementById('pls-results-title');
        var count = document.getElementById('pls-results-count');
        if (!links.length || !cards.length) return;

        var params = new URLSearchParams(window.location.search);
        var activeFilter = params.get('product_category') || results.getAttribute('data-initial-product-filter') || links[0].getAttribute('data-product-filter');

        function applyProductFilter(filter, updateUrl) {
            var visibleCount = 0;
            var activeLink = null;

            links.forEach(function(link) {
                var isActive = link.getAttribute('data-product-filter') === filter;
                link.classList.toggle('act', isActive);
                link.setAttribute('aria-current', isActive ? 'true' : 'false');
                var box = link.closest('.pls-first-box');
                if (box) box.classList.toggle('active', isActive);
                if (isActive) activeLink = link;
            });

            if (!activeLink) {
                activeLink = links[0];
                filter = activeLink.getAttribute('data-product-filter');
                activeLink.classList.add('act');
            }

            cards.forEach(function(card) {
                var show = card.getAttribute('data-product-family') === filter;
                card.hidden = !show;
                if (show) visibleCount += 1;
            });

            if (title && activeLink) title.textContent = activeLink.textContent.trim();
            if (count) {
                var isChinese = (document.documentElement.lang || '').toLowerCase().indexOf('zh') === 0;
                count.textContent = isChinese ? visibleCount + ' 个产品' : visibleCount + ' products';
            }

            if (updateUrl && window.history && window.history.replaceState) {
                var nextUrl = new URL(window.location.href);
                nextUrl.searchParams.set('product_category', filter);
                nextUrl.hash = 'products-list';
                window.history.replaceState({}, '', nextUrl.toString());
            }
        }

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                activeFilter = link.getAttribute('data-product-filter');
                applyProductFilter(activeFilter, true);
            });
        });

        applyProductFilter(activeFilter, false);
    }

    document.addEventListener('DOMContentLoaded', initProductFilters);

    function initNewsFilters() {
        var filterWrap = document.querySelector('.news-filter');
        if (!filterWrap) return;
        var buttons = filterWrap.querySelectorAll('.filter-btn[data-filter]');
        var cards = document.querySelectorAll('[data-news-filter]');
        var search = document.getElementById('news-search-input');
        var empty = document.querySelector('.news-empty-state');
        if (!buttons.length || !cards.length) return;

        var params = new URLSearchParams(window.location.search);
        var activeFilter = params.get('news_category') || 'all';
        var searchTerm = params.get('q') || '';

        function applyNewsFilters(updateUrl) {
            var visibleCount = 0;
            var normalizedSearch = searchTerm.trim().toLowerCase();

            cards.forEach(function(card) {
                var cardFilter = card.getAttribute('data-news-filter');
                var searchable = (card.getAttribute('data-news-search') || card.textContent || '').toLowerCase();
                var matchesCategory = activeFilter === 'all' || cardFilter === activeFilter;
                var matchesSearch = !normalizedSearch || searchable.indexOf(normalizedSearch) !== -1;
                var show = matchesCategory && matchesSearch;
                card.hidden = !show;
                if (show) visibleCount += 1;
            });

            buttons.forEach(function(button) {
                var isActive = button.getAttribute('data-filter') === activeFilter;
                button.classList.toggle('active', isActive);
                button.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            if (empty) empty.hidden = visibleCount > 0;

            if (updateUrl && window.history && window.history.replaceState) {
                var nextUrl = new URL(window.location.href);
                if (activeFilter === 'all') nextUrl.searchParams.delete('news_category');
                else nextUrl.searchParams.set('news_category', activeFilter);
                if (normalizedSearch) nextUrl.searchParams.set('q', searchTerm.trim());
                else nextUrl.searchParams.delete('q');
                window.history.replaceState({}, '', nextUrl.toString());
            }
        }

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                activeFilter = button.getAttribute('data-filter');
                applyNewsFilters(true);
            });
        });

        if (search) {
            search.value = searchTerm;
            search.addEventListener('input', function() {
                searchTerm = search.value;
                applyNewsFilters(true);
            });
        }

        var validFilter = Array.prototype.some.call(buttons, function(button) {
            return button.getAttribute('data-filter') === activeFilter;
        });
        if (!validFilter) activeFilter = 'all';
        applyNewsFilters(false);
    }

    document.addEventListener('DOMContentLoaded', initNewsFilters);


    /* ══ Fixed Sidebar Visibility ══ */
    function initFixedSidebar() {
        var sidebar = document.getElementById('fixed-sidebar');

        window.addEventListener('scroll', function() {
            if (sidebar) {
                if (window.scrollY > 400) { sidebar.classList.add('visible'); }
                else { sidebar.classList.remove('visible'); }
            }
        }, { passive: true });

        // Back to top
        var backToTop = document.getElementById('back-to-top');
        if (backToTop) {
            backToTop.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    }

    document.addEventListener('DOMContentLoaded', initFixedSidebar);

    /* ══ Cookie Notice ══ */
    function initCookieNotice() {
        var notice = document.getElementById('cookie-notice');
        if (!notice) return;

        var accepted = localStorage.getItem('jaka_cookie_accepted');
        if (!accepted) {
            setTimeout(function() {
                notice.classList.add('visible');
            }, 3000);
        }

        var acceptBtn = document.getElementById('cookie-accept');
        var declineBtn = document.getElementById('cookie-decline');

        if (acceptBtn) {
            acceptBtn.addEventListener('click', function() {
                localStorage.setItem('jaka_cookie_accepted', 'true');
                notice.classList.remove('visible');
            });
        }
        if (declineBtn) {
            declineBtn.addEventListener('click', function() {
                localStorage.setItem('jaka_cookie_accepted', 'declined');
                notice.classList.remove('visible');
            });
        }
    }

    document.addEventListener('DOMContentLoaded', initCookieNotice);

    /* ══ Consult Modal ══ */
    function initConsultModal() {
        var overlay = document.getElementById('consult-overlay');
        var openBtn = document.getElementById('open-consult');
        var closeBtn = document.getElementById('consult-close');
        if (!overlay || !openBtn) return;

        openBtn.addEventListener('click', function() {
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', initConsultModal);

    /* ══ Product Sidebar Tree ══ */
    function initProductSidebar() {
        var thirdItems = document.querySelectorAll('.pls-third-item');
        thirdItems.forEach(function(item) {
            item.addEventListener('click', function() {
                var fourList = item.nextElementSibling;
                if (!fourList || !fourList.classList.contains('pls-four-list')) return;
                var isExpanded = item.classList.contains('expanded');
                if (isExpanded) {
                    item.classList.remove('expanded');
                    fourList.style.display = 'none';
                } else {
                    item.classList.add('expanded');
                    fourList.style.display = 'block';
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initProductSidebar);

    /* ══ Download Center Sidebar Tree ══ */
    function initDownloadSidebar() {
        var tree = document.querySelector('.dlc-tree');
        if (!tree) return;

        var allItems = tree.querySelectorAll('.dlc-tree-item[data-filter]');
        var rows = document.querySelectorAll('.dlc-row[data-cat]');
        var dlcGroups = document.querySelectorAll('.dlc-group[data-group]');
        var groups = tree.querySelectorAll('.dlc-tree-group');

        // Toggle expand/collapse
        groups.forEach(function(group) {
            var parent = group.querySelector('.dlc-tree-parent');
            if (parent) {
                parent.addEventListener('click', function() {
                    group.classList.toggle('expanded');
                });
            }
        });

        // Filter rows on click
        allItems.forEach(function(item) {
            item.addEventListener('click', function() {
                allItems.forEach(function(el) { el.classList.remove('active'); });
                item.classList.add('active');

                var filter = item.getAttribute('data-filter');
                var parentGroup = item.closest('.dlc-tree-group');
                if (parentGroup) parentGroup.classList.add('expanded');

                var childFilters = [];
                if (parentGroup && item.classList.contains('dlc-tree-parent')) {
                    parentGroup.querySelectorAll('.dlc-tree-child').forEach(function(child) {
                        childFilters.push(child.getAttribute('data-filter'));
                    });
                }

                rows.forEach(function(row) {
                    var cat = row.getAttribute('data-cat');
                    var show = filter === 'all' ||
                        cat === filter ||
                        (childFilters.length > 0 && childFilters.indexOf(cat) !== -1);
                    row.classList.toggle('hidden', !show);
                });
                dlcGroups.forEach(function(g) {
                    var groupRows = g.querySelectorAll('.dlc-row');
                    var anyVisible = Array.prototype.some.call(groupRows, function(r) { return !r.classList.contains('hidden'); });
                    g.style.display = anyVisible ? '' : 'none';
                });
            });
        });

        // Search filtering
        var searchInput = document.querySelector('.dlc-search-input');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                var q = this.value.trim().toLowerCase();
                rows.forEach(function(row) {
                    var name = row.querySelector('.dlc-file-name');
                    var text = name ? name.textContent.toLowerCase() : '';
                    row.classList.toggle('hidden', q !== '' && text.indexOf(q) === -1);
                });
                dlcGroups.forEach(function(g) {
                    var groupRows = g.querySelectorAll('.dlc-row');
                    var anyVisible = Array.prototype.some.call(groupRows, function(r) { return !r.classList.contains('hidden'); });
                    g.style.display = anyVisible ? '' : 'none';
                });
            });
        }
    }
    document.addEventListener('DOMContentLoaded', initDownloadSidebar);

    /* ══ Lead Form AJAX Submit ══ */
    function initSoftFormSubmit() {
        var forms = document.querySelectorAll('#contact-form, #consult-form, .jp-apply-form');
        if (!forms.length) return;

        var successText = (window.jakaData && window.jakaData.formSuccess) ||
            '需求已收到，辰轩工程团队将尽快与您联系。';
        var errorText = (window.jakaData && window.jakaData.formError) ||
            '提交失败，请稍后再试。';
        var submittingText = (window.jakaData && window.jakaData.formSubmitting) ||
            '提交中...';

        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (typeof form.reportValidity === 'function' && !form.reportValidity()) return;

                var submit = form.querySelector('[type="submit"]');
                var message = form.querySelector('.form-success-message');
                if (!message) {
                    message = document.createElement('div');
                    message.className = 'form-success-message';
                    message.setAttribute('role', 'status');
                    if (submit && submit.parentNode) {
                        submit.parentNode.insertBefore(message, submit.nextSibling);
                    } else {
                        form.appendChild(message);
                    }
                }

                var formData = new FormData(form);
                formData.append('action', 'chenxuan_submit_lead');
                formData.append('nonce', window.jakaData ? window.jakaData.nonce : '');
                formData.append('page_url', window.location.href);
                if (!formData.get('source')) {
                    formData.append('source', form.id || form.className || 'website');
                }

                var originalText = submit ? submit.textContent : '';
                if (submit) {
                    submit.disabled = true;
                    submit.classList.add('is-loading');
                    submit.textContent = submittingText;
                }
                message.classList.remove('is-error');
                message.textContent = submittingText;

                fetch(window.jakaData ? window.jakaData.ajaxUrl : '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData,
                }).then(function(response) {
                    return response.json();
                }).then(function(res) {
                    var ok = !!(res && res.success);
                    var payload = res && res.data ? res.data : {};
                    message.classList.toggle('is-error', !ok);
                    message.textContent = payload.message || (ok ? successText : errorText);
                    if (ok) {
                        form.reset();
                    }
                }).catch(function() {
                    message.classList.add('is-error');
                    message.textContent = errorText;
                }).finally(function() {
                    if (submit) {
                        submit.disabled = false;
                        submit.classList.remove('is-loading');
                        submit.textContent = originalText;
                    }
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initSoftFormSubmit);

    /* ══ Search Overlay Toggle ══ */
    function initSearchOverlay() {
        var btn = document.getElementById('header-search-btn');
        var overlay = document.getElementById('search-overlay');
        var closeBtn = document.getElementById('search-overlay-close');
        if (!btn || !overlay) return;
        var input = overlay.querySelector('.search-overlay-input');
        function open() {
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            setTimeout(function() { if (input) input.focus(); }, 50);
        }
        function close() {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
        btn.addEventListener('click', open);
        if (closeBtn) closeBtn.addEventListener('click', close);
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) close();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) close();
        });
    }
    document.addEventListener('DOMContentLoaded', initSearchOverlay);

    /* ══ Hero Particles (CSS-enhanced) ══ */
    function initHeroParticles() {
        var container = document.getElementById('hero-particles');
        if (!container) return;

        for (var i = 0; i < 30; i++) {
            var dot = document.createElement('div');
            dot.style.cssText =
                'position:absolute;' +
                'width:' + (Math.random() * 4 + 1) + 'px;' +
                'height:' + (Math.random() * 4 + 1) + 'px;' +
                'background:rgba(216,12,30,' + (Math.random() * 0.2 + 0.05) + ');' +
                'border-radius:50%;' +
                'top:' + (Math.random() * 100) + '%;' +
                'left:' + (Math.random() * 100) + '%;' +
                'animation:float ' + (Math.random() * 8 + 6) + 's ease-in-out infinite ' + (Math.random() * 5) + 's;' +
                'pointer-events:none;';
            container.appendChild(dot);
        }
    }

    document.addEventListener('DOMContentLoaded', initHeroParticles);

    /* ══ Stats Counter Animation ══ */
    function initStatsCounter() {
        var counters = document.querySelectorAll('.stat-number[data-count]');
        if (!counters.length) return;

        function animateCounter(el) {
            if (el.dataset.counted) return;
            el.dataset.counted = '1';
            var target = parseInt(el.dataset.count, 10);
            var valueEl = el.querySelector('.stat-count') || el;
            if (Number.isNaN(target)) return;

            var duration = 1800;
            var startTime = null;
            valueEl.textContent = '0';

            function step(ts) {
                if (!startTime) startTime = ts;
                var progress = Math.min((ts - startTime) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                valueEl.textContent = Math.floor(eased * target);
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    valueEl.textContent = target;
                }
            }

            requestAnimationFrame(step);
        }

        counters.forEach(function(counter) {
            var valueEl = counter.querySelector('.stat-count');
            if (valueEl) valueEl.textContent = '0';
        });

        if (!('IntersectionObserver' in window)) {
            counters.forEach(animateCounter);
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (!entry.isIntersecting) return;
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.3 });

        counters.forEach(function(c) { observer.observe(c); });
    }
    document.addEventListener('DOMContentLoaded', initStatsCounter);


    /* ══ Custom Cursor Follower ══ */
    function initCursorFollower() {
        if (window.innerWidth < 992) return;
        if ('ontouchstart' in window) return;

        var cursor = document.createElement('div');
        cursor.className = 'cursor-follower';
        document.body.appendChild(cursor);

        var mouseX = 0, mouseY = 0;
        var cursorX = 0, cursorY = 0;

        document.addEventListener('mousemove', function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        function updateCursor() {
            cursorX += (mouseX - cursorX) * 0.12;
            cursorY += (mouseY - cursorY) * 0.12;
            cursor.style.left = cursorX + 'px';
            cursor.style.top = cursorY + 'px';
            requestAnimationFrame(updateCursor);
        }
        updateCursor();

        // Hover effect on interactive elements
        var hoverEls = document.querySelectorAll('a, button, .product-card, .solution-card, .service-card, .news-list-item');
        hoverEls.forEach(function(el) {
            el.addEventListener('mouseenter', function() { cursor.classList.add('hover'); });
            el.addEventListener('mouseleave', function() { cursor.classList.remove('hover'); });
        });
    }

    document.addEventListener('DOMContentLoaded', initCursorFollower);

    /* ══ Smooth Scroll for Anchor Links ══ */
    document.addEventListener('click', function(e) {
        var anchor = e.target.closest('a[href^="#"]');
        if (!anchor) return;
        var hash = anchor.getAttribute('href');
        if (hash === '#') return;

        var target = document.querySelector(hash);
        if (target) {
            e.preventDefault();
            var headerH = document.getElementById('site-header');
            var offset = headerH ? headerH.offsetHeight : 72;
            var top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    });

    /* ══ Noise Overlay ══ */
    function initNoiseOverlay() {
        var noise = document.createElement('div');
        noise.className = 'noise-overlay';
        document.body.appendChild(noise);
    }

    document.addEventListener('DOMContentLoaded', initNoiseOverlay);

    /* ══ Intersection Observer for Stagger ══ */
    function initStaggerObserver() {
        var staggerEls = document.querySelectorAll('.stagger-children');
        if (!staggerEls.length) return;

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        staggerEls.forEach(function(el) { observer.observe(el); });
    }

    document.addEventListener('DOMContentLoaded', initStaggerObserver);

    /* ══ Text Reveal Observer ══ */
    function initTextReveal() {
        var revealEls = document.querySelectorAll('.text-reveal');
        if (!revealEls.length) return;

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        revealEls.forEach(function(el) { observer.observe(el); });
    }

    document.addEventListener('DOMContentLoaded', initTextReveal);

    /* ══ Image Reveal Observer ══ */
    function initImageReveal() {
        var revealImgs = document.querySelectorAll('.img-reveal');
        if (!revealImgs.length) return;

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        revealImgs.forEach(function(el) { observer.observe(el); });
    }

    document.addEventListener('DOMContentLoaded', initImageReveal);

    /* ══ Lazy Video Playback ══ */
    function initLazyVideo() {
        var heroVideo = document.querySelector('.hero-video');
        if (!heroVideo) return;

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    heroVideo.play().catch(function() {});
                } else {
                    heroVideo.pause();
                }
            });
        }, { threshold: 0.25 });

        observer.observe(heroVideo);
    }

    document.addEventListener('DOMContentLoaded', initLazyVideo);

})();
