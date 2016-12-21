@extends('layouts.master')

@section('title', 'Contratos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Contratos</h1>
	</div>
	<div class="box-body">
		<a href="/contratos/create" class="btn btn-success"><i class="fa fa-file-o"></i> Crear Nuevo Contrato</a>
		<hr>
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Inicio</th>
						<th>Fin</th>
						<th>Proyecto</th>
						<th>Responsable</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ date('d-m-Y', strtotime($item->inicio)) }}</td>
						<td>{{ date('d-m-Y', strtotime($item->fin)) }}</td>
						<td>{{ $item->proyecto->nombre }}</td>
						<td>{{ $item->personal->nombre}} {{ $item->personal->apellido }} </td>
						<td>
							<a href="{{ route('contratos.show', [$item->id]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></a>
							<a href="{{ route('contratos.edit', [$item->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
							{!! Form::open(['route' => ['contratos.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!} <button type="submit" class="btn btn-danger btn-xs" onclick=" r = confirm('¿Está seguro que desea eliminar el contrato?'); if(r == false) event.preventDefault(); "><span class="glyphicon glyphicon-trash"></span></button> {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection