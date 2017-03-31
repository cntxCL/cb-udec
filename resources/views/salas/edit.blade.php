@extends('layouts.master')

@section('title', 'Salas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Sala</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['salas.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

		@include('salas._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection