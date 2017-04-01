<!DOCTYPE html>
	<!--
	This is a starter template page. Use this page to start your new project from
	scratch. This page gets rid of all links and provides the needed markup only.
	-->
	<html>
	<head>
		<meta charset="UTF-8">
		<title>CB-UdeC</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.2 -->
		<link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- Datatables -->
		<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
		<!-- Datepicker -->
		<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/datepicker/datepicker3.css") }}">
		<!-- Select2 -->
		<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/select2/select2.min.css") }}">
		<!-- fullCalendar -->
		<link rel="stylesheet" href="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.min.css") }}">
		<!-- Theme style -->
		<link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
			  page. However, you can choose any other skin. Make sure you
			  apply the skin class to the body tag so the changes take effect.
		-->
		<link href="{{ asset("/admin-lte/dist/css/skins/skin-green.min.css")}}" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="skin-green fixed">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="/" class="logo"><b>CB</b>UdeC</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Notifications Menu -->
						<li class="dropdown notifications-menu">
							<!-- Menu toggle button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<!-- Inner Menu: contains the notifications -->
									<ul class="menu">
										<li><!-- start notification -->
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li><!-- end notification -->
									</ul>
								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li>

						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="{{ asset("user.png") }}" class="user-image" alt="User Image"/>
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">{{ Auth::user()->personal->nombre }}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="{{ asset("user.png") }}" class="img-circle" alt="User Image" />
									<p>
										{{ Auth::user()->personal->nombre }}
										<small>CBUdeC</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="/users/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil</a>
									</div>
									<div class="pull-right">
										<form action="{{ url('/logout') }}" method="POST">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-danger btn-flat">Cerrar sesión</button>
										</form>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="{{ asset("user.png") }}" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>{{ Auth::user()->personal->nombre }}</p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="header">MÓDULOS</li>
					<!-- Optionally, you can add icons to the links -->
					<li><a href="/users"><span><i class="fa fa-user"></i> Usuarios</span></a></li>
					<li><a href="/personal"><span><i class="fa fa-users"></i> Personal</span></a></li>
					<li><a href="/proyectos"><span><i class="fa fa-folder-open-o"></i> Proyectos</span></a></li>
					<li><a href="/contratos"><span><i class="fa fa-files-o"></i> Contratos</span></a></li>
					<li><a href="/salas"><span><i class="fa fa-cubes"></i> Salas</span></a></li>
					<li><a href="/reservas"><span><i class="fa fa-calendar"></i> Reservas</span></a></li>
					<!--
					<li class="treeview">
						<a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="#">Link in level 2</a></li>
							<li><a href="#">Link in level 2</a></li>
						</ul>
					</li>
					-->
				</ul><!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					@yield('title')
				</h1>
{{-- 				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol> --}}
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Errores -->
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

				<!-- Mensajes de sesión -->
				@if (Session::has('message'))
    				<div class="alert alert-{{ Session::get('alert') }}">
    					<h4>{{ Session::get('title') }}</h4>
    					<p>{{ Session::get('message') }}</p>
    				</div>
				@endif

				<!-- Your Page Content Here -->
				@yield('content')

			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="pull-right hidden-xs">
				{{ date('d-m-Y') }}
			</div>
			<!-- Default to the left -->
			<strong>Copyright © 2016 <a href="#">Centro de Biotecnología - Universidad de Concepción</a>.</strong>
		</footer>

	</div><!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 2.1.3 -->
	<script src="{{ asset("/admin-lte/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

	<!-- Bootstrap 3.3.2 JS -->
	<script src="{{ asset("/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
	<!-- Datatables -->
	<script src="{{ asset("/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
	<!-- Datepicker -->
	<script src="{{ asset("/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js") }}"></script>
	<!-- Select2 -->
	<script src="{{ asset("/admin-lte/plugins/select2/select2.min.js") }}"></script>

	<!-- AdminLTE App -->
	<script src="{{ asset("/admin-lte/dist/js/app.min.js") }}"></script>

	<!-- fullCalendar -->
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/moment.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.min.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/fullcalendar/fullcalendar.locales.js") }}"></script>

	<!-- Optionally, you can add Slimscroll and FastClick plugins.
		  Both of these plugins are recommended to enhance the
		  user experience -->
	<script src="{{ asset("/admin-lte/plugins/fastclick/fastclick.js") }}"></script>
	<script src="{{ asset("/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
	
	<script src="{{ asset("/js/site.js") }}"></script>
	</body>
</html>