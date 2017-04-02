<div class="form-group">
	<label class="control-label col-md-1">Descripcion</label>
	<div class="col-md-11">
		{!! Form::text('descripcion', null, ['placeholder' => 'Descripcion del motivo', 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/motivos" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>
