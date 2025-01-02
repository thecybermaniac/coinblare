<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    {!! SEO::generate() !!}
    <meta name="author" content="Fotuman">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/coinblare-favicon.png') }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets2/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets2/css/theme.css?ver=3.1.2') }}">
</head>

<body class="nk-body bg-white npc-landing">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            <header class="header has-header-main-s1 bg-lighter">
                <div class="header-main header-main-s1 is-sticky is-transparent">
                    <div class="container header-container">
                        <div class="header-wrap">
                            <div class="header-logo">
                                <a href="html/index.html">
                                    <img src="{{ asset('images/coinblare-logo.png') }}" width="100" alt="logo">
                                </a>
                            </div>
                            <div class="header-toggle">
                                <button class="menu-toggler" data-target="mainNav">
                                    <em class="menu-on icon ni ni-menu"></em>
                                    <em class="menu-off icon ni ni-cross"></em>
                                </button>
                            </div><!-- .header-nav-toggle -->
                            <nav class="header-menu p-3" data-content="mainNav">
                                <ul class="menu-list ms-lg-auto g-3">
                                    <li class="menu-item">
                                        <a href="{{ route('website.home') }}"
                                            class="nav-link {!! web_route('website.home') !!}">Home</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('website.about') }}"
                                            class="nav-link {!! web_route('website.about') !!}">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('website.faq') }}"
                                            class="nav-link {!! web_route('website.faq') !!}">Faq</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('website.features') }}"
                                            class="nav-link {!! web_route('website.features') !!}">Features</a>
                                    </li>
                                </ul>
                                <ul class="menu-list ms-lg-auto g-3">
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="menu-item">
                                                <a href="{{ route('login') }}" target="_blank"
                                                    class="btn btn-primary btn-lg"><em
                                                        class="ni ni-user"></em>&nbsp;&nbsp;Login</a>
                                            </li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li class="menu-item">
                                                <a href="{{ route('register') }}" target="_blank"
                                                    class="btn btn-warning btn-lg"><em
                                                        class="ni ni-signin"></em>&nbsp;&nbsp;Sign Up</a>
                                            </li>
                                        @endif
                                    @endguest
                                    @auth
                                        @if (Auth::user()->email == 'admin@admin.com')
                                            <li class="menu-item">
                                                <a href="{{ route('admin.dashboard') }}" target="_blank"
                                                    class="btn btn-primary btn-lg">
                                                    <em class="ni ni-home"></em>
                                                    &nbsp;&nbsp;Dashboard
                                                </a>
                                            </li>
                                        @else
                                            <li class="menu-item">
                                                <a href="{{ route('customer.dashboard') }}" target="_blank"
                                                    class="btn btn-primary btn-lg">
                                                    <em class="ni ni-home"></em>
                                                    &nbsp;&nbsp;Dashboard
                                                </a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </nav><!-- .nk-nav-menu -->
                        </div><!-- .header-warp-->
                    </div><!-- .container-->
                </div><!-- .header-main-->
                <div class="header-content my-auto py-5">
                    <div class="container">
                        <div class="row flex-lg-row-reverse  justify-content-between g-gs">
                            <div class="col-lg-6 mb-n3 mb-lg-0">
                                <div class="header-image header-image-s2">
                                    <img src="{{ asset('images/dashboard.jpg') }}" alt="image" width="100">
                                </div><!-- .header-image -->
                            </div><!-- .col- -->
                            <div class="col-lg-5 col-md-10 mt-5">
                                <div class="header-caption mt-5">
                                    <h1 class="header-title">Buy &amp; Sell Cryptocurrencies. <span
                                            class="text-warning">10M+</span> Users Chose Us.</h1>
                                    <div class="header-text">
                                        <p>Buy &amp; Sell more 20+ cryptocurrencies with our secure platform. Use
                                            our easy-to-use crypto dashboard and earn huge returns!
                                            Cryptocurrency is not just a trend; it's a transformative force, altering
                                            the landscape of traditional finance. It's a technology that transcends
                                            borders, connecting people across the globe in ways we've never seen before.
                                            And at the heart of this revolution lies our exchange. We aren’t merely a
                                            platform for trading digital assets; we are architects of a new financial
                                            ecosystem, where accessibility, security, and innovation converge.</p>
                                    </div>
                                </div><!-- .header-caption -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .header-content -->
            </header><!-- .header -->
            @yield('content')
            <footer class="footer bg-lighter" id="footer">
                <div class="container">
                    <div class="row g-3 align-items-center justify-content-md-between py-4 py-md-5">
                        <div class="col-md-3">
                            <div class="footer-logo">
                                <a href="{{ route('website.home') }}">
                                    <img src="{{ asset('images/coinblare-logo.png') }}" alt="logo">
                                </a>
                            </div><!-- .footer-logo -->
                        </div><!-- .col -->
                        <div class="col-md-4">
                            <ul class="link-inline gx-4 float-end">
                                <li style="font-family: Cambria;">60 Kent Street
                                    Brooklyn, NY 11216</li>
                                <li><a href="mailto:example@example.com" style="font-family: Cambria;">example@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="hr border-light mb-0 mt-n1">
                    <div class="row g-3 align-items-center justify-content-md-between py-4">
                        <div class="col-md-8">
                            <div style="font-family: Cambria;">Copyright &copy; {{ date('Y') }} {{ setting('copyright') }}.
                            </div>
                        </div><!-- .col -->
                        <div class="col-md-3">
                            <ul class="link-inline gx-4 float-end">
                                <ul class="nav">
                                    <li class="nav-item dropup">
                                        <a href=""
                                            class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base"
                                            data-bs-toggle="dropdown"
                                            data-offset="0,10"><span style="font-family: Cambria;">{{ $auth?->language_name }}</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="{{ route('website.change-lang', app()->getLocale()) }}"
                                                        class="language-item">
                                                        <span
                                                            class="language-name text-capitalize">{{ $auth?->language_name }}</span>
                                                    </a>
                                                </li>
                                                @foreach ($website as $w)
                                                    <li>
                                                        <a href="{{ route('website.change-lang', $w?->language_code) }}"
                                                            class="language-item">
                                                            <span
                                                                class="language-name text-capitalize">{{ $w?->language_name }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                <li>
                                                    <a href="#lang" data-bs-toggle="modal" class="language-item">
                                                        <span class="language-name text-capitalize text-primary">see
                                                            all</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </ul><!-- .footer-nav -->
                        </div>
                    </div><!-- .row -->
                </div><!-- .container -->
            </footer><!-- .footer -->
        </div>
        <!-- main @e -->
    </div>
    <div class="modal fade zoom" tabindex="-1" id="lang">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Languages</h5>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @foreach ($w_lang as $fl)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <a href="{{ route('website.change-lang', $fl?->language_code) }}">
                                    <div class="card card-bordered" onmouseover="$(this).addClass('bg-primary')"
                                        onmouseout="$(this).removeClass('bg-primary')">
                                        <div class="card-body">
                                            <h5 class="card-text" style="font-size: 13px;">{{ $fl?->language_name }}
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets2/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('assets2/js/scripts.js?ver=3.1.2') }}"></script>
</body>

</html>
