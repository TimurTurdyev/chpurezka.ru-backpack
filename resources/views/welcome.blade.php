<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <base href="{{url('/')}}">

    <!--// Boostrap v4 //-->
    <link rel="stylesheet" href="theme/vendor/css/bootstrap.min.css">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="theme/vendor/css/magnific.popup.min.css">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="theme/vendor/css/animate.min.css">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="theme/vendor/css/owl.carousel.min.css">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="theme/vendor/css/owl.carousel.default.min.css">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="theme/fonts/font_awesome/css/all.css">
    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="theme/css/style.css">
</head>
<body>

<!--// Page Wrapper Start //-->
<div class="page-wrapper" data-scroll-index="0">
    <!--// Header Start //-->
    <header class="header" id="header">
        <div id="navbar-top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8 nav-info-wrap">
                        <div class="nav-info-box">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{config('setting.site.email')}}">
                                <span>{{config('setting.site.email')}}</span>
                            </a>
                        </div>
                        <div class="nav-info-box">
                            <i class="fa fa-map-marker"></i>
                            <span>{{config('setting.site.address')}}</span>
                        </div>
                    </div>
                    <div class="col-md-4 nav-social-links">
                        <a href="{{config('setting.site.facebook')}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{config('setting.site.twitter')}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{config('setting.site.instagram')}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{config('setting.site.youtube')}}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav-menu-wrap">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="navbar-brand" title="{{config('setting.site.title')}}" href="{{url('/')}}">
                        <img src="{{asset(config('setting.site.logo'))}}" alt="{{config('setting.site.title')}}"
                             class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar"
                            aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                    </button>
                    <button class="search-btn-mobile" data-toggle="modal" data-target="#headerSearchBar"><i
                                class="fa fa-search"></i></button>
                    <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                        <ul class="navbar-nav">
                            {!! config('setting.site.menu') !!}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--// Header End  //-->

    <!--// Main Area Start //-->
    <main class="main-area">

    @yield('content')

    <!--// Footer Start //-->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 footer-widget-resp">
                            <div class="footer-widget">
                                <h6 class="footer-title">О нас</h6>
                                <p class="footer-desc">
                                    {{config('setting.site.about_us')}}
                                </p>
                                <div class="footer-social-links">
                                    <a href="{{config('setting.site.facebook')}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="{{config('setting.site.twitter')}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="{{config('setting.site.instagram')}}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="{{config('setting.site.youtube')}}">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 footer-widget-resp">
                            <div class="footer-widget footer-widget-pl">
                                <h6 class="footer-title">Информация</h6>
                                <ul class="footer-links">
                                    {!!config('setting.site.footer_links')!!}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 footer-widget-resp">
                            <div class="footer-widget">
                                <h6 class="footer-title">Наши контакты</h6>
                                <div class="footer-contact-info-wrap">
                                    <ul class="footer-contact-info-list">
                                        <li>
                                            <h6>Адрес:</h6>
                                            <p>
                                                {{config('setting.site.address')}}
                                            </p>
                                        </li>
                                        <li>
                                            <h6>Почта и телефон:</h6>
                                            <div class="text">
                                                <p>{{config('setting.site.phone')}}</p>
                                                <p>{{config('setting.site.email')}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p class="copyright-text">© Copyright 2020. Designed By Aip Themes</p>
                </div>
            </div>
        </footer>
        <!--// Footer End //-->

    </main>
    <!--// Main Area End //-->

    <a href="#" data-scroll-goto="0" class="scroll-top-btn">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!--// .scroll-top-btn // -->

    <div id="preloader-wrap">
        <div class="preloader-inner">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!--// Preloader // -->

</div>
<!--// Page Wrapper End //-->

<div class="modal fade custom-modal" tabindex="-1" id="headerSearchBar" role="dialog" aria-labelledby="headerSearchBar"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="exampleModalLabel">Search A Keyword..</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="popup-form-group">
                        <span class="fa fa-search"></span>
                        <input type="text" class="popup-form-control" autocomplete="off" required autofocus
                               id="search-name"/>
                        <button type="submit" class="searchbar-btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--// #headerSearchBar //-->

<!--// JQuery //-->
<script src="theme/vendor/js/jquery.min.js"></script>
<!--// Images Loaded //-->
<script src="theme/vendor/js/images.loaded.min.js"></script>
<!--// Magnific Popup //-->
<script src="theme/vendor/js/magnific.popup.min.js"></script>
<!--// Popper Popup //-->
<script src="theme/vendor/js/popper.min.js"></script>
<!--// Bootstrap //-->
<script src="theme/vendor/js/bootstrap.min.js"></script>
<!--// Waypoint Js //-->
<script src="theme/vendor/js/waypoint.min.js"></script>
<!--// Counter Up Js //-->
<script src="theme/vendor/js/counter.up.min.js"></script>
<!--// JQuery Easing Functions //-->
<script src="theme/vendor/js/jquery.easing.min.js"></script>
<!--// Owl Carousel //-->
<script src="theme/vendor/js/owl.carousel.min.js"></script>
<!--// Wow JS //-->
<script src="theme/vendor/js/wow.min.js"></script>
<!--// ScrollIt JS //-->
<script src="theme/vendor/js/scrollit.min.js"></script>
<!--// Isotope Gallery JS //-->
<script src="theme/vendor/js/isotope.min.js"></script>
<!--// Main Js //-->
<script src="theme/js/main.js"></script>
@stack('javascript')
</body>
</html>
