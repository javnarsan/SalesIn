
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Edit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            .fondoCabecero{
            background-color: #555353
           }
        </style>
          <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body class="bg-dark text-light" >
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fondoCabecero shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin/adminUpdate') }}">
                    {{ config('app.name', 'SalesIn') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
            <div class="content">
                <div class="container">
                    <form method="POST" action="{{ route('login') }}">
                            <div class="title">
                            {{ __('ACTIVATE USER') }}
                            </div>
                                <div class="form-group row">
                                    <label for="text" class="col-md-8 col-form-label text-md-right" >This is the user. Are you sure to activate this user?</label>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="email" class="col-md-6 col-form-label text-md-right" >{{ __('E-Mail Address') }}</label>
                                    <label for="email" class="col-md-1 col-form-label text-md-left" >{{ $user->email }}</label>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <label for="password" class="col-md-1 col-form-label text-md-left" >{{ $user->name }}</label>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Surname') }}</label>
                                    <label for="password" class="col-md-1 col-form-label text-md-left" >{{ $user->surname }}</label>
                                </div>
                        

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-0.75">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Yes') }}
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('No') }}
                                        </button>
                                    </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </body>
