
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

<div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fondoCabecero">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">
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
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
        <div class="margen ">
         <div class="row">
             <div class="col-md-8 col-md-offset-2 ">
    	      <h1 class="text-center text-light"> {{ __("Users") }} </h1>
           <table>
            <thead class="text-light">
                <tr>
                    <th>{{ __("Name") }}</th>
                    <th>{{ __("Email") }}</th>
                </tr>
               
            </thead>    
    	      @forelse($users as $user)
	               <div class="panel panel-default">
                    <tr>
                    <td>
	                    <div class="panel-heading">
	                     	<a href="users/{{ $user->id }}"> {{ $user->name }} </a>
	                    </div>
                    </td>
                    <td>
	                 <div class="panel-body text-light">
	                   {{ $user->email }}
	                </div>
                    </td>
                    </tr>
	             </div>
    	      @empty
	         <div class="alert alert-danger">
	          {{ __("No hay ningún foro en este momento") }}
	         </div>
    	      @endforelse
             </tr>
            </table>  
         </div>
   
</div>
</body