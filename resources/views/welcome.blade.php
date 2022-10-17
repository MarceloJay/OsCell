<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OsCell</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
        <style>
            
            html, body {          
                /* background: var(--background-cell); */
                background-size: 5% !important;                
                background-color: var(--background-default);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 900;
                height: 100vh;
                margin: 0;
            }

            .title {                
                text-shadow: 2px 0 #fff, -2px 0 #fff, 0 2px #fff, 0 -2px #fff,
                    1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
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
                /* display: inline; */
                /* text-align: left; */
                font-size: 84px;
            }

            /* .title {
                font-size: 84px;
            } */

            .links > a {
                color: var(--white);
                font-family: 'Gill Sans';
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: underline;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .decoration {
                margin-top: -400px;
            }
            #line-success {
                width: 50%;
                border: 3px solid var(--success);
                border-radius: 10px;
            }
            #line-warning{
                margin-left: -210;
                width: 800px;
                border: 3px solid var(--warning);
                border-radius: 10px;
            }
            #line-danger{
                /* display: inline-block; */
                width: 700px;
                border: 3px solid var(--danger);
                float: left;
                border-radius: 10px;
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
                <div class="title m-b-md">
                    OsCell
                </div>
            </div>
            
        </div>
        <div class="decoration">
            <div id="line-success"></div><br>
            <div id="line-warning"></div><br>
            <div id="line-danger"></div>
        </div>
    </body>
</html>
