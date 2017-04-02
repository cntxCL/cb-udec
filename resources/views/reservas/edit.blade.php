@extends('layouts.master')

@section('title', 'Contratos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Editar Reserva</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['reservas.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
		<form class="form-horizontal">
       		 <div class="form-group">
        		<label class="control-label col-md-2">Sala:</label>
        		<p class="form-control-static col-md-10" id="reservaSala">{{$item->sala->nombre}}</p>
        	</div>
        	<div class="form-group">
        		<label class="control-label col-md-2">Inicio:</label>
        		<p class="form-control-static col-md-10" id="reservaStart">{{$item->inicio}}</p>
        	</div>
        	<div class="form-group">
        		<label class="control-label col-md-2">Termino:</label>
        		<p class="form-control-static col-md-10" id="reservaEnd">{{$item->fin}}</p>
        	</div>
        	<div class="form-group">
				<label class="control-label col-md-2">Responsable:</label>
				<p class="form-control-static col-md-10">{{$item->personal->nombre . " " . $item->personal->apellido}}</p>
			</div>
        </form>

		{!! Form::close() !!}
	</div>
</div>

@endsection