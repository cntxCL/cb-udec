@extends('layouts.master')

@section('title', 'Proyectos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Proyecto</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Nombre</th>
						<td>{{ $item->nombre }}</td>
					</tr>
					<tr>
						<th>Descripción</th>
						<td>{{ $item->descripcion }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	<a href="/proyectos" class="btn btn-default"><i class="fa fa-arrow-left"></i>  &nbsp;Volver a Proyectos</a>
	</div>
</div>

@endsection