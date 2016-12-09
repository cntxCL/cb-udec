@extends('layouts.master')

@section('title', 'Personal')

@section('content')

<div class="box box-default">
	<div class="box-header">
		<h1 class="box-title">Listado de Personal</h1>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($items as $item)

				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#data-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
</script>

@endsection