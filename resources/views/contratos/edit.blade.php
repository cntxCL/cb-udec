@extends('layouts.master')

@section('title', 'Contratos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Contrato</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['contratos.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

		@include('contratos._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection