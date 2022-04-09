<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Standard Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SeventhQueen" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/less/base.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/less/header.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/less/theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/icon/style.css') }}">
    <link rel="icon" href="{{ asset('assets/front/images/ico/favicon.ico') }}">

    <script src="{{asset('assets/js/plugins/custom/magnific-popup.css')}}"></script>

    <script src="{{ asset('assets/front/library/modernizr-custom.js') }}"></script>

    <title>Homepage</title>

</head>

<body class="no-transition">
    <div id="page-wrapper">

        <!--

Default Header with a White Background & Dark text.

-->

        <!--DEFAULT HEADER-->

        <header
            class="header-section ths header-shadow header-sticky header-slide-up header-transparent is-transparent equal-tablet-header-items equal-mobile-header-items">
            <div class="header-content">

                <div class="ui container grid">
                    <div class="header-item header-left">

                    </div>

                    <div class="header-item header-center flex-grow-true">

                        <a class="logo item" href="homepage.html">
                            <img src="{{ asset('assets/front/images/logo-mycar-transparent.png') }}"
                                srcset="{{ asset('assets/front/images/logo-mycar-transparent.png') }} 1x, {{ asset('assets/front/images/logo-mycar-transparent@2x.png') }} 2x"
                                alt="myCar logo" class="logo-transparent">

                            <img src=".{{ asset('assets/front/images/logo-mycar.png') }}"
                                srcset="{{ asset('assets/front/images/logo-mycar.png') }} 1x, {{ asset('assets/front/images/logo-mycar@2x.png') }} 2x"
                                alt="myCar logo">
                        </a>
                    </div>

                    <div class="header-item header-right flex-align-right">

                        <!-- Sidemenu Trigger -->
                        <a class="sidemenu-trigger hamburger item" data-trigger-for="menu01">

                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </a>


                        <!-- Include Menu -->

                        <!-- Header Menu-->

                        <div class="menu-default burger-sidemenu sidemenu-open-right icons-left profile-priority slide-out-sq dimmed dropdown-open-right"
                            data-burger="menu01">

                            <a class="sidemenu-trigger xclose-sq hamburger hamburger-elastic item"
                                data-trigger-for="menu01">

                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </a>

                            <ul class="main-menu">
                                <li><a href="{{ route('register') }}" class="item modal-ui-triggers"
                                        data-trigger-for="modal0134">
                                        <span>Sign Up</span>
                                    </a>
                                </li>

                                @if (auth()->user())
                                    <li><a href="{{ route('login') }}" class="item modal-ui-triggers"
                                            data-trigger-for="modal0234">
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="mr-0">
                                        <a href="{{ route('logout') }}" class="nav-link p-0 "
                                            onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form2" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('dashboard.index') }}" class="item modal-ui-triggers"
                                            data-trigger-for="modal0234">
                                            <span>Log In</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <!-- End of Header Menu-->

                    </div>
                </div>

            </div>
        </header>


        @yield('content'))


        <!--FOOTER-->
        <div id="footer">

            {{-- <div class="footer-top">

                <div class="ui grid container">
                    <div class="row">
                        <div class="ui six wide tablet four wide computer column">
                            <h5>Hosting</h5>

                            <ul class="list-default-sq">
                                <li><a href="">Etiam consequat</a></li>
                                <li><a href="">Phasellus sed neque </a></li>
                                <li><a href="">Morbi suscipit convallis</a></li>
                                <li><a href="">Praesent diam</a></li>
                            </ul>

                        </div>
                        <div class="ui six wide tablet four wide computer column">
                            <h5>Useful Links</h5>

                            <ul class="list-default-sq">
                                <li><a href="">Aenean sit amet ipsum</a></li>
                                <li><a href="">Sed mollis</a></li>
                                <li><a href="">Aliquam porttitor</a></li>
                                <li><a href="">Nulla vitae</a></li>
                            </ul>
                        </div>
                        <div class="ui twelve wide tablet four wide computer column">
                            <h5>Title</h5>

                            <p><em>In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit nec magna
                                    ultricies convallis. In venenatis eu erat et facilisis. Vestibulum congue enim nisl.
                                    Fusce arcu enim, porta a auctor vel, hendrerit a libero. Vivamus vel dapibus
                                    sem.</em></p>
                        </div>
                    </div>
                </div>


            </div> --}}

            <div class="footer-bottom">
                <div class="ui grid container">
                    <div class="row">
                        <div class="ui twelve wide mobile eight wide computer column">
                            <a href="" class="footer-logo">
                                <img src="{{ asset('assets/front/images/logo-mycar-transparent.png') }}"
                                    srcset="{{ asset('assets/front/images/logo-mycar-transparent.png') }} 1x, {{ asset('assets/front/images/logo-mycar-transparent@2x.png') }} 2x"
                                    alt="mycar logo">
                                © 4wheel 2021 </a>
                        </div>
                        <div class="ui twelve wide mobile four wide computer column">
                            <ul class="social-links-sq list-style-inline-sq list-default-sq">
                                <li><a href="" class="fb"><i class="icon icon-logo-facebook2"></i></a>
                                </li>

                                <li><a href="" class="tw"><i class="icon icon-logo-twitter-bird2"></i></a>
                                </li>

                                <li><a href="" class="gp"><i
                                            class="icon icon-logo-circle-google-plus-22"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!--end #page-wrapper-->
    <script src="{{asset('assets/js/plugins/custom/magnific-popup.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('assets/front/library/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('assets/front/library/flexmenu.js') }}"></script>
    <script src="{{ asset('assets/front/library/nouislider.min.js') }}"></script>

    <script src="{{ asset('assets/front/library/wNumb.js') }}"></script>

    <script src="{{ asset('assets/front/library/jrespond.min.js') }}"></script>
    <script src="{{ asset('assets/front/library/scrollspy.min.js') }}"></script>

    <script src="{{ asset('assets/front/library/visibility.js') }}"></script>

    <script src="{{ asset('assets/front/library/accordion.js') }}"></script>
    <script src="{{ asset('assets/front/library/dropdown-custom.js') }}"></script>
    <script src="{{ asset('assets/front/library/sticky.js') }}"></script>

    <script src="{{ asset('assets/front/library/page-transition.js') }}"></script>
    <script src="{{ asset('assets/front/library/checkbox.js') }}"></script>
    <script src="{{ asset('assets/front/library/transition.js') }}"></script>
    <script src="{{ asset('assets/front/library/sidebar.js') }}"></script>

    <script src="{{ asset('assets/front/library/modal.js') }}"></script>
    <script src="{{ asset('assets/front/library/dimmer.js') }}"></script>

    <!-- Datepicker -->
    <script src="{{ asset('assets/front/library/popup.js') }}"></script>
    <script src="{{ asset('assets/front/library/calendar.js') }}"></script>

    <!-- Slick -->
    <script src="{{ asset('assets/front/library/slick.js') }}"></script>

    <script src="{{ asset('assets/front/library/header.js') }}"></script>
    <script src="{{ asset('assets/front/library/functions.js') }}"></script>

</body>

</html>
