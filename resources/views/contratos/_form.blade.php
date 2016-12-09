<div class="form-group">
	<label class="control-label col-md-1">Inicio</label>
	<div class="col-md-5">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
			{!! Form::text('inicio', null, ['placeholder' => 'Fecha Inicio', 'class' => 'form-control pull-right datepicker']) !!}
		</div>
	</div>
	<label class="control-label col-md-1">Fin</label>
	<div class="col-md-5">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
			{!! Form::text('fin', null, ['placeholder' => 'Fecha Fin', 'class' => 'form-control pull-right datepicker']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Proyecto</label>
	<div class="col-md-11">
		{!! Form::select('proyecto_id', $proyectos, null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-1">Responsable</label>
	<div class="col-md-11">
		{!! Form::select('personal_id', $personal, null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/proyectos" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>