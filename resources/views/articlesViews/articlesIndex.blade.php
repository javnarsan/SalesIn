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

@section('main')
<div id="app">
    <main class="py-4">
        @yield('main')
    </main>
    
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3 text-light">Articles</h1>
            <div>
                <form action="{{ route('articlesViews.create')}}" >
                    @csrf
                    <button class="btn btn-primary" type="submit">Add Article</button>
                </form>
            </div>
        </div>     
          
        <table class="table table-striped">
            <thead>
                <tr>
                <td class="text-light">ID</td>
                <td class="text-light">Title</td>
                <td class="text-light">Image</td>
                <td class="text-light">Description</td>
                <td class="text-light">Cicle_id</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                @if($article->deleted==0)
                <tr>
                    <td class="text-light">{{($article->id)}}</td>
                    <td class="text-light">{{($article->title)}} </td>
                    <td class="text-light">{{($article->image)}}</td>
                    <td class="text-light">{{($article->description)}}</td>
                    <td class="text-light">{{($article->cicle_id)}}</td>
                    
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
        
    <div>
        @if($articles->count())
            {{ $articles->links() }}
        @endif
    </div>
</body>
@endsection