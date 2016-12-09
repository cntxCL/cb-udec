@extends('layouts.master')

@section('title', 'Contratos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Contrato</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/contratos', 'class' => 'form-horizontal']) !!}

		@include('contratos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection