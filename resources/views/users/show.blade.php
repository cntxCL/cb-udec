@extends('layouts.master')

@section('title', 'Usuarios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Usuario</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Nombre</th>
						<td>{{ $item->personal->nombre }}</td>
						<th width="1em">Apellido</th>
						<td>{{ $item->personal->apellido }}</td>
					</tr>
					<tr>
				</tbody>
			</table>
		</div>
		<h4>Logs</h4>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Fecha/Hora</th>
						<th>Descripción</th>
					</tr>
				</thead>
				<tbody>
					@if(count($item->log) > 0)
						@foreach($item->logs as $log)
							<tr>
								<td>{{ $log->id }}</td>
								<td>{{ $log->created_at }}</td>
								<td>{{ $log->descripcion }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan=3 class="text-center">No existen logs para este usuario.</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	<a href="/users" class="btn btn-default">Volver a Usuarios</a>
	</div>
</div>

@endsection