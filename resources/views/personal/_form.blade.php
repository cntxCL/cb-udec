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
	<label class="control-label col-md-1">RUT</label>
	<div class="col-md-5">
        {!! Form::text('rut', null, ['id' => 'rut', 'placeholder' => "RUT", 'class' => "form-control", "maxlength" => 12]) !!}
	</div>
	<label class="control-label col-md-1">Teléfono</label>
	<div class="col-md-5">
		{!! Form::number('telefono', null, ['placeholder' => 'Teléfono', 'class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-1">Correo</label>
	<div class="col-md-5">
		<input type="email" name="correo" placeholder="Correo" class="form-control">
	</div>
	<label class="control-label col-md-1">Cargo</label>
	<div class="col-md-5">
		<select class="form-control" name="cargo" id="cargos">
			@if(isset($item))
				<option value="{{$item->cargo}}" selected="selected">{{ $item->cargo }}</option>
			@endif
		</select>
	</div>

</div>

<div class="form-group">
	<label class="control-label col-md-1">Currículum</label>
	<div class="col-md-10">
		{!! Form::file('cv', null, ['class' => 'form-control','accept'=>'.pdf,.doc,.docx']) !!}
	</div>
	
</div>

<div class="form-group">
	<div class="col-md-12">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="/personal" class="btn btn-danger pull-right">Cancelar</a>
	</div>
</div>

<script type="text/javascript">
	$("#rut").rut({
		formatOn: 'keyup',
		minimumLength: 2, // validar largo mínimo; default: 2
		validateOn: 'change' // si no se quiere validar, pasar null
	});
</script>