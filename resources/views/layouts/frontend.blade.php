<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/style.css') }}">
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

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none p-0">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
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
    <nav class="navbar navbar-expand-lg bg-gradient-second shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="cus-nav-item me-3">
                        <a href="{{ route('home') }}" class="cus-nav-link" id="nH">Home</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a class="cus-nav-link" href="{{ route('whoweare') }}" id="nWWA">Who We Are</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a class="cus-nav-link" href="{{ route('modules.index') }}" id="nM">Modules</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a class="cus-nav-link" href="{{ route('blogs.index') }}" id="nB">Blogs</a>
                    </li>
                    <li class="cus-nav-item me-3">
                        <a class="cus-nav-link" href="{{ route('contact') }}" id="nC">Contact</a>
                    </li>
                    <li class="cus-nav-item">
                        <a href="{{ route('eap') }}" class="btn btn-custome text-white btn-sm px-3 px-lg-4 fw-semibold">
                            Get Early Access →
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-light-navy text-light">
        <div class="container py-5">

            <div class="justify-content-center text-center mb-4">
                <a class="navbar-brand m-0" href="/">
                    <img src="{{ asset('images/logowh.png') }}" loading="lazy" alt="logo" class="logo">
                </a>
                <div class="footer-tag mt-4"> Intelligent Platform for Responsible Enterprises.</div>
                <div class="footer-tag">
                    <a href="mailto:info@soapbox.cloud?subject=Product Enquiry" class="text-white text-decoration-none">
                        info@soapbox.cloud
                    </a>· Early Adopters Programme 2026
                </div>
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
                        <li class="nav-item">
                            <a href="https://in.pinterest.com/soapboxsoftwaresolutions/"
                                class="nav-link text-white fs-12"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://x.com/SoapBox_in" class="nav-link text-white fs-12"><i
                                    class="fab fa-x-twitter"></i></a>
                        </li>
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
        <a href="https://calendly.com/mohammed-moizuddin-soapbox/30min" class="btn text-white" target="_blank">
            <i class="fa-solid fa-calendar"></i> &nbsp;Schedule a Demo
        </a>
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
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/assets/script.js') }}" defer></script>
    @yield('script')
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
    <!--End of Tawk.to Script-->
</body>

</html>