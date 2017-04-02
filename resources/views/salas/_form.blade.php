<div class="form-group">
	<label class="control-label col-md-1">Nombre</label>
	<div class="col-md-11">
		{!! Form::text('nombre', null, ['placeholder' => 'Nombre de la sala', 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Capacidad</label>
	<div class="col-md-5">
        {!! Form::number('capacidad', null, ['placeholder' => 'Cantidad de personas', 'min' => 0, 'class' => 'form-control']) !!}
	</div>
	<label class="control-label col-md-2">Max. Reserva</label>
	<div class="col-md-4">
        {!! Form::number('max_tiempo_reserva', null, ['placeholder' => 'Cantidad máxima de bloques', 'min' => 0, 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/salas" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>
