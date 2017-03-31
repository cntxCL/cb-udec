@extends('layouts.master')

@section('title', 'Reservas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Reservas</h1>
	</div>
	<div class="box-body">
		<a href="/reservas/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nueva Reserva</a>
		<hr>

	</div>
</div>

@endsection