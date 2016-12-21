@extends('layouts.master')

@section('title', 'Contratos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Contrato</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Fecha Inicio</th>
						<td>{{ date('d-m-Y', strtotime($item->inicio)) }}</td>
					</tr>
					<tr>
						<th>Fecha Fin</th>
						<td>{{ date('d-m-Y', strtotime($item->fin)) }}</td>
					</tr>
					<tr>
						<th>Proyecto</th>
						<td>{{ $item->proyecto->nombre }}</td>
					</tr>
					<tr>
						<th>Responsable</th>
						<td>{{ $item->personal->nombre }} {{ $item->personal->apellido }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	<a href="/contratos" class="btn btn-default">Volver a Contratos</a>
	</div>
</div>

@endsection