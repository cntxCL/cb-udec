<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CBUdec - Registro</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{ asset("admin-lte/bootstrap/css/bootstrap.min.css") }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset("admin-lte/dist/css/AdminLTE.min.css") }}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
	<div class="register-logo">
		<b>CB</b>UdeC
	</div>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<h4><i class="icon fa fa-ban"></i> ¡Oops! Hubieron errores de validación</h4>
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<div class="register-box-body">
		<p class="login-box-msg">Registro de un nuevo usuario</p>

	<form role="form" method="POST" action="{{ url('/register') }}">
		{{ csrf_field() }}
		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="password" class="form-control" placeholder="Contraseña">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="password_confirmation" class="form-control" placeholder="Reescribir contraseña">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="row">
			<!-- /.col -->
			<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<a href="/login" class="text-center">Ya tengo una cuenta</a>
	</div>
	<!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

</body>
</html>
