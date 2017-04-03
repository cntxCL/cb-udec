@extends('layouts.master')

@section('title', 'Salas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Salas</h1>
	</div>
	<div class="box-body">
		<a href="/salas/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nueva Sala</a>
		<hr>
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Capacidad</th>
						<th>Bloques máximos</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->nombre }}</td>
						<td>{{ $item->capacidad }}</td>
						<td>{{ $item->max_tiempo_reserva }}</td>
						<td>
							<a href="{{ route('salas.show', [$item->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
							<a href="{{ route('salas.edit', [$item->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
							{!! Form::open(['route' => ['salas.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!} <button type="submit" class="btn btn-danger btn-xs" onclick=" r = confirm('¿Está seguro que desea eliminar la sala?'); if(r == false) event.preventDefault(); "><span class="glyphicon glyphicon-trash"></span></button> {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
