@extends('layouts.master')

@section('title', 'Motivos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Motivos</h1>
	</div>
	<div class="box-body">
		<a href="/motivos/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nuevo Motivo</a>
		<hr>
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Descripcion</th>
						<th>Fecha de Creación</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->descripcion }}</td>
						<td>{{ $item->created_at }}</td>
						<td>
							<a href="{{ route('motivos.edit', [$item->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
							{!! Form::open(['route' => ['motivos.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!} <button type="submit" class="btn btn-danger btn-xs" onclick=" r = confirm('¿Está seguro que desea eliminar este motivo?'); if(r == false) event.preventDefault(); "><span class="glyphicon glyphicon-trash"></span></button> {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
