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
				</tbody>
			</table>
		</div>
	<a href="/personal" class="btn btn-default">Volver a Personal</a>
	<a href="/personal/{{ $item->id }}/contratos" class="btn btn-default">Ver Contratos</a>
	<a href="/personal/{{ $item->id }}/inout" class="btn btn-default">Ver Movimiento</a>
	</div>
</div>

@endsection
