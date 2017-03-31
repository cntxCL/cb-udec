@extends('layouts.master')

@section('title', 'Salas')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Sala</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Nombre</th>
						<td>{{ $item->nombre }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	<a href="/salas" class="btn btn-default">Volver a Salas</a>
	</div>
</div>

@endsection