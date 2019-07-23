<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$sitesettings->title}}</title>
        <meta name="description" content="{{$sitesettings->details}}">
        <meta name="keywords" content="{{$sitesettings->keywords}}">

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
        <link rel="shortcut icon" href="{{ asset('images/newvision/'. $sitesettings->siteico) }}">
    </head>
    
    <body style="direction:ltr;">
     

    <!-- Navbar section -->
    @include('front.layouts.navbar')

    <!-- Slider section -->
    @include('front.layouts.slider')

    <!-- About us section  -->
    @include('front.layouts.about')
    
    <!-- Service section  -->
    @include('front.layouts.services')

    <!-- Orders section  -->
    @include('front.layouts.orders')
    
    <!-- Maillist section start -->
    @include('front.layouts.maillist')
     
    <!-- Contact section start -->
    @include('front.layouts.contact')

    <!-- Footer section start -->
    @include('front.layouts.footer')
     


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
    </body>
</html>