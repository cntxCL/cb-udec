@extends('layouts.public')

@section('title', 'Listado público de Personal')

@section('content')

<div class="box box-default">
	<div class="box-body">
		<div class="col-md-12 table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->nombre }}</td>
						<td>{{ $item->apellido }}</td>
						<td>{{ $item->correo }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-12">
			<a href="/public"><div class="btn btn-default">Regresar</div></a>
		</div>
	</div>
</div>

@endsection