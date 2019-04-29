<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel5.7 + Vue.js2.5</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        </style>
    </head>
    <body>
        @guest
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Dashboard</div>
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @else
        <div id="app">
            <switch-component
            name="{{ Auth::user()->name }}"
            logout="{{ route('logout') }}">
            </switch-component>
        </div>
        @endguest
        <script src=" {{ mix('js/app.js') }} "></script>
    </body>
    </html>