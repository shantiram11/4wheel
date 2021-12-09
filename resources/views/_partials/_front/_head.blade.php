<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Standard Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SeventhQueen" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/less" href="{{ asset('assets/front/less/base.less') }}">
    <link rel="stylesheet" type="text/less" href="{{ asset('assets/front/less/header.less') }}">
    <link rel="stylesheet" type="text/less" href="{{ asset('assets/front/less/theme.less') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/icon/style') }}">
    <link rel="icon" href="{{ asset('assets/front/images/ico/favicon.ico') }}">

    <script src="{{ asset('assets/front/library/modernizr-custom.js') }}"></script>
    <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/less.js/2.1.0/less.min.js') }}"></script>
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

                                <li><a href="become_a_vendor.html" class="item">
                                        <span>Become a Vendor</span>
                                    </a>
                                </li>


                                <li><a href="frontend/vendor/register" class="item modal-ui-trigger"
                                        data-trigger-for="modal01">
                                        <span>Sign Up</span>
                                    </a>
                                </li>

                                <li><a href="#" class="item modal-ui-trigger" data-trigger-for="modal02">
                                        <span>Log In</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- End of Header Menu-->

                    </div>
                </div>

            </div>
        </header>
