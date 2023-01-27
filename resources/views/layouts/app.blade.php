<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="discription" content="">

        <!-- OGPタグ -->
        <meta property="og:site_name" content="Wimps"/>
        <meta property="og:title" content="Wimps">
        <meta property="og:description" content="弱音限定SNS。ただ聞いてほしいだけ。弱音を吐いて楽になろう。">
        <meta property="og:type" content="article">
        <meta property="og:url" content="https://blackcat-bear.sakura.ne.jp/Wimps/">
        <meta property="og:image" content="{{asset('images/wimps_bunner.png')  }}">
        <meta property="og:locale" content="ja_JP">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--リセットcss-->
        <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
        
        <!-- animate -->
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">

        <!--main-css-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <title>弱音限定SNS Wimps</title>
    </head>
    <body>

        <div id="app" class="app">
            @include('commons.header')

            @yield('content')
        </div>

        <!--javaScript-->
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>

        <!--waypoint-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.0.0/jquery.waypoints.min.js"></script>

        <!--font-awesome-->
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

        <!--main-javaScript-->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>


    </body>
</html>