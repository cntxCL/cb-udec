@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Entradas y Salidas de {{$personal->nombre}} {{$personal->apellido}}</h1>
	</div>
	<div class="box-body">
		@if(count($entradas) > 0 && count($salidas) > 0)
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
		@else
		<div class="alert alert-warning">
			<i class="icon fa fa-warning"></i> No se encontraron entradas ni salidas registradas para esta persona.
		</div>
		@endif
		<a href="/personal" class="btn btn-default"><i class="fa fa-arrow-left"></i>  &nbsp;Volver a Personal</a>
		<a href="/personal/{{ $personal->id }}/contratos" class="btn btn-success"><i class="fa fa-files-o"></i>  &nbsp;Ver Contratos</a>
	</div>
</div>

@endsection
