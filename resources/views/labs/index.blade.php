@extends('layouts.master')

@section('title', 'Laboratorios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Laboratorios</h1>
	</div>
	<div class="box-body">
		<a href="/labs/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nuevo Laboratorio</a>
		<hr>
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Jefe</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->nombre }}</td>
						<td>{{ $item->jefe->nombre_completo }}</td>
						<td>
							<a href="{{ route('labs.show', [$item->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
							<a href="{{ route('labs.edit', [$item->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
							{!! Form::open(['route' => ['labs.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!} <button type="submit" class="btn btn-danger btn-xs" onclick=" r = confirm('¿Está seguro que desea eliminar el laboratorio?'); if(r == false) event.preventDefault(); "><span class="glyphicon glyphicon-trash"></span></button> {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
