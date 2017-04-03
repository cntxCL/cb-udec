@extends('layouts.master')

@section('title', 'Proyectos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Proyectos</h1>
	</div>
	<div class="box-body">
		<a href="/proyectos/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nuevo Proyecto</a>
		<hr>
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->nombre }}</td>
                        @if(strlen($item->descripcion) > 60)
						<td>{{ substr($item->descripcion, 0, 57) }}...</td>
                        @else
						<td>{{ $item->descripcion }}</td>
                        @endif
						<td>
							<a href="{{ route('proyectos.show', [$item->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
							<a href="{{ route('proyectos.edit', [$item->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
							{!! Form::open(['route' => ['proyectos.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!} <button type="submit" class="btn btn-danger btn-xs" onclick=" r = confirm('¿Está seguro que desea eliminar el proyecto?'); if(r == false) event.preventDefault(); "><span class="glyphicon glyphicon-trash"></span></button> {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
