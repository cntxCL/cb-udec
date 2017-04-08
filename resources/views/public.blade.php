<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CB-UdeC</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/select2/select2.min.css") }}">
	<!-- fullCalendar -->
	<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.min.css") }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			 folder instead of downloading all of them to reduce the load. -->
	<link href="{{ asset("/admin-lte/dist/css/skins/skin-green.min.css")}}" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

	<header class="main-header">
		<nav class="navbar navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand"><b>CB</b>UdeC</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>

				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li><a href="/login">Iniciar Sesión</a></li>
					</ul>
				</div>

				<!-- /.navbar-custom-menu -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</header>
	<!-- Full Width Column -->
	<div class="content-wrapper">
		<div class="container">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Calendario de Reservas
				</h1>
			</section>

			<!-- Main content -->
			<section class="content">
			<div class="box box-default">
				<div class="box-body">
					<div class="row">
						<form class="col-md-12 form-inline">
							<div class="form-group">
								<label>Seleccione Sala:</label>  &nbsp;
									<select class="form-control col-md-10 select2" id="selectSala">
										@foreach($salas as $sala)
										<option value="{{$sala->id}}">{{$sala->nombre}}</option>
										@endforeach
									</select>
								</div>
							<button class="btn btn-primary" type="button" id="btnCargarReservas">Cargar Reservas</button>
						</form>
					</div>
					<div id="calendar"></div>
				</div>
			</div>
				<!-- /.box -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="container">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.7
			</div>
			<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
			reserved.
		</div>
		<!-- /.container -->
	</footer>
</div>
<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="{{ asset("/admin-lte/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset("/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/select2/select2.min.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/moment.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.min.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.locales.js") }}"></script>
	<script src="{{ asset("/js/public.js") }}"></script>
</body>
</html>
