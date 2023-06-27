<!DOCTYPE html>
<html class="no-js" lang="{{str_replace('_','-', app()->getLocale())}}">

<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <meta name="description" content="Une galerie pour partager des photos d'animaux en famille" />
    <meta name="author" content="Harold Walter" />

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}" />

    <!-- script
    ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script defer src="{{ asset('js/fontawesome/all.min.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />
</head>

<body id="top">
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- header
    ================================================== -->
    <header class="s-header">
        <div class="s-header__logo">
            <a class="logo" href="index.route('home')">
                <img src="{{asset('images/logo.svg')}}" alt="Homepage" />
            </a>
        </div>


        <div class="row s-header__navigation">
            <nav class="s-header__nav-wrap">
                <h3 class="s-header__nav-heading h6">@lang('Navigate to')</h3>

                <ul class="s-header__nav">
                    <li {{currentRoute('home')}}>
                        <a href="{{route('home')}}" title="">@lang('Home')</a>
                    </li>
                    <li {{currentRoute('gallery')}}>
                        <a href="{{route('gallery')}}" title="">@lang('Gallery')</a>
                    </li>

                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="contact.html" title="">Contact</a></li>
                </ul>
                <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>
            </nav>
            <!-- end s-header__nav-wrap -->
        </div>
        <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <div class="s-header__search">
            <div class="s-header__search-inner">
                <div class="row wide">
                    <form role="search" method="get" class="s-header__search-form" action="#">
                        <label>
                            <span class="h-screen-reader-text">Search for:</span>
                            <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off" />
                        </label>
                        <input type="submit" class="s-header__search-submit" value="Search" />
                    </form>

                    <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>
                </div>
                <!-- end row -->
            </div>
            <!-- s-header__search-inner -->
        </div>
        <!-- end s-header__search wrap -->

        <a class="s-header__search-trigger" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983">
                <path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z" />
            </svg>
        </a>
    </header>
    <!-- end s-header -->

    <!-- content
    ================================================== -->
    <section class="s-content @if(currentRoute('home')) s-content--no-top-padding @endif">
        @yield('main')
    </section>
    <!-- end s-content -->

    <!-- footer
    ================================================== -->
    <footer class="s-footer">
        <div class="s-footer__main">
            <div class="row">
                <div class="column large-3 medium-6 tab-12 s-footer__info">
                    <h5>About Our Site</h5>

                    <p>
                        Lorem ipsum Ut velit dolor Ut labore id fugiat in ut
                        fugiat nostrud qui in dolore commodo eu magna Duis
                        cillum dolor officia esse mollit proident Excepteur
                        exercitation nulla. Lorem ipsum In reprehenderit
                        commodo aliqua irure.
                    </p>
                </div>
                <!-- end s-footer__info -->

                <div class="column large-2 medium-3 tab-6 s-footer__site-links">
                    <h5>Site Links</h5>

                    <ul>
                        <li><a href="#0">About Us</a></li>
                        <li><a href="#0">Gallery</a></li>
                        <li><a href="#0">Terms</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- end s-footer__site-links -->
            </div>
            <!-- end row -->
        </div>
        <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="column">
                    <div class="ss-copyright">
                        <span>© Copyright Calvin 2020</span>
                        <span>Design by
                            <a href="https://www.styleshout.com/">StyleShout</a></span>
                    </div>
                    <!-- end ss-copyright -->
                </div>
            </div>

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                        <path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>
            <!-- end ss-go-top -->
        </div>
        <!-- end s-footer__bottom -->
    </footer>
    <!-- end s-footer -->

    <!-- Java Script
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>