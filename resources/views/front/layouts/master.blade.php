<!DOCTYPE html>
<html dir="rtl" lang="ar">

    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - @if(isset($sitesettings->title)) {{$sitesettings->title}} @endif</title>
        <meta name="description" content="@if(isset($sitesettings->description)) {{$sitesettings->description}} @endif">
        <meta name="keywords" content="@if(isset($sitesettings->keywords)) {{$sitesettings->keywords}} @endif">

        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pluton.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/cairo.css') }}">
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="{{ asset('css/pluton-ie7.css') }}" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.cslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" 
        href="{{ asset('images/ico/apple-touch-icon-144.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" 
        href="{{ asset('images/ico/apple-touch-icon-114.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" 
        href="{{ asset('images/apple-touch-icon-72.png') }}">
        <link rel="apple-touch-icon-precomposed" 
        href="{{ asset('images/ico/apple-touch-icon-57.png') }}">

        @if(isset($sitesettings->siteico))
        <link rel="shortcut icon" href="{{ asset('storage/images/'. $sitesettings->siteico) }}">
        @endif
    </head>
    
    <body>

    @include('front.navbar')


    <div id="home">
    <div id="contact" class="contact">
    <div class="section secondary-section">
                
                @if(Route::currentRouteName() != 'HomePage' and Route::currentRouteName() != 'FallBack')
                    <div class="container">
                        <div id="pagetitle">
                            <h2>@yield('title')</h2>
                        </div>

                        @if(isset($links))
                        <div class="links">
                            @include('front.links')
                        </div>  
                        @endif

                    </div>
                @endif

                <div class="container">
                <div class="row">
                    @yield('content')
                </div>
                </div>
                            
    </div>
    </div>
    </div>
 

    @include('front.footer')
     


        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.mixitup.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.cslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.placeholder.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.inview.js') }}"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="{{ asset('js/respond.min.js') }}"></script>
        <![endif]-->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d5c2949fcef76d3"></script>


    </body>
</html>




