@extends('layouts.master')

@section('title', 'Laboratorios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Laboratorio</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Nombre</th>
						<td>{{ $item->nombre }}</td>
						<th width="1em">Jefe</th>
						<td>{{ $item->jefe->nombre_completo }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="box box-widget">
	<div class="box-header">
		<h3 class="box-title">Contratos asociados</h3>			
	</div>
	<div class="box-body">
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Inicio</th>
						<th>Fin</th>
						<th>Proyecto</th>
						<th>Responsable</th>
						<th>Ver más</th>
					</tr>
				</thead>
				<tbody>
				@foreach($item->contratos as $contrato)
					<tr>
						<td>{{ $contrato->id }}</td>
						<td>{{ $contrato->inicio->format('d/m/Y') }}</td>
						<td>{{ $contrato->fin->format('d/m/Y') }}</td>
						<td>{{ $contrato->proyecto->nombre }}</td>
						<td>{{ $contrato->personal->nombre}} {{ $contrato->personal->apellido }} </td>
						<td>
							<a href="{{ route('contratos.show', [$contrato->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		<a href="/labs" class="btn btn-default">Volver a Laboratorios</a>
	</div>
</div>

@endsection
