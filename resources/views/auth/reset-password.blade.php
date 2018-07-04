@extends('auth.base')

@section('content')
	
	<div class="container">
	
		<div class="col-md-4 col-md-offset-4">

			<div class="panel panel-login panel-default">
				<div class="text-center">
					<img class="panel-logo-img" src="/img/artwork-source.png" alt="">
				</div>

				@if(session()->has('error'))
					<div class="alert alert-danger">
						<ul>
							<li>{{ session('error') }}</li>
						</ul>
					</div>
				@endif
			
				<div class="panel-body">
					<form method="POST" action="/reset-password">
						{{ csrf_field() }}
						<div class="form-group">
							<label style="font-weight: normal" for="email">Introduzca su dirección de correo electrónico para recibir una nueva contraseña:</label>
							<input class="form-control" name="email" type="email" placeholder="Correo electrónico">
						</div>
						<button type="submit" class="btn btn-block btn-login">Recibir nueva contraseña</button>
					</form>

				</div>
			</div>
		</div>

	</div>

@stop