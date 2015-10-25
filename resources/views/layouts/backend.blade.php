<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{$title or 'Home'}}</title>

        <link rel="shortcut icon" href="">

        <link rel="stylesheet" href="/backend/css/jquery-ui.css" />
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/backend/css/backend.css" />
        <link rel="stylesheet" href="/backend/css/select2.min.css" />
        <link rel="stylesheet" href="/backend/css/screen.css" />
        <link rel="stylesheet" href="/backend/css/extra.css" />

        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/backend/js/select2.min.js"></script>

        @yield('head')
    </head>
    <body>
        <div id="header">
            @include('backend.includes.topmenu')
        </div>

        <div id="main-content">
            <div id="menubar" class="sbopen">
                @include('backend.includes.menubar')
            </div>
            <div id="content-body">
                <div class="mana-data">
                    <h1 class="page-title">{{$title or 'Quản lý'}}</h1>
                    @yield('content')
                </div>
            </div>
        </div>

        <div id="footer">

            <p>Designed By <a href="#">Vifonic</a></p>

        </div>

        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/backend/js/main.js"></script>
        @yield('footer')
    </body>
</html>
