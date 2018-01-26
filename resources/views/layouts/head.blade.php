<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

     <link href="{{ asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

    <link href="{{ asset('css/shop-item.css') }}" rel="stylesheet">

    <link href="{{ asset('css/base.css') }}" rel="stylesheet" media="screen"/>

    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

    <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    
    <style>
        .well {
            background-color: #FFFFFF;
            border: 1px solid #F7F7F0;
            border-radius: 4px;
            box-shadow: none;
            margin-bottom: 20px;
            min-height: 20px;
            padding: 35px;
        }
        .slider {
          display: inline-block;
          vertical-align: middle;
          position: relative;
        }
        .slider.slider-horizontal {
          width: 210px;
          height: 20px;
        }
        .slider.slider-horizontal .slider-track {
          height: 15px;
          left: 0;
          margin-top: -5px;
          top: 50%;
          width: 100%;
        }
        .slider.slider-horizontal .slider-selection {
          height: 100%;
          top: 0;
          bottom: 0;
        }
        .slider.slider-horizontal .slider-handle {
          margin-left: -12px;
          margin-top: 2px;
        }

        .left-round{
          margin-left:2px !important;
        }

        .slider.slider-horizontal .slider-handle.triangle {
          border-width: 0 10px 10px 10px;
          width: 0;
          height: 0;
          border-bottom-color: #0480be;
          margin-top: 0;
        }
        .slider.slider-vertical {
          height: 210px;
          width: 20px;
        }
        .slider.slider-vertical .slider-track {
          width: 10px;
          height: 100%;
          margin-left: -5px;
          left: 50%;
          top: 0;
        }
        .slider.slider-vertical .slider-selection {
          width: 100%;
          left: 0;
          top: 0;
          bottom: 0;
        }
        .slider.slider-vertical .slider-handle {
          margin-left: -5px;
          margin-top: -10px;
        }
        .slider.slider-vertical .slider-handle.triangle {
          border-width: 10px 0 10px 10px;
          width: 1px;
          height: 1px;
          border-left-color: #0480be;
          margin-left: 0;
        }
        .slider input {
          display: none;
        }
        .slider .tooltip-inner {
          white-space: nowrap;
        }
        .slider-track {
          position: absolute;
          cursor: pointer;
          background-color: #f7f7f7;
          background-image: -moz-linear-gradient(top, #f5f5f5, #f9f9f9);
          background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f5f5f5), to(#f9f9f9));
          background-image: -webkit-linear-gradient(top, #f5f5f5, #f9f9f9);
          background-image: -o-linear-gradient(top, #f5f5f5, #f9f9f9);
          background-image: linear-gradient(to bottom, #f5f5f5, #f9f9f9);
          background-repeat: repeat-x;
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);
          -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
          -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
          -webkit-border-radius: 15px;
          -moz-border-radius: 15px;
          border-radius: 15px;
        }

        .slider-selection {
          -moz-box-sizing: border-box;
          background: none repeat scroll 0 0 #FE980F;
          border-radius: 15px;
          box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
          position: absolute;
        }

        .slider-handle {
          background: #fff;
          box-shadow:none;
          height: 10px;
          opacity: 1;
          position: absolute;
          width: 10px;
        }

        .slider-handle.round {
          -webkit-border-radius: 20px;
          -moz-border-radius: 20px;
          border-radius: 20px;
        }
        .slider-handle.triangle {
          background: transparent none;
        }

        .side-by-side {
            display: inline-block;
        }
    </style>

   

