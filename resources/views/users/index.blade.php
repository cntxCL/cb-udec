@extends('layouts.master')

@section('title', 'Usuarios')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Usuarios</h1>
	</div>
	<div class="box-body">
{{-- 		<a href="/users/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nuevo Usuario</a>
		<hr> --}}
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Fecha de Creación</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->personal->nombre }} {{ $item->personal->apellido }}</td>
						<td>{{ $item->created_at }}</td>
						<td>
							<a href="{{ route('users.show', [$item->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection