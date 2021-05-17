<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KR Store</title>
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="color: red">
                    โรงปูนเขตรุ่งเรือง
                </div>

                <div class="links">
                    <a href="products" style="color: blue">คลัง</a>
                    <a href="mechanics" style="color: blue">ช่างซ่อมรถ</a>
                    <a href="drivers" style="color: blue">คนขับรถ</a>
                    <a href="trucks" style="color: blue">รถ</a>
                    <a href="https://nova.laravel.com" style="color: blue">ร้านค้า</a>
                    <a href="billbs" style="color: blue">บิลซ่อมรถ</a>
                    <a href="diesels" style="color: blue">น้ำมัน</a>
                    <a href="https://github.com/laravel/laravel" style="color: blue">รายงาน</a>
                </div>
                <br> <hr> <br>
                <div class="links">
                    <a href="teaks" style="color: green">คลังโรงไม้</a>
                    <a href="mechanics" style="color: green">ช่างโรงไม้</a>
                    <a href="drivers" style="color: green">คนขับรถ</a>
                    <a href="trucks" style="color: green">รถ</a>
                    <a href="#" style="color: green">ร้านค้า</a>
                    <a href="billbs" style="color: green">บิลซ่อมรถ</a>
                    <a href="#" style="color: green">บิลเบิกของ</a>
                    <a href="#" style="color: green">รายงาน</a>
                </div>
            </div>
        </div>
    </body>
</html>
