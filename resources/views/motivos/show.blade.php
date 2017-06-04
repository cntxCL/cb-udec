@extends('layouts.master')

@section('title', 'Motivos')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Información de Motivo</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th width="1em">Descripcion</th>
						<td>{{ $item->descripcion }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	<a href="/motivos" class="btn btn-default"><i class="fa fa-arrow-left"></i>  &nbsp;Volver a Motivos</a>
	</div>
</div>

@endsection
