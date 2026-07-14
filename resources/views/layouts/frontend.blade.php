<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="visitor-tracking-endpoint" content="{{ route('visitor.tracking.store') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
<link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/MotionPathPlugin.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preload" href="https://unpkg.com/aos@2.3.4/dist/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
    @yield('style')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MCKVJB3KT0"></script>
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
 
        gtag('config', 'G-MCKVJB3KT0');
</script>
<!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KT7WLMZ8');</script>
<!-- End Google Tag Manager -->
 
    @include('partials.schema')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KT7WLMZ8" height="0" width="0"
            class="d-none invisible"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @auth
        <div class="bg-dark text-white py-1 small sticky-top z-1000">
            <div class="container-fluid max-w-1400 d-flex justify-content-between align-items-center px-3">

                <div>
                    <i class="fa-solid fa-user me-1"></i>
                    Welcome, {{ Auth::user()->name }}
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">
                        <i class="fa-solid fa-gauge"></i> Dashboard
                    </a>

                    {{-- Migrate --}}
                    <form method="POST" action="{{ route('admin.console.run', 'migrate') }}" class="d-inline"
                        id="nav-form-migrate">
                        @csrf
                        <button type="button" class="btn btn-link text-white text-decoration-none p-0"
                            onclick="navConsoleRun('migrate')">
                            <i class="fa-solid fa-database"></i> Migrate
                        </button>
                    </form>

                    {{-- Clear Cache --}}
                    <form method="POST" action="{{ route('admin.console.run', 'clear-cache') }}" class="d-inline"
                        id="nav-form-clear-cache">
                        @csrf
                        <button type="button" class="btn btn-link text-white text-decoration-none p-0"
                            onclick="navConsoleRun('clear-cache')">
                            <i class="fa-solid fa-broom"></i> Clear Cache
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none p-0">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function navConsoleRun(key) {
                if (!confirm('Run "' + key + '" command?')) return;
                document.getElementById('nav-form-' + key)?.submit();
            }
        </script>
    @endauth
    <div class="toast-container position-fixed top-0 end-0 p-3 z-500">
        @if(session('success'))
            <div class="toast align-items-center text-bg-success border-0 show mb-2" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
        @if(session('danger'))
            <div class="toast align-items-center text-bg-danger border-0 show mb-2" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('danger') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
    </div>
    <div class="announcement-strip">
        <div class="container d-flex justify-content-center align-items-center gap-2 text-center">
            <span class="announcement-text">
                Limited Early Adopters Program for high-risk industries now open
            </span>

            <a href="{{ route('eap') }}" class="announcement-link">
                Get Early Access →
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-gradient-second shadow-sm sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.webp') }}" alt="logo" class="logo" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="cus-nav-item me-3">
                        <a href="{{ route('ai') }}" class="cus-nav-link {{ request()->routeIs('ai') ? 'active' : '' }}" id="nH">EHS AI Assist</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a href="{{ route('platform') }}" class="cus-nav-link {{ request()->routeIs('platform') ? 'active' : '' }}" id="nH">Platform</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a href="{{ route('whoweare') }}" class="cus-nav-link {{ request()->routeIs('whoweare') ? 'active' : '' }}" id="nWWA">Who We Are</a>
                    </li>
                    <li class="cus-nav-item mega-products-dropdown position-static d-none d-md-block my-auto me-3">

                        <span class="cus-nav-link {{ request()->is('modules*') ? 'active' : '' }} mega-products-trigger">

                            Solutions

                        </span>

                        <div class="products-mega-menu">

                            <div class="container max-w-1400">

                                <div class="row g-0">

                                    {{-- LEFT CATEGORIES --}}

                                    <div class="col-md-3">

                                        <div class="products-category-sidebar">

                                        @foreach($productCategories as $category)

                                            <div class="product-category-item {{ $loop->first ? 'active' : '' }}"
                                                data-target="category-{{ $category->id }}">

                                                <span>

                                                    {{ $category->name }}

                                                </span>

                                            </div>

                                        @endforeach

                                    </div>

                                    </div>


                                    {{-- RIGHT MODULES --}}

                                    <div class="col-md-9">

                                        <div class="products-content-wrapper">

                                            @foreach($productCategories as $category)

                                                <div class="products-category-content {{ $loop->first ? 'active' : '' }}"
                                                    id="category-{{ $category->id }}">

                                                <div class="row g-4">

                                                    @foreach($category->modules as $module)

                                                        <div class="col-md-4">

                                                            @if($module->is_live)

                                                                <a href="{{ url('/solutions/' . $module->slug) }}"
                                                                class="product-module-card live-module">

                                                                    <div class="module-card-top d-flex justify-content-between px-2 py-2">

                                                                        <h5 class="px-3 py-2">
                                                                            {{ $module->name }}
                                                                        </h5>

                                                                        <div class="module-status">
                                                                            LIVE
                                                                        </div>

                                                                    </div>

                                                                </a>

                                                            @else

                                                                <div class="product-module-card coming-module not-clickable">

                                                                    <div class="module-card-top d-flex justify-content-between px-2 py-2">

                                                                        <h5 class="px-3 py-2">
                                                                            {{ $module->name }}
                                                                        </h5>

                                                                        <div class="module-status">
                                                                            COMING SOON
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            @endif

                                                        </div>

                                                    @endforeach

                                                </div>
                                                <div class="text-end mt-4">

                                                    <a href="{{ route('modules.index') }}"
                                                    class="btn btn-custome text-white btn-sm px-3 px-lg-4 fw-semibold">

                                                        View All Products
                                                        <i class="bi bi-arrow-right ms-2"></i>

                                                    </a>

                                                </div>

                                            </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>
                    {{-- MOBILE PRODUCTS MENU --}}
                    <li class="d-lg-none mobile-nav-item">

                        <button class="mobile-dropdown-btn"
                                data-bs-toggle="collapse"
                                data-bs-target="#mobileProductsMenu">

                            Products

                            <i class="bi bi-chevron-down"></i>

                        </button>

                        <div class="collapse"
                            id="mobileProductsMenu">

                            <div class="mobile-dropdown-wrapper">

                                @foreach($productCategories as $category)

                                    <div class="mobile-category-item">

                                        <button class="mobile-category-btn"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#mobileCategory{{ $category->id }}">

                                            {{ $category->name }}

                                            <i class="bi bi-chevron-down"></i>

                                        </button>

                                        <div class="collapse"
                                            id="mobileCategory{{ $category->id }}">

                                            <div class="mobile-module-wrapper">

                                                @foreach($category->modules as $module)

                                                    @if($module->is_live)

                                                        <a href="{{ url('/modules/' . $module->slug) }}"
                                                        class="mobile-module-card">

                                                            <div class="mobile-module-icon">
                                                                <i class="{{ $module->icon }}"></i>
                                                            </div>

                                                            <div>

                                                                <h6>{{ $module->name }}</h6>

                                                                <span>LIVE</span>

                                                            </div>

                                                        </a>
                                                    @else

                                                        <!-- <div class="mobile-module-icon">
                                                                <i class="{{ $module->icon }}"></i>
                                                        </div> -->

                                                        <div class="mobile-module-card">

                                                            <h6>{{ $module->name }}</h6>

                                                            <span class="module-status text-warning">
                                                                COMING SOON
                                                            </span>

                                                        </div>

                                                    @endif

                                                @endforeach

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </li>
                    <!-- <li class="cus-nav-item dropdown mega-dropdown position-static d-none d-md-block my-auto me-3">

                        <span class="cus-nav-link {{ request()->is('industries*') ? 'active' : '' }} mega-trigger">

                            Industries

                        </span>

                        <div class="mega-menu">

                            <div class="container max-w-1400">

                                <div class="row g-4">

                                    @foreach($industriesMenu as $industry)

                                        <div class="col-lg-3 col-md-4 col-sm-6">

                                            <a href="{{ url('/industries/' . $industry->slug) }}"
                                            class="industry-menu-card text-decoration-none d-block">

                                                <div class="industry-menu-inner">

                                                    <div class="industry-dropdown-item">

                                                        <div class="industry-dropdown-icon">

                                                            <i class="{{ $industry->icon }}"></i>

                                                        </div>

                                                        <div class="industry-dropdown-content">

                                                            <h6>{{ $industry->title }}</h6>

                                                            <p>{{ $industry->subtitle }}</p>

                                                        </div>

                                                    </div>
                                                </div>

                                            </a>
                                            

                                        </div>


                                    @endforeach
                                    <div class="text-end mt-4">

                                        <a href="{{ route('industries.index') }}"
                                            class="btn btn-custome text-white btn-sm px-3 px-lg-4 fw-semibold">

                                                View All Industries
                                            <i class="bi bi-arrow-right ms-2"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li> -->
                     {{-- MOBILE Industries MENU --}}
                    <!-- <li class="d-lg-none mobile-nav-item">

                        <button class="mobile-dropdown-btn"
                                data-bs-toggle="collapse"
                                data-bs-target="#mobileIndustriesMenu">

                            Industries

                            <i class="bi bi-chevron-down"></i>

                        </button>

                        <div class="collapse"
                            id="mobileIndustriesMenu">

                            <div class="mobile-dropdown-wrapper">

                                @foreach($industriesMenu as $industry)

                                    <a href="{{ url('/industries/' . $industry->slug) }}"
                                    class="mobile-industry-card">

                                        <div class="mobile-module-icon">
                                            <i class="{{ $industry->icon }}"></i>
                                        </div>

                                        <h6>{{ $industry->title }}</h6>

                                    </a>

                                @endforeach

                            </div>

                        </div>

                    </li> -->
                    <li class="cus-nav-item me-3">
                        <a class="cus-nav-link {{ request()->is('blogs*') ? 'active' : '' }}" href="{{ route('blogs.index') }}" id="nB">Resources</a>
                    </li>
                    <!-- <li class="cus-nav-item me-3">
                        <a class="cus-nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}" id="nC">Contact</a>
                    </li> -->
                    <li class="cus-nav-item">
                        <a href="{{ route('contact') }}" class="btn btn-custome text-white btn-sm px-3 px-lg-4 fw-semibold">
                            Contact Us →
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    <footer class="bg-light-navy text-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <a class="navbar-brand m-0" href="/">
                        <img src="{{ asset('images/logowh.webp') }}" loading="lazy" alt="logo" class="logo">
                    </a>
                    <div class="footer-tag mt-4"> Intelligent Platform for Responsible Enterprises.</div>
                    <div class="footer-tag">
                        <a href="mailto:info@soapbox.cloud?subject=Product Enquiry" class="text-white text-decoration-none">
                            info@soapbox.cloud
                        </a>· Early Adopters Programme 2026
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('whoweare') }}" class="text-white text-decoration-none">Who We Are</a></li>
                        <li><a href="{{ route('eap') }}" class="text-white text-decoration-none">Take the 30-sec EHS Check</a></li>
                        <li><a href="{{ route('blogs.index') }}" class="text-white text-decoration-none">Resources</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="{{ url('sitemap.xml') }}" class="text-white text-decoration-none">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4">
                    <h5>Products</h5>
                    <ul class="list-unstyled">
                        @foreach($footerProducts as $product)
                            <li>
                                <a 
                                href="{{ route('modules.show', $product->slug) }}" class="text-white text-decoration-none">
                                    {{ $product->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- <div class="col-sm-6 col-md-4">
                    <h5>Industries</h5>
                    <ul class="list-unstyled">
                        @foreach($industriesMenu as $industry)
                            <li>
                                <a href="{{ url('/industries/' . $industry->slug) }}" class="text-white text-decoration-none">
                                    {{ $industry->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div> -->

            </div>
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-start">
                        <li class="nav-item">
                            <a href="https://www.instagram.com/soapbox.cloud/" class="nav-link text-white fs-12"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.facebook.com/soapboxsoftwaresolutions/"
                                class="nav-link text-white fs-12"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.linkedin.com/company/soapboxgroup/"
                                class="nav-link text-white fs-12"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="https://in.pinterest.com/soapboxsoftwaresolutions/"
                                class="nav-link text-white fs-12"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://x.com/SoapBox_in" class="nav-link text-white fs-12"><i
                                    class="fab fa-x-twitter"></i></a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end">
                        @foreach($legalPages as $page)
                            <li class="nav-item">
                                <a href="{{ url('legal/' . $page->slug) }}" class="nav-link text-white fs-12">
                                    {{ $page->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <hr>
                <div class="col-md-12">
                    <p class="text-center text-light fs-12 mb-0">© 2026 Soapbox.Cloud. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <div id="fixedCalendar" class="bg-forth rounded-pill shadow">
        <button
            type="button"
            class="btn text-white"
            data-bs-toggle="modal"
            data-bs-target="#scheduleDemoModal">
            <i class="fa-solid fa-calendar"></i> <span class="calendartext">&nbsp;Schedule a Demo</span>
        </button>
        <!-- <a href="https://calendly.com/mohammed-moizuddin-soapbox/30min" class="btn text-white" target="_blank">
            <i class="fa-solid fa-calendar"></i> &nbsp;Schedule a Demo
        </a> -->
    </div>
    <div id="backToTopWrapper" class="back-to-top-wrapper">
        <svg class="progress-ring" width="60" height="60">
            <circle class="progress-ring-bg" cx="30" cy="30" r="26" />
            <circle class="progress-ring-fill" cx="30" cy="30" r="26" />
        </svg>

        <button id="backToTop" class="back-to-top">
            ↑
        </button>
    </div>
<div class="translate-drawer-wrapper">

    <!-- Edge Toggle -->
    <button id="translateDrawerToggle"
            class="translate-edge-toggle">

        🌐

    </button>

    <!-- Sliding Panel -->
    <div id="translateDrawer"
         class="translate-drawer">

        <div class="translate-drawer-header">

            <span class="notranslate">Language</span>

            <button id="closeTranslateDrawer">
                ✕
            </button>

        </div>

        <div class="translate-language-list">

            <button class="notranslate" data-lang="en">English</button>
            <button class="notranslate" data-lang="ar">Arabic</button>

            <button class="notranslate" data-lang="zh-CN">
                Chinese
            </button>

            <button class="notranslate" data-lang="ms">
                Malay
            </button>

            <button class="notranslate" data-lang="fr">French</button>
            <button class="notranslate" data-lang="de">German</button>
            <button class="notranslate" data-lang="es">Spanish</button>
            <button class="notranslate" data-lang="hi">Hindi</button>
            <button class="notranslate" data-lang="ja">Japanese</button>
            <button class="notranslate" data-lang="ko">Korean</button>

        </div>

    </div>

</div>

<div id="google_translate_element" class="d-none"></div>
<!-- Schedule Demo Modal -->
<div class="modal fade"
     id="scheduleDemoModal"
     tabindex="-1"
     aria-labelledby="scheduleDemoModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">

            <div class="modal-header border-0 pb-0">
                <div>
                    <h3 class="modal-title fw-bold mb-1">
                        Schedule a Demo
                    </h3>
                </div>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>
            <div class="alert alert-primary border-0 mb-4">

                <strong>Personalized Demo</strong>

                <div class="small mt-1">
                    Tell us a little about your organization so we can
                    tailor the demo to your EHS, safety, and compliance needs.
                </div>

            </div>

            <div class="modal-body">

                <p class="text-muted mb-4">
                    Tell us a little about your organization before booking your demo.
                </p>

                <form id="demoRequestForm">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Full Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               class="form-control"
                               name="full_name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Work Email <span class="text-danger">*</span>
                        </label>

                        <input type="email"
                               class="form-control"
                               name="email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Company Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               class="form-control"
                               name="company_name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Which industry are you in?
                        </label>

                        <select class="form-select"
                                name="industry"
                                required>

                            <option value="">
                                Select Industry
                            </option>

                            <option value="Manufacturing">
                                Manufacturing
                            </option>

                            <option value="Construction">
                                Construction
                            </option>

                            <option value="Oil & Gas">
                                Oil & Gas
                            </option>

                            <option value="Energy & Utilities">
                                Energy & Utilities
                            </option>

                            <option value="Healthcare">
                                Healthcare
                            </option>

                            <option value="Food & Beverage">
                                Food & Beverage
                            </option>

                            <option value="Mining">
                                Mining
                            </option>

                            <option value="Transportation & Logistics">
                                Transportation & Logistics
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            What are you primarily looking for?
                        </label>

                        <select class="form-select"
                                name="primary_interest"
                                required>

                            <option value="">
                                Select One
                            </option>

                            <option value="Audits & Inspections">
                                Audits & Inspections
                            </option>

                            <option value="Incident Management">
                                Incident Management
                            </option>

                            <option value="Corrective Actions (CAPA)">
                                Corrective Actions (CAPA)
                            </option>

                            <option value="Compliance Tracking">
                                Compliance Tracking
                            </option>

                            <option value="Risk Management">
                                Risk Management
                            </option>

                            <option value="EHS Digital Transformation">
                                EHS Digital Transformation
                            </option>

                            <option value="Exploring EHS Solutions">
                                Exploring EHS Solutions
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Anything you'd like us to know before the demo?
                        </label>

                        <textarea class="form-control"
                                  rows="4"
                                  name="notes"
                                  placeholder="Tell us about your current process, challenges, or what you'd like to see during the demo."></textarea>
                    </div>

                </form>

                <div id="demoFormError"
                     class="alert alert-danger d-none mt-3">
                </div>

            </div>

            <div class="modal-footer bg-light border-0">

                <button type="button"
                        class="btn-muted px-4"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button"
                        id="submitDemoRequest"
                        class="btn-custome1 px-4">

                    Continue to Booking

                </button>

            </div>

        </div>
    </div>
</div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
<script>
       document.addEventListener("DOMContentLoaded", function () {
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: "ease-in-out",
            once: true
        });
    }
});
</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/69fae6ff0bf3dd1c36b41224/1jnu1clj0';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
 
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>
<script src="{{ asset('js/visitor-tracker.js') }}?v={{ filemtime(public_path('js/visitor-tracker.js')) }}" defer></script>
<script src="{{ asset('/js/script.js') }}" defer></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'google_translate_element');
    }
    function triggerGoogleTranslate(lang) {
        const interval = setInterval(() => {
            const select =
                document.querySelector(".goog-te-combo");
            if (select) {
                select.value = lang;
                select.dispatchEvent(
                    new Event('change')
                );
                clearInterval(interval);
            }
        }, 500);
    }
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn =
            document.getElementById("translateDrawerToggle");
        const drawer =
            document.getElementById("translateDrawer");
        const closeBtn =
            document.getElementById("closeTranslateDrawer");
        // Open drawer
        toggleBtn.addEventListener("click", function () {
            drawer.classList.toggle("active");
        });
        // Close drawer
        closeBtn.addEventListener("click", function () {
            drawer.classList.remove("active");
        });
        // Language selection
        document.querySelectorAll(
            ".translate-language-list button"
        ).forEach(btn => {
            btn.addEventListener("click", function () {
                const lang =
                    this.getAttribute("data-lang");
                triggerGoogleTranslate(lang);
            });
        });
    });
    /* Hide Google bar repeatedly */
    setInterval(() => {
        const bannerFrame =
            document.querySelector('.goog-te-banner-frame');
        if (bannerFrame) {
            bannerFrame.style.display = 'none';
        }
        document.body.style.top = '0px';
    }, 500);
</script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/MotionPathPlugin.min.js"></script>
<script src="{{ asset('js/ai-page.js') }}"></script>
    @yield('script')
</body>

</html>