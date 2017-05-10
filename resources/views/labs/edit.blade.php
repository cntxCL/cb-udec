@extends('layouts.master')

@section('title', 'Laboratorios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Laboratorio</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['labs.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

		@include('labs._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection