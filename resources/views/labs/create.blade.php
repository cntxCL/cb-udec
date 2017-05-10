@extends('layouts.master')

@section('title', 'Laboratorios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Laboratorio</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/labs', 'class' => 'form-horizontal']) !!}

		@include('labs._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection