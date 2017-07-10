@extends('layouts.master')

@section('title', 'Reservas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información Reserva</h1>
	</div>
	<div class="box-body">
		{!! Form::model($item, ['route' => ['reservas.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formEditReserva']) !!}
            <input type="hidden" id="acceptFlag" name="acceptFlag" value="0">
            <input type="hidden" id="deleteFlag" name="deleteFlag" value="0">

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="100px">Sala</th>
                        <td id="reservaSala">{{$item->sala->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Inicio</th>
                        <td id="reservaStart">{{$item->inicio}}</td>
                    </tr>
                    <tr>
                        <th>Término</th>
                        <td id="reservaEnd">{{$item->fin}}</td>
                    </tr>
                    <tr>
                        <th>Motivo</th>
                        <td>{{$item->motivo->descripcion}}</td>
                    </tr>
                    <tr>
                        <th>Responsable</th>
                        <td>{{$item->responsable}}</td>
                    </tr>
                </tbody>
            </table>

            @if(!$item->aceptado)
                <button type="button" class="btn btn-success" id="btnAcceptReserva"> Aprobar Reserva</button>
            @endif
            <button type="button" class="btn btn-danger" id="btnEliminarReserva"> Eliminar Reserva</button>
            <button type="button" class="btn btn-default pull-right" onclick="window.close()">Cerrar</button>
		{!! Form::close() !!}
	</div>
</div>

@endsection
