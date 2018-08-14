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
            .tab{
            	font-weight: bold;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .flex-left{
                float: left;
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
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .nav-item a{
                color: #000000;
                font-weight: bold;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/participantes')}}">Usuarios</a>
                </li>
        </ul>
        
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
            
            @auth
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Nombres</th>
							<th>Apellidos</th>
				            <th>Correo</th>
				            <th>Telefono</th>
				            <th>Numero de Suerte</th>
						</tr>
					</thead>
					<tbody class="tab">
						@if(count($suscriptores)>0)
							@foreach($suscriptores as $suscriptor)
								<tr>
								
									<td>  <a href="{{ url('/show_participante/' . $suscriptor->id) }}">
										Edit
									</a>
									
									</td>
								<td> {{$suscriptor->primer_nombre}} {{$suscriptor->segundo_nombre}} </td>
								<td> {{$suscriptor->primer_apellido}} {{$suscriptor->segundo_apellido}}</td>
								
								<td> {{$suscriptor->email}}</td>
								<td> {{$suscriptor->telefono}} </td>
								<td> {{$suscriptor->numero}}</td>
								</tr>
							@endforeach
						@else
						    <tr>
                                <td colspan="8">
                                    <div class="alert alert-info">No existen suscriptores</div>
                                </td>
                            </tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

            @else
            <div class="title m-b-md">
                    <img src="{{ asset('img/logo.jpeg') }}" width="auto" height="auto" />SYS BOOT
            </div>
            @endauth
        </div>
    </body>
</html>

