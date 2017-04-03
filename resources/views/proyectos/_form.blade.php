<div class="form-group">
	<label class="control-label col-md-1">Nombre</label>
	<div class="col-md-11">
		{!! Form::text('nombre', null, ['placeholder' => 'Nombre del Proyecto', 'class' => 'form-control', 'maxlength' => 200]) !!}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Descripción</label>
	<div class="col-md-11">
        {!! Form::textarea('descripcion', null, ['placeholder' => 'Descripción del Proyecto', 'class' => 'form-control', 'maxlength' => 2000]) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/proyectos" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>
