@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Crear Nuevo Personal</h1>
	</div>
	<div class="box-body">
		{!! Form::open(['url' => '/personal']) !!}

		@include('personal._form')

		{!! Form::close() !!}
	</div>
</div>

@endsection