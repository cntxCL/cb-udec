@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Personal</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['personal.update', $item->id]]) !!}

		@include('personal._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection