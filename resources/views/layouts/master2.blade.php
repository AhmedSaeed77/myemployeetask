<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{asset('css/tabler.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-flags.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-payments.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-vendors.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('css/demo.min.css?1674944402')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
     @yield('css')
  </head>

  

  <body  class=" d-flex flex-column">
    <script src="{{asset('js/demo-theme.min.js?1674944402')}}"></script>
    
    @yield('content')
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('js/tabler.min.js?1674944402')}}" defer></script>
    <script src="{{asset('js/demo.min.js?1674944402')}}" defer></script>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402')}}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world.js?1674944402')}}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world-merc.js?1674944402')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js?1674944402')}}" defer></script>
    <script src="{{ asset('js/demo.min.js?1674944402')}}" defer></script>
    @yield('js')
  </body>

  
</html>