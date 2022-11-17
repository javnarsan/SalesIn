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
        <h1 class="display-3">Creating Article</h1>

        <form method="post" action="{{ route('newCreateArticle') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input id="title" type="text" class="form-control" name="title" />
            </div>
 
            <div class="form-group">
                <label for="image">Image:</label>
                <input id="image" type="text" class="form-control" name="image" />
            </div>
 
            <div class="form-group">
                <label for="description">Description:</label>
                <input id="description" type="text" class="form-control" name="description" />
            </div>

            <div class="form-group">
                <label for="cicle_id">Cicle Id: </label>
                <input id="cicle_id" type="text" class="form-control" name="cicle_id" />
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
    </body>
@endsection