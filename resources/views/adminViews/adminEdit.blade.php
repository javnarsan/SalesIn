
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
          
        
                $user
	               <div class="panel panel-default">
                    
	                    <div class="panel-heading">
	                    <!--	<a href="{{ route('adminEdit $user->id') }}"> {{ $user->name }} </a>-->
                             <a href="../adminEdit/{{ $user->id }}"> {{ $user->name }} </a>
	                    </div>
                    
                    <td>
	                 <div class="panel-body text-light">
	                   {{ $user->email }}
	                </div>
                   
	             </div>
    	      @empty
	         <div class="alert alert-danger">
	          {{ __("No hay ningún foro en este momento") }}
	         </div>
    	    
            
         </div>
   
</div>