<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">



    <!-- script
    ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>



    <!-- favicons
    ================================================== -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('images/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('images/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body id="top">

<!-- pageheader
================================================== -->
<section class="s-pageheader">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="{{asset('')}}">
                    {{--<img src="{{asset('images/main-logo.png')}}" alt="Technomancy">--}}
                    TECHOMANCY
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->


            @widget('mainMenu')

        </div> <!-- header-content -->
    </header> <!-- header -->


    @yield('headerWidget')



</section> <!-- end s-pageheader -->

@yield('content')


<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-two md-four mob-full s-footer__sitelinks">

                <h4>Quick Links</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">Home</a></li>
                    <li><a href="#0">Blog</a></li>
                    <li><a href="#0">Styles</a></li>
                    <li><a href="#0">About</a></li>
                    <li><a href="#0">Contact</a></li>
                    <li><a href="#0">Privacy Policy</a></li>
                </ul>

            </div> <!-- end s-footer__sitelinks -->

            <div class="col-two md-four mob-full s-footer__archives">

                <h4>Archives</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">January 2018</a></li>
                    <li><a href="#0">December 2017</a></li>
                    <li><a href="#0">November 2017</a></li>
                    <li><a href="#0">October 2017</a></li>
                    <li><a href="#0">September 2017</a></li>
                    <li><a href="#0">August 2017</a></li>
                </ul>

            </div> <!-- end s-footer__archives -->

            <div class="col-two md-four mob-full s-footer__social">

                <h4>Social</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">Facebook</a></li>
                    <li><a href="#0">Instagram</a></li>
                    <li><a href="#0">Twitter</a></li>
                    <li><a href="#0">Pinterest</a></li>
                    <li><a href="#0">Google+</a></li>
                    <li><a href="#0">LinkedIn</a></li>
                </ul>

            </div> <!-- end s-footer__social -->

            <div class="col-five md-full end s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">

                        <input type="submit" name="subscribe" value="Send">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Philosophy 2018</span>
                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<!-- Java Script
================================================== -->

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>