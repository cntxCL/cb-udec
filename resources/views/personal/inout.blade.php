@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Personal</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Entrada</th>
						<th>Salida</th>
					</tr>
					<tr>
						<td>
							<table>
								@foreach($entradas as $item)
								<tr>
									<td>{{ $item->fecha }}</td>
								<tr>
							@endforeach
							</table>

						</td>
						<td>
							<table>
								@foreach($salidas as $item)
								<tr>
									<td>{{ $item->fecha }}</td>
								<tr>
							@endforeach
							</table>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
	<a href="/personal" class="btn btn-default">Volver a Personal</a>
	<a href="/personal/{{ $item->id }}/contratos" class="btn btn-default">Ver Contratos</a>
	</div>
</div>

@endsection
