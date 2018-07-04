@extends('auth.base')

@section('content')
	
	<div class="container">
	
		<div class="col-md-4 col-md-offset-4">

			<div class="panel panel-login panel-default">
				<div class="text-center">
					<img class="panel-logo-img" src="/img/artwork-source.png" alt="">
				</div>
			
				<div class="panel-body">
					<p>Se le ha enviado un correo electrónico con una nueva contraseña a la dirección de correo electrónico proporcionada. Si no aparece en su bandeja de entrada recuerde buscar en la carpeta de "spam"</p>
					<p><a href="{{ url('/login') }}">Ir a la pantalla de login</a></p>
				</div>
			</div>
		</div>

	</div>

@stop