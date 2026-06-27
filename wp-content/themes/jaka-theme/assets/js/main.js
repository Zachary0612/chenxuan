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
            once: false,
            mirror: true,
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
                    toggleActions: 'play reverse play reverse'
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
                    start: 'top 85%',
                    toggleActions: 'play reverse play reverse'
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
            navigation: {
                prevEl: '.hero-swiper-prev',
                nextEl: '.hero-swiper-next'
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
                slidesPerView: 'auto',
                spaceBetween: 28,
                slidesOffsetAfter: 96,
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
                    576: { spaceBetween: 20, slidesOffsetAfter: 42 },
                    768: { spaceBetween: 24, slidesOffsetAfter: 56 },
                    992: { spaceBetween: 28, slidesOffsetAfter: 72 },
                    1200: { spaceBetween: 30, slidesOffsetAfter: 88 },
                    1600: { spaceBetween: 34, slidesOffsetAfter: 104 }
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

        function hasFilterValue(type, value) {
            return Array.prototype.some.call(buttons, function(button) {
                return button.getAttribute('data-case-filter-type') === type &&
                    button.getAttribute('data-case-filter') === value;
            });
        }

        function normalizeFilterValue(type, value) {
            return value && hasFilterValue(type, value) ? value : 'all';
        }

        function readFiltersFromUrl() {
            var params = new URLSearchParams(window.location.search);
            filters.industry = normalizeFilterValue(
                'industry',
                params.get('case_industry') || params.get('industry') || 'all'
            );
            filters.application = normalizeFilterValue(
                'application',
                params.get('case_application') || params.get('application') || 'all'
            );
        }

        function updateFilterUrl(historyMode) {
            if (!historyMode || !window.history || !window.history.pushState) return;

            var nextUrl = new URL(window.location.href);
            if (filters.industry === 'all') nextUrl.searchParams.delete('case_industry');
            else nextUrl.searchParams.set('case_industry', filters.industry);
            if (filters.application === 'all') nextUrl.searchParams.delete('case_application');
            else nextUrl.searchParams.set('case_application', filters.application);

            if (nextUrl.toString() === window.location.href) return;

            var state = { caseFilters: { industry: filters.industry, application: filters.application } };
            if (historyMode === 'replace') window.history.replaceState(state, '', nextUrl.toString());
            else window.history.pushState(state, '', nextUrl.toString());
        }

        function syncButtons() {
            buttons.forEach(function(button) {
                var type = button.getAttribute('data-case-filter-type');
                var value = button.getAttribute('data-case-filter');
                var isActive = normalizeCaseToken(filters[type]) === normalizeCaseToken(value);
                button.classList.toggle('active', isActive);
                button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });
        }

        function normalizeCaseToken(value) {
            return String(value || '')
                .replace(/&amp;/g, '&')
                .replace(/\s+/g, '')
                .trim();
        }

        function caseFilterMatches(actual, expected) {
            return expected === 'all' || normalizeCaseToken(actual) === normalizeCaseToken(expected);
        }

        function applyFilters(historyMode) {
            var visibleCount = 0;
            cards.forEach(function(card) {
                var industry = card.getAttribute('data-case-industry');
                var application = card.getAttribute('data-case-application');
                var show = caseFilterMatches(industry, filters.industry) &&
                    caseFilterMatches(application, filters.application);
                card.hidden = !show;
                card.style.display = show ? '' : 'none';
                if (show && card.hasAttribute('data-aos')) {
                    card.classList.add('aos-animate');
                }
                if (show) visibleCount += 1;
            });
            if (empty) {
                empty.hidden = visibleCount > 0;
                empty.style.display = visibleCount ? 'none' : 'block';
            }
            syncButtons();
            updateFilterUrl(historyMode);
            refreshAOS();
        }

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var type = button.getAttribute('data-case-filter-type');
                var value = button.getAttribute('data-case-filter');
                if (!filters.hasOwnProperty(type)) return;
                filters[type] = value;
                if (type === 'industry') {
                    filters.application = 'all';
                }

                applyFilters('push');
            });
        });

        window.addEventListener('popstate', function() {
            readFiltersFromUrl();
            applyFilters(false);
        });

        readFiltersFromUrl();
        applyFilters('replace');
    }

    document.addEventListener('DOMContentLoaded', initCaseFilters);

    /* ══ News Filters ══ */
    function initProductFilters() {
        var sidebar = document.getElementById('pls-sidebar');
        var results = document.getElementById('products-list');
        if (!sidebar || !results) return;

        var links = sidebar.querySelectorAll('[data-product-filter]');
        var seriesItems = sidebar.querySelectorAll('.pls-third-item[data-product-filter]');
        var cards = document.querySelectorAll('.pls-product-box[data-product-family]');
        var title = document.getElementById('pls-results-title');
        var count = document.getElementById('pls-results-count');
        if (!links.length || !cards.length) return;

        var params = new URLSearchParams(window.location.search);
        var requestedFilter = params.get('product_category') || results.getAttribute('data-initial-product-filter') || links[0].getAttribute('data-product-filter');
        var activeFilter = requestedFilter;

        function isModelLink(link) {
            return link.classList.contains('pls-four-item');
        }

        function findPrimaryFilterLink(filter) {
            var firstMatch = null;
            var primaryMatch = null;

            links.forEach(function(link) {
                if (link.getAttribute('data-product-filter') !== filter) return;
                if (!firstMatch) firstMatch = link;
                if (!primaryMatch && !isModelLink(link)) primaryMatch = link;
            });

            return primaryMatch || firstMatch;
        }

        function normalizeProductFilter(filter) {
            var fallback = links[0].getAttribute('data-product-filter');
            return findPrimaryFilterLink(filter) ? filter : fallback;
        }

        function getCurrentProductLang() {
            if (window.jakaData && window.jakaData.lang) {
                return String(window.jakaData.lang).toLowerCase();
            }

            var activeLang = document.querySelector('.language-switcher [data-lang].active, .mobile-lang-list [data-lang].active');
            if (activeLang && activeLang.getAttribute('data-lang')) {
                return activeLang.getAttribute('data-lang').toLowerCase();
            }

            return (document.documentElement.lang || '').toLowerCase();
        }

        function isChineseLanguage() {
            var lang = getCurrentProductLang();
            return lang === 'zh' || lang === 'zh_tw' || lang.indexOf('zh-') === 0;
        }

        function setSeriesExpanded(item, expanded) {
            var list = item.nextElementSibling;
            if (!list || !list.classList.contains('pls-four-list')) return;

            item.classList.toggle('expanded', expanded);
            item.setAttribute('aria-expanded', expanded ? 'true' : 'false');
            list.hidden = !expanded;
            list.style.display = expanded ? 'block' : 'none';
        }

        function syncProductTree(activeLink, filter) {
            var activeMode = activeLink.getAttribute('data-product-filter-mode') || 'family';
            var activeBox = activeLink.closest('.pls-first-box');

            sidebar.querySelectorAll('.pls-first-box').forEach(function(box) {
                box.classList.toggle('active', box === activeBox);
            });

            seriesItems.forEach(function(item) {
                setSeriesExpanded(
                    item,
                    activeMode === 'series' && item.getAttribute('data-product-filter') === filter
                );
            });
        }

        function revealProductControl(activeLink) {
            if (!activeLink || typeof activeLink.scrollIntoView !== 'function') return;

            var isCompact = window.matchMedia && window.matchMedia('(max-width: 980px)').matches;
            try {
                activeLink.scrollIntoView({
                    block: 'nearest',
                    inline: isCompact ? 'center' : 'nearest'
                });
            } catch (error) {
                activeLink.scrollIntoView(false);
            }
        }

        function updateProductUrl(filter, historyMode) {
            if (!window.history || !window.history.pushState) return;

            var nextUrl = new URL(window.location.href);
            nextUrl.searchParams.set('product_category', filter);
            nextUrl.hash = 'products-list';

            if (nextUrl.toString() === window.location.href) return;

            if (historyMode === 'replace') {
                window.history.replaceState({ productFilter: filter }, '', nextUrl.toString());
            } else if (historyMode === 'push') {
                window.history.pushState({ productFilter: filter }, '', nextUrl.toString());
            }
        }

        function applyProductFilter(filter, historyMode) {
            var visibleCount = 0;
            var activeLink = findPrimaryFilterLink(filter);

            if (!activeLink) {
                activeLink = links[0];
                filter = activeLink.getAttribute('data-product-filter');
            }

            links.forEach(function(link) {
                var isActive = link.getAttribute('data-product-filter') === filter && !isModelLink(link);
                link.classList.toggle('act', isActive);
                link.classList.toggle('active', isActive);
                link.setAttribute('aria-current', isActive ? 'true' : 'false');
            });

            var activeMode = activeLink.getAttribute('data-product-filter-mode') || 'family';
            syncProductTree(activeLink, filter);
            revealProductControl(activeLink);

            cards.forEach(function(card) {
                var family = card.getAttribute('data-product-family') || '';
                var series = card.getAttribute('data-product-series') || '';
                var show = activeMode === 'series' ? series === filter : family === filter;
                card.hidden = !show;
                card.classList.toggle('is-product-filter-match', show);

                // AOS calculates positions before filtering. A card that was hidden
                // during that pass can otherwise remain transparent after it matches.
                if (show && card.hasAttribute('data-aos')) {
                    card.classList.add('aos-animate');
                }
                if (show) visibleCount += 1;
            });

            if (title && activeLink) {
                title.textContent = activeLink.getAttribute('data-product-filter-label') || activeLink.textContent.trim();
            }
            if (count) {
                var countSuffix = isChineseLanguage() ? ' \u4e2a\u4ea7\u54c1' : (visibleCount === 1 ? ' product' : ' products');
                count.textContent = visibleCount + countSuffix;
            }

            activeFilter = filter;
            updateProductUrl(filter, historyMode);
        }

        function activateProductControl(control) {
            if (!control) return;
            applyProductFilter(control.getAttribute('data-product-filter'), 'push');
        }

        sidebar.addEventListener('click', function(event) {
            var control = event.target.closest('[data-product-filter]');
            if (!control || !sidebar.contains(control)) return;

            event.preventDefault();
            activateProductControl(control);
        });

        sidebar.addEventListener('keydown', function(event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;

            var control = event.target.closest('[data-product-filter]');
            if (!control || !sidebar.contains(control)) return;

            event.preventDefault();
            activateProductControl(control);
        });

        window.addEventListener('popstate', function() {
            var nextParams = new URLSearchParams(window.location.search);
            var nextFilter = normalizeProductFilter(nextParams.get('product_category') || results.getAttribute('data-initial-product-filter'));
            applyProductFilter(nextFilter, false);
        });

        activeFilter = normalizeProductFilter(activeFilter);
        applyProductFilter(activeFilter, params.get('product_category') && params.get('product_category') !== activeFilter ? 'replace' : false);
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
                var start = window.pageYOffset || document.documentElement.scrollTop || 0;
                var startedAt = null;
                var duration = 800;

                function easeOutCubic(t) {
                    return 1 - Math.pow(1 - t, 3);
                }

                function step(timestamp) {
                    if (!startedAt) startedAt = timestamp;
                    var progress = Math.min(1, (timestamp - startedAt) / duration);
                    window.scrollTo(0, Math.round(start * (1 - easeOutCubic(progress))));
                    if (progress < 1) window.requestAnimationFrame(step);
                }

                window.requestAnimationFrame(step);
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
        if (document.body.classList.contains('page-template-page-products')) {
            document.documentElement.classList.add('products-scroll-lock');
        }

        var sidebar = document.querySelector('.pls-sidebar-inner');
        var content = document.querySelector('.pls-content');

        function containWheelScroll(scroller) {
            if (!scroller) return;

            scroller.addEventListener('wheel', function(event) {
                var maxScroll = scroller.scrollHeight - scroller.clientHeight;
                if (maxScroll <= 0) return;

                var delta = event.deltaY;
                var atTop = scroller.scrollTop <= 0;
                var atBottom = scroller.scrollTop >= maxScroll - 1;

                if ((delta < 0 && atTop) || (delta > 0 && atBottom)) return;

                event.preventDefault();
                event.stopPropagation();
                scroller.scrollTop = Math.max(0, Math.min(maxScroll, scroller.scrollTop + delta));
            }, { passive: false });
        }

        containWheelScroll(sidebar);
        containWheelScroll(content);
    }

    document.addEventListener('DOMContentLoaded', initProductSidebar);

    /* ══ Office Map Cards ══ */
    function initOfficeMaps() {
        var maps = document.querySelectorAll('[data-office-map]');
        if (!maps.length) return;

        maps.forEach(function(map) {
            var cards = map.querySelectorAll('[data-office-card]');
            var pins = map.querySelectorAll('[data-office-pin]');
            if (!cards.length || !pins.length) return;

            var defaultCard = map.querySelector('[data-office-card].is-active') || cards[0];
            var cardZone = map.querySelector('.about-office-list, .contact-network-cards') || map;
            var resetTimer;

            function activateOffice(id, activeCard, expandCard) {
                cards.forEach(function(card) {
                    var isActive = card.getAttribute('data-office-card') === id;
                    var isExpanded = !!expandCard && isActive;
                    card.classList.toggle('is-active', isActive);
                    card.classList.toggle('is-expanded', isExpanded);
                    card.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                    card.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                    if (isActive) activeCard = card;
                });

                pins.forEach(function(pin) {
                    pin.classList.toggle('is-active', pin.getAttribute('data-office-pin') === id);
                });

                if (activeCard) {
                    map.style.setProperty('--office-map-x', activeCard.getAttribute('data-map-x') || '0%');
                    map.style.setProperty('--office-map-y', activeCard.getAttribute('data-map-y') || '0%');
                }
            }

            function resetToDefault() {
                activateOffice(defaultCard.getAttribute('data-office-card'), defaultCard, true);
            }

            function scheduleReset() {
                window.clearTimeout(resetTimer);
                resetTimer = window.setTimeout(function() {
                    var hovered = map.querySelector('[data-office-card]:hover');
                    var focused = map.querySelector('[data-office-card]:focus');
                    var zoneHovered = cardZone && cardZone.matches(':hover');
                    if (!hovered && !focused && !zoneHovered) {
                        resetToDefault();
                    }
                }, 220);
            }

            if (cardZone) {
                cardZone.addEventListener('mouseenter', function() {
                    window.clearTimeout(resetTimer);
                });
                cardZone.addEventListener('mouseleave', scheduleReset);
            }

            cards.forEach(function(card) {
                function expandThisCard() {
                    window.clearTimeout(resetTimer);
                    activateOffice(card.getAttribute('data-office-card'), card, true);
                }

                card.addEventListener('mouseenter', expandThisCard);
                card.addEventListener('focus', expandThisCard);
                card.addEventListener('blur', scheduleReset);

                card.addEventListener('click', function() {
                    expandThisCard();
                });

                card.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        expandThisCard();
                    }
                });
            });

            resetToDefault();
        });
    }

    document.addEventListener('DOMContentLoaded', initOfficeMaps);

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
    function initMegaMenuTriggers() {
        document.addEventListener('click', function(e) {
            var trigger = e.target.closest('[data-mega-trigger="true"]');
            if (!trigger) return;
            e.preventDefault();
        });
    }

    document.addEventListener('DOMContentLoaded', initMegaMenuTriggers);

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

    /* Service page: right-side stage navigation like the JAKA service flow. */
    function initServiceStageNav() {
        var nav = document.querySelector('.service-stage-nav');
        if (!nav) return;

        var links = Array.prototype.slice.call(nav.querySelectorAll('[data-service-nav]'));
        var panels = links.map(function(link) {
            return document.getElementById(link.getAttribute('data-service-nav'));
        }).filter(Boolean);

        if (!panels.length) return;

        var ticking = false;

        function setActive(id) {
            links.forEach(function(link) {
                var isActive = link.getAttribute('data-service-nav') === id;
                link.classList.toggle('is-active', isActive);
                link.setAttribute('aria-current', isActive ? 'true' : 'false');
            });
        }

        function update() {
            ticking = false;
            var viewportH = window.innerHeight || document.documentElement.clientHeight;
            var activeId = '';

            panels.forEach(function(panel) {
                var rect = panel.getBoundingClientRect();
                var inRange = rect.top < viewportH * 0.58 && rect.bottom > viewportH * 0.28;
                if (inRange) activeId = panel.id;
            });

            nav.classList.toggle('is-visible', !!activeId && window.innerWidth > 1180);
            if (activeId) setActive(activeId);
        }

        function requestUpdate() {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(update);
        }

        window.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('resize', requestUpdate);
        update();
    }

    document.addEventListener('DOMContentLoaded', initServiceStageNav);

    function initServiceMotion() {
        var careSection = document.querySelector('.service-care-section');
        var album = document.querySelector('[data-service-album]');
        var albumImages = album ? Array.prototype.slice.call(album.querySelectorAll('[data-service-album-image]')) : [];
        var albumCaption = album ? album.closest('.service-care-media').querySelector('figcaption') : null;
        var careNavItems = Array.prototype.slice.call(document.querySelectorAll('.service-stage-nav [data-service-nav]'));
        var digitalSection = document.querySelector('.service-digital-section');
        var digitalGrid = digitalSection ? digitalSection.querySelector('.service-digital-grid') : null;
        var digitalCards = digitalGrid ? Array.prototype.slice.call(digitalGrid.querySelectorAll('.service-digital-card')) : [];
        var digitalVisual = document.querySelector('[data-service-digital-visual]');
        var digitalImages = digitalVisual ? Array.prototype.slice.call(digitalVisual.querySelectorAll('[data-service-digital-image]')) : [];
        var isEnglish = (document.documentElement.lang || '').toLowerCase().indexOf('en') === 0;
        var careCaptions = isEnglish ? [
            {
                title: 'Field service based on industry experience',
                text: 'Covering welding, spraying, handling, grinding and custom automation scenarios.'
            },
            {
                title: 'Closed-loop remote service and delivery',
                text: 'Make ChenXuan planning, delivery, maintenance and training capability visible by layer.'
            },
            {
                title: 'ChenXuan Academy knowledge enablement',
                text: 'Help customer teams truly master automated production lines.'
            }
        ] : [
            {
                title: '基于行业经验的现场服务',
                text: '覆盖焊接、喷涂、搬运、打磨及非标自动化场景。'
            },
            {
                title: '远程运维与交付闭环',
                text: '通过滚动分层呈现，把ChenXuan的方案、交付、维护和培训能力集中展示。'
            },
            {
                title: 'CHENXUAN学院知识赋能',
                text: '让客户团队真正掌握自动化产线，沉淀可持续使用的生产能力。'
            }
        ];

        if (!careSection && !digitalSection) return;
        document.body.classList.add('is-service-page');

        var ticking = false;

        function clamp(value, min, max) {
            return Math.max(min, Math.min(max, value));
        }

        function headerHeight() {
            var header = document.querySelector('.site-header, .main-header, header');
            if (header) {
                var rectHeight = header.getBoundingClientRect().height;
                if (rectHeight > 20) return rectHeight;
            }

            var value = getComputedStyle(document.documentElement).getPropertyValue('--header-height').trim();
            var parsed = parseFloat(value);
            if (!Number.isFinite(parsed)) return 84;
            if (value.indexOf('rem') > -1) {
                var rootSize = parseFloat(getComputedStyle(document.documentElement).fontSize) || 16;
                return parsed * rootSize;
            }
            if (value.indexOf('vh') > -1) {
                return parsed * (window.innerHeight || document.documentElement.clientHeight) / 100;
            }
            return parsed;
        }

        function sectionProgress(section) {
            if (!section) return 0;
            var viewportH = window.innerHeight || document.documentElement.clientHeight;
            var stickyH = Math.max(1, viewportH - headerHeight());
            var travel = Math.max(1, section.offsetHeight - stickyH);
            var rect = section.getBoundingClientRect();
            return clamp((headerHeight() - rect.top) / travel, 0, 1);
        }

        function updateAlbum(progress) {
            if (!albumImages.length) return;

            var count = albumImages.length;
            var unit = progress * Math.max(count - 1, 1);
            var active = Math.floor(unit);
            var frac = clamp(unit - active, 0, 1);
            if (active >= count - 1) {
                active = count - 1;
                frac = 0;
            }
            active = clamp(active, 0, count - 1);

            album.style.setProperty('--service-album-progress', progress.toFixed(3));

            var mediaWidth = album.offsetWidth || window.innerWidth * 0.68;
            var mediaHeight = album.offsetHeight || window.innerHeight * 0.56;
            var eased = frac * frac * (3 - 2 * frac);
            var pullX = Math.min(mediaWidth * 0.24, 310);
            var pullY = Math.min(mediaHeight * 0.48, 305);
            var stackY = Math.min(mediaHeight * 0.28, 180);
            var liftPhase = clamp(eased / 0.68, 0, 1);
            var exitPhase = clamp((eased - 0.68) / 0.32, 0, 1);
            var liftEase = liftPhase * liftPhase * (3 - 2 * liftPhase);
            var exitEase = exitPhase * exitPhase * (3 - 2 * exitPhase);
            var pullFade = Math.pow(eased, 2.08);
            var revealEase = Math.pow(eased, 0.86);
            var mainIndex = eased > 0.58 && active < count - 1 ? active + 1 : active;

            function setState(image, x, y, scale, opacity, blur, zIndex, rotate) {
                image.style.opacity = opacity.toFixed(3);
                image.style.zIndex = Math.round(zIndex);
                image.style.transform = 'translate3d(' + x.toFixed(1) + 'px, ' + y.toFixed(1) + 'px, 0) rotate(' + rotate.toFixed(2) + 'deg) scale(' + scale.toFixed(3) + ')';
                image.style.filter = 'blur(' + blur.toFixed(2) + 'px) brightness(1) saturate(1)';
            }

            albumImages.forEach(function(image, index) {
                var x = 0;
                var y = 0;
                var scale = 1;
                var opacity = 0;
                var blur = 0;
                var zIndex = 0;
                var rotate = 0;

                if (index === active && active < count - 1) {
                    x = -pullX * exitEase;
                    y = -pullY * liftEase;
                    scale = 1 - 0.018 * liftEase - 0.012 * exitEase;
                    opacity = Math.max(0, 1 - pullFade * 0.98);
                    blur = 0.75 * liftEase + 0.7 * exitEase;
                    zIndex = 130 - Math.round(exitEase * 78);
                    rotate = -0.8 * exitEase;
                } else if (index === active + 1) {
                    x = 0;
                    y = stackY * (1 - eased);
                    scale = 0.94 + 0.06 * eased;
                    opacity = 0.16 + 0.84 * revealEase;
                    blur = 7.5 * (1 - eased);
                    zIndex = 62 + Math.round(eased * 70);
                    rotate = 0;
                } else if (index === active) {
                    x = 0;
                    y = 0;
                    scale = 1;
                    opacity = 1;
                    blur = 0;
                    zIndex = 130;
                } else if (index < active) {
                    x = -Math.min(mediaWidth * 0.74, 900);
                    y = -Math.min(mediaHeight * 0.42, 300);
                    scale = 0.96;
                    opacity = 0;
                    blur = 8;
                    zIndex = 0;
                    rotate = -2;
                } else if (index > active + 1) {
                    var depth = index - active - 1;
                    x = 0;
                    y = stackY + depth * 24;
                    scale = Math.max(0.88, 0.94 - depth * 0.025);
                    opacity = Math.max(0.08, 0.22 - depth * 0.045);
                    blur = Math.min(10, 7 + depth);
                    zIndex = 34 - depth;
                    rotate = 0;
                } else {
                    opacity = 0;
                }

                image.classList.remove('is-prev', 'is-next', 'is-pulling', 'is-wallet');
                image.classList.toggle('is-active', index === mainIndex);
                image.classList.toggle('is-pulling', index === active && active < count - 1 && eased > 0.02);
                image.classList.toggle('is-wallet', index > active);
                image.classList.toggle('is-prev', index < mainIndex && opacity > 0);
                image.classList.toggle('is-next', index > mainIndex && opacity > 0);
                setState(image, x, y, scale, opacity, blur, zIndex, rotate);
                image.setAttribute('aria-hidden', index === mainIndex ? 'false' : 'true');
            });

            careNavItems.forEach(function(item, index) {
                item.classList.toggle('is-active', index === mainIndex);
            });

            if (albumCaption && careCaptions[mainIndex]) {
                var titleNode = albumCaption.querySelector('strong');
                var textNode = albumCaption.querySelector('span');
                var nextCaption = careCaptions[mainIndex];
                if (titleNode && textNode && albumCaption.getAttribute('data-active-caption') !== String(mainIndex)) {
                    albumCaption.classList.remove('is-visible');
                    window.setTimeout(function() {
                        titleNode.textContent = nextCaption.title;
                        textNode.textContent = nextCaption.text;
                        albumCaption.setAttribute('data-active-caption', String(mainIndex));
                        albumCaption.classList.add('is-visible');
                    }, 120);
                } else {
                    albumCaption.classList.add('is-visible');
                }
            }
        }

        function updateDigital(progress) {
            if (!digitalGrid) return;

            digitalSection.classList.toggle('is-inview', progress > 0 && progress < 1);

            digitalCards.forEach(function(card, index) {
                var reveal = clamp((progress - (0.05 + index * 0.015)) / 0.08, 0, 1);
                var y = (1 - reveal) * 40;
                var opacity = 0.28 + reveal * 0.72;

                card.style.setProperty('--service-card-opacity', opacity.toFixed(3));
                card.style.setProperty('--service-card-x', '0px');
                card.style.setProperty('--service-card-y', y.toFixed(1) + 'px');
                card.classList.toggle('is-visible', reveal > 0.98);
            });
        }

        function lockDigitalVisual() {
            if (!digitalImages.length) return;
            digitalImages.forEach(function(image, index) {
                image.classList.toggle('is-active', index === 0);
            });
        }

        function update() {
            ticking = false;
            updateAlbum(sectionProgress(careSection));
            updateDigital(sectionProgress(digitalSection));
            lockDigitalVisual();
        }

        function requestUpdate() {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(update);
        }

        window.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('resize', requestUpdate);
        window.addEventListener('load', requestUpdate);
        update();
    }

    document.addEventListener('DOMContentLoaded', initServiceMotion);

    function initServiceReveals() {
        if (!document.querySelector('.service-care-section')) return;

        var groups = [
            {
                root: '.service-academy-section',
                items: ['.service-academy-media', '.service-academy-copy .section-label', '.service-academy-copy h2', '.service-academy-copy p', '.service-academy-metrics > div']
            },
            {
                root: '.service-global-section',
                items: ['.service-global-copy .section-label', '.service-global-copy h2', '.service-global-copy p', '.service-global-stats > div', '.service-global-media']
            },
            {
                root: '.service-faq-section',
                items: ['.section-label', 'h2', '.service-faq-item']
            },
            {
                root: '.service-strategy-cta',
                items: ['.service-strategy-card']
            }
        ];

        var revealRoots = [];

        groups.forEach(function(group) {
            var roots = Array.prototype.slice.call(document.querySelectorAll(group.root));
            roots.forEach(function(root) {
                root.classList.add('service-reveal-root');
                revealRoots.push(root);

                var delayIndex = 0;
                group.items.forEach(function(selector) {
                    Array.prototype.slice.call(root.querySelectorAll(selector)).forEach(function(item) {
                        item.classList.add('service-reveal-item');
                        item.style.setProperty('--service-reveal-delay', Math.min(delayIndex * 120, 720) + 'ms');
                        delayIndex += 1;
                    });
                });
            });
        });

        if (!('IntersectionObserver' in window)) {
            revealRoots.forEach(function(root) {
                root.classList.add('is-service-visible');
            });
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-service-visible');
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.22,
            rootMargin: '0px 0px -18% 0px'
        });

        revealRoots.forEach(function(root) {
            observer.observe(root);
        });
    }

    function initServiceCounters() {
        var metrics = Array.prototype.slice.call(document.querySelectorAll('.service-academy-metrics strong'));
        if (!metrics.length) return;

        function parseMetric(node) {
            var original = node.textContent.trim();
            var match = original.match(/(\d+)/);
            var target = match ? parseInt(match[1], 10) : 0;
            var prefix = original.indexOf('7x') === 0 ? '7x' : '';
            var suffix = original.indexOf('+') > -1 ? '+' : '';
            return {
                original: original,
                target: target,
                prefix: prefix,
                suffix: suffix
            };
        }

        function easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }

        var parsed = metrics.map(function(node) {
            var value = parseMetric(node);
            node.setAttribute('data-service-counter-original', value.original);
            node.textContent = value.prefix + '0' + value.suffix;
            return value;
        });

        function animateMetric(node, value, delay) {
            window.setTimeout(function() {
                var startedAt = null;
                var duration = 1000;

                function step(timestamp) {
                    if (!startedAt) startedAt = timestamp;
                    var progress = Math.min(1, (timestamp - startedAt) / duration);
                    var current = Math.round(value.target * easeOutCubic(progress));
                    node.textContent = value.prefix + current + value.suffix;
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        node.textContent = value.original;
                    }
                }

                window.requestAnimationFrame(step);
            }, delay);
        }

        var root = document.querySelector('.service-academy-metrics');
        if (!root || !('IntersectionObserver' in window)) {
            metrics.forEach(function(node, index) {
                animateMetric(node, parsed[index], index * 100);
            });
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (!entry.isIntersecting) return;
                metrics.forEach(function(node, index) {
                    animateMetric(node, parsed[index], index * 100);
                });
                observer.disconnect();
            });
        }, {
            threshold: 0.35
        });

        observer.observe(root);
    }

    function initServiceFAQ() {
        var lists = Array.prototype.slice.call(document.querySelectorAll('.service-faq-list'));
        if (!lists.length) return;

        lists.forEach(function(list) {
            var items = Array.prototype.slice.call(list.querySelectorAll('.service-faq-item'));
            items.forEach(function(item) {
                if (item.open) item.classList.add('is-open');
                var summary = item.querySelector('summary');
                if (!summary) return;

                summary.addEventListener('click', function(event) {
                    event.preventDefault();
                    var shouldOpen = !item.open || !item.classList.contains('is-open');

                    items.forEach(function(other) {
                        if (other === item) return;
                        other.classList.remove('is-open');
                        window.setTimeout(function() {
                            if (!other.classList.contains('is-open')) other.open = false;
                        }, 300);
                    });

                    if (!shouldOpen) {
                        item.classList.remove('is-open');
                        window.setTimeout(function() {
                            if (!item.classList.contains('is-open')) item.open = false;
                        }, 300);
                        return;
                    }

                    item.open = true;
                    window.requestAnimationFrame(function() {
                        item.classList.add('is-open');
                    });
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initServiceReveals);
    document.addEventListener('DOMContentLoaded', initServiceCounters);
    document.addEventListener('DOMContentLoaded', initServiceFAQ);

    /* About page customer reviews: alternate two batches every three seconds. */
    function initAboutTestimonialsRotation() {
        var stage = document.querySelector('.about-testimonials-stage');
        if (!stage) return;

        var notes = Array.prototype.slice.call(stage.querySelectorAll('[data-testimonial-group]'));
        var groups = notes.reduce(function(result, note) {
            var group = note.getAttribute('data-testimonial-group');
            if (result.indexOf(group) === -1) result.push(group);
            return result;
        }, []);

        if (groups.length < 2) return;

        var currentIndex = 0;
        var timer = null;

        function showGroup(index) {
            currentIndex = index % groups.length;
            var activeGroup = groups[currentIndex];

            notes.forEach(function(note) {
                var isActive = note.getAttribute('data-testimonial-group') === activeGroup;
                note.classList.toggle('is-active', isActive);
                note.setAttribute('aria-hidden', isActive ? 'false' : 'true');
            });
        }

        function startRotation() {
            if (timer) window.clearInterval(timer);
            timer = window.setInterval(function() {
                showGroup(currentIndex + 1);
            }, 3000);
        }

        showGroup(0);
        startRotation();

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                if (timer) window.clearInterval(timer);
                timer = null;
                return;
            }

            startRotation();
        });
    }

    document.addEventListener('DOMContentLoaded', initAboutTestimonialsRotation);

    /* Solution detail: switch JAKA-style application scene panels. */
    function initSolutionSceneTabs() {
        var sections = document.querySelectorAll('.cx-scenes');
        if (!sections.length) return;

        sections.forEach(function(section) {
            var tabs = Array.prototype.slice.call(section.querySelectorAll('[data-cx-scene-tab]'));
            var panels = Array.prototype.slice.call(section.querySelectorAll('[data-cx-scene-panel]'));

            if (!tabs.length || !panels.length) return;

            tabs.forEach(function(tab) {
                tab.addEventListener('click', function() {
                    var target = tab.getAttribute('data-cx-scene-tab');

                    tabs.forEach(function(item) {
                        item.classList.toggle('is-active', item === tab);
                    });

                    panels.forEach(function(panel) {
                        panel.classList.toggle('is-active', panel.getAttribute('data-cx-scene-panel') === target);
                    });
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initSolutionSceneTabs);

})();
