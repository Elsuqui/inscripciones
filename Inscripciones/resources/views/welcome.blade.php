<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SYS BOOT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
         <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            
            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('img/logo.jpeg') }}" width="auto" height="auto" />SYS BOOT
                </div>

                <div class="title m-b-md">
                    Inscripción de Sorteo
                </div>

                <form action="route('HomeController@store')" method="POST" class="form-group card">
                    @crsf
                    <div class="card-body">
                            <h5 class="card-title">Ingrese los datos del participante: </h5>
                            <div class="input-group mb-3">
                                <input id="primer_nombre" name="primer_nombre" class="form-control" placeholder="Primer Nombre" aria-label="Primer Nombre" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                    <input id="segundo_nombre" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" aria-label="Segundo Nombre" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <input id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Primer Apellido" aria-label="Primer Apellido" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                    <input id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" aria-label="Segundo Apellido" aria-describedby="basic-addon1">
                            </div>
            
                            <div class="input-group mb-3">
                                <input id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                            </div>
            
                            <div class="input-group mb-3">
                                <input id="telefono" name="telefono" class="form-control" placeholder="Telefono" aria-label="Numero" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <input id="numero" name="numero" class="form-control" placeholder="Numero" aria-label="Numero" aria-describedby="basic-addon1">
                            </div>
        
                            <button type="button" class="btn btn-primary">REGISTRAR</button>
                    </div>
                </form>      
            </div>
        </div>
    </body>
</html>
