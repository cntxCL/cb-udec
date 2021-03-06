@extends('layouts.master')

@section('title', 'Reservas')

@section('content')
<style type="text/css">
	.select2{
		min-width: 200px!important;
	}
</style>

<div class="modal fade" tabindex="-1" role="dialog" id="createReserva">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Creación de Reserva</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					 <div class="form-group">
						<label class="control-label col-sm-3">Sala:</label>
						<p class="form-control-static col-sm-9" id="reservaSala"></p>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Inicio:</label>
						<p class="form-control-static col-sm-9" id="reservaStart"></p>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Termino:</label>
						<p class="form-control-static col-sm-9" id="reservaEnd"></p>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Motivo:</label>
                        {!! Form::select('motivo_id', $motivos, null, ['class' => 'form-control col-sm-9 select2', 'id' => "reservaMotivo"]) !!}
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Correo Responsable:</label>
						<div class="col-sm-9">
							{!! Form::text('responsable', null, ['class' => 'form-control', 'id' => "reservaResponsable", 'placeholder' => 'Correo electrónico']) !!}
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="saveReservaBtn">Guardar</button>
			</div>
		</div>
	</div>
</div>



<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Calendario Reservas</h1>
	</div>
	<div class="box-body">
		<div class="row">
			<form class="col-md-12 form-inline">
				<div class="form-group">
					<label>Seleccione Sala:</label>  &nbsp;
						<select class="form-control col-md-10 select2" id="selectSala">
							@foreach($salas as $sala)
							<option value="{{$sala->id}}" data-maxTime={{$sala->max_tiempo_reserva}}>{{$sala->nombre}}</option>
							@endforeach
						</select>
					</div>
				<button class="btn btn-primary" type="button" id="btnCargarReservas">Cargar Reservas</button>
			</form>
		</div>
		<div id="calendar"></div>
	</div>
</div>
@endsection

