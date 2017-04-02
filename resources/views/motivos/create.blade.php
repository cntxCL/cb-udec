@extends('layouts.master')

@section('title', 'Motivos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Motivo</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/motivos', 'class' => 'form-horizontal']) !!}

		@include('motivos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection
