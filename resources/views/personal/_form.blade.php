<div class="form-group">
	<label class="control-label col-md-1">Nombre</label>
	<div class="col-md-5">
		{!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) !!}
	</div>
	<label class="control-label col-md-1">Apellido</label>
	<div class="col-md-5">
		{!! Form::text('apellido', null, ['placeholder' => 'Apellido', 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Correo</label>
	<div class="col-md-5">
		{!! Form::email('correo', null, ['placeholder' => 'Correo Electrónico', 'class' => 'form-control']) !!}
	</div>
	<label class="control-label col-md-1">Teléfono</label>
	<div class="col-md-5">
		{!! Form::text('telefono', null, ['placeholder' => 'Teléfono', 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Cargo</label>
	<div class="col-md-11">
		{!! Form::text('cargo', null, ['placeholder' => 'Cargo', 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/personal" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>