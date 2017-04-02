@extends('layouts.master')

@section('title', 'Motivos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Motivo</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['motivos.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

		@include('motivos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection
