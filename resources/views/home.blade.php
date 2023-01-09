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
    <body class=" text-light" >
        <br>
    <button class="btn btn-primary">Get PDF</button>
        <div id="app">
        

        <main class="py-4">
            @yield('main')
        </main>
    </div>
    <div class="row">
    
    <div class="col-sm-8 offset-sm-2">
   
    <div class="title text-dark">
                    Offers
                </div>
                <br>
                <br>
                <div class="customer-feedback">
		<div class="container text-center">
			<div class="row d-flex align-items-center flex-column ">
				<div class="col-sm-offset-2 col-sm-8">
					<div>
						<h2 class="section-title"></h2>
					</div>
				</div><!-- /End col -->
			</div><!-- /End row -->

			<div class="row d-flex align-items-center flex-column ">
				<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
					<div class="owl-carousel feedback-slider">

						<!-- slider item -->
						<div class="feedback-slider-item text-black bg-dark" >
                        
							<h3  class="customer-name text-primary">Titulo</h3>
							<p>Descripcion</p>
							<span  class="light-bg">
								
                            <button class="btn btn-primary">Show</button>
								<button class="btn btn-primary">Apply</button
							</span>
						</div>
                        <div class="feedback-slider-item text-black bg-dark" >
                        
							<h3  class="customer-name text-primary">Titulo</h3>
							<p>Descripcion</p>
							<span  class="light-bg">
								
                            <button class="btn btn-primary">Show</button>
								<button class="btn btn-primary">Apply</button
							</span>
						</div>
                        <div class="feedback-slider-item text-black bg-dark" >
                        
							<h3  class="customer-name text-primary">Titulo</h3>
							<p>Descripcion</p>
							<span  class="light-bg">
								
                            <button class="btn btn-primary">Show</button>
								<button class="btn btn-primary">Apply</button
							</span>
						</div>
						

						
					</div><!-- /End feedback-slider -->

    </div>
</div>

    </body>
@endsection