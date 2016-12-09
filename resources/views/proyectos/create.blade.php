@extends('layouts.master')

@section('title', 'Proyectos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Proyecto</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/proyectos', 'class' => 'form-horizontal']) !!}

		@include('proyectos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection