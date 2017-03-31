@extends('layouts.master')

@section('title', 'Salas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Salas</h1>
	</div>
	<div class="box-body">
		<a href="/reserva/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nueva Sala</a>
		<hr>

	</div>
</div>

@endsection