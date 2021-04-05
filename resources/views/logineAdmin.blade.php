<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/login/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="/css/login/images/img-01.png" alt="IMG">
				</div>
				
				<form class="login100-form validate-form"  method="post" action="{{route('login.form')}}">
                    
                    {{csrf_field()}}
                    <label class="login100-form-title">
                        @if(isset($estatus))
                                @if($estatus == "success")
                                    <label class="text-success">{{$mensaje}}</label>
                                @elseif($estatus == "error")
                                    <label class="text-danger">{{$mensaje}}</label>
                                @endif
                    	 @endif
                    </label>
					<span class="login100-form-title">
						Iniciar sesion Administrador
                        <br>
                        Registrate o inicia sesion para poder acceder
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="correo" placeholder="Correo electronico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('registrarse')}}">
							Registrarse
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>

</body>
</html>