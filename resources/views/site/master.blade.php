<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('site-assets/images/favicon.png') }}" type="">
    <title>@yield('title')</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site-assets/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('site-assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('site-assets/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('site-assets/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ route('famms.index') }}"><img width="250"
                            src="{{ asset('site-assets/images/logo.png') }}" alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="auth-check ml-5">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                        @endguest
                        @auth
                            <p style="font-family:Georgia, 'Times New Roman', Times, serif; font-size: 18px; font-weight: 600;">{{ Auth::user()->name}}</p>
                            <a href="#" class="btn btn-sm btn-secondary w-100" onclick="document.getElementById('lg-form').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="lg-form">
                                @csrf
                            </form>
                        @endauth
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ request()->routeIs('famms.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('famms.index') }}">Home</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('famms.about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('famms.about') }}">About</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('famms.products') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('famms.products') }}">Products</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('famms.purchases') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('famms.purchases') }}">My Purchases</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('famms.my-cart') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('famms.my-cart') }}">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path
                                                    d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        @yield('content')




        <!-- footer start -->
        <footer>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="full">
                            <div class="logo_footer">
                                <a href="{{ route('famms.index') }}"><img width="210" src="{{ asset('site-assets/images/logo.png') }}"
                                        alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html
                    Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="{{ asset('site-assets/js/jquery-3.4.1.min.js') }}"></script>
        <!-- popper js -->
        <script src="{{ asset('site-assets/js/popper.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('site-assets/js/bootstrap.js') }}"></script>
        <!-- custom js -->
        <script src="{{ asset('site-assets/js/custom.js') }}"></script>
        @yield('scripts')
</body>

</html>