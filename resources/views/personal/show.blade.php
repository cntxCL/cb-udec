@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Personal</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Nombre</th>
						<td>{{ $item->nombre }}</td>
						<th width="1em">Apellido</th>
						<td>{{ $item->apellido }}</td>
						<th>RUT</th>
						<td>{{ $item->rut }}</td>
					</tr>
					<tr>
						<th>Teléfono</th>
						<td>{{ $item->telefono }}</td>
						<th>Cargo</th>
						<td>{{ $item->cargo }}</td>
						<th>Correo</th>
						<td>{{ $item->correo }}</td>
					</tr>
					@if ($item->cv_id!=null)
					<tr>
						<th>CV</th>
						<td><a href="/archivos/{{ $item->cv_id }}"><i class="fa fa-download"></i> Descargar</a></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	<a href="/personal" class="btn btn-default"><i class="fa fa-arrow-left"></i>  &nbsp;Volver a Personal</a>
	<a href="/personal/{{ $item->id }}/contratos" class="btn btn-success"><i class="fa fa-files-o"></i>  &nbsp;Ver Contratos</a>
	<a href="/personal/{{ $item->id }}/inout" class="btn btn-primary"><i class="fa fa-exchange"></i>  &nbsp;Ver Movimientos</a>
	</div>
</div>

@endsection
