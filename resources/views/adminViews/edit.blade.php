@extends('layouts/base')
 
@section('main')
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
        

        <main class="py-4">
            @yield('main')
        </main>
    </div>
    <div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing User</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif

        <form method="post" action="{{ route('adminViews.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
            </div>
 
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" value="{{ $user->surname }}" />
            </div>
 
            <div class="form-group">
                <label for="email">User Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
            </div>

            <div class="form-group">
                <label for="cicle_id">Cicle Id: </label>
                <input type="text" class="form-control" name="cicle_id" value="{{ $user->cicle_id }}" />
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
    </body>
@endsection