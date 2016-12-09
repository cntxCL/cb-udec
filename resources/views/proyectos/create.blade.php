@extends('layouts.master')

@section('title', 'Proyecto')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Proyecto</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/proyectos']) !!}

		@include('proyectos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection