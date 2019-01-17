<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('shubhkart_page_title')</title>

        <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"-->

        <!-- Styles -->

        <link href="{{asset('css/shubhkart-style.css')}}" media="all" rel="stylesheet" type="text/css"/>
        <!--link type="text/css" rel="stylesheet" href="{{asset('css/general.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/media.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/common.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" /-->

        <!-- Scripts -->
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>       
    </head>
    <body>
        <div class="container-fluid">
        @include('skart/header')  

		@yield('shubhkart_content')

        @include('skart/footer')
		<?php /*@include('footer') */ ?>		        
        </div>
    </body>
</html>
