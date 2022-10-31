@extends('layouts/base')
 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        
        .margen{
        margin-left: 40px;
        }
        .fondoCabecero{
        background-color: #555353
        }
        
    </style>
</head>

<body class="bg-dark">
<header>
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm fondoCabecero">
        <div class="container">
            <a class="navbar-brand" href="{{ route('adminMenu') }}">
                {{ config('app.name', 'SalesIn') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
            </div>
        </div>
    </nav>
</header>

@section('main')
<div id="app">
    <main class="py-4">
        @yield('main')
    </main>
    
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3 text-light">Users</h1>
            <div>
                <a href="{{ route('adminViews.create')}}" class="btn btn-primary mb-3 invisible">Add User</a>
            </div>
        </div>     
          
        <table class="table table-striped">
            <thead>
                <tr>
                <td class="text-light">ID</td>
                <td class="text-light">Name</td>
                <td class="text-light">Surname</td>
                <td class="text-light">Cicle_id</td>
                <td class="text-light">Actived</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->deleted==0)
                <tr>
                    <td class="text-light">{{($user->id)}}</td>
                    <td class="text-light">{{($user->name)}} </td>
                    <td class="text-light">{{($user->surname)}}</td>
                    <td class="text-light">{{($user->cicle_id)}}</td>
                    <td class="text-light">{{($user->actived)}}</td>
                    <td class="text-light">
                        <a href="{{ route('adminViews.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('adminViews.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    @if($user->actived==0)
                    <td>
                        <form action="{{ route('adminActivate', $user->id)}}" method="post">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary" type="submit">Activate</button>
                        </form>
                    </td>
                    @endif
                    @if($user->actived==1)
                    <td>
                        <form action="{{ route('adminDeactivate', $user->id)}}" method="post">
                        @csrf
                        @method('GET')
                        <button class="btn btn-danger" type="submit">Deactivate</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
        
    <div>
        @if($users->count())
            {{ $users->links() }}
        @endif
    </div>
</body>
@endsection