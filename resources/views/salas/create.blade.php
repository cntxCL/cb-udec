@extends('layouts.master')

@section('title', 'Salas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nueva Sala</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/salas', 'class' => 'form-horizontal']) !!}

		@include('salas._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection