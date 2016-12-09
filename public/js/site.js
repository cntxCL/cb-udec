$( document ).ready(function() {
	$('#data-table').DataTable({
		"paging": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"language": {
			"url": "/admin-lte/plugins/datatables/es.js"
		}
	});

	$(".datepicker").datepicker({
		autoclose: true
	});
});