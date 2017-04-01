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
		autoclose: true,
		language: 'es',
		format: 'dd/mm/yyyy',
		weekStart: '1'
	});

	$(".select2").select2();

	// PERSONAL
	$("#cargos").select2({
		tags: true,
		placeholder: 'Seleccione un ítem',
		createSearchChoice: function(term, data) {
			if ($(data).filter(function() {
				return this.text.localeCompare(term) === 0;
			}).length === 0) {
				return {
					id: term,
					text: term
				};
			}
		},
		multiple: true,
		maximumSelectionLength: 1,
		ajax: {
			url: '/json/cargos',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: data
				};
			},
			cache: true
		}
	});

	$('#calendar').fullCalendar({
		locale: 'es',
	    fistDay : 1,
	    header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listWeek'
		},
		defaultView : 'agendaWeek',
		minTime : '08:00',
		maxTime : '21:30',
		slotLabelInterval : '00:30',
		slotLabelFormat: 'hh:mm', 
		selectable : true,
		select : function(start, end, jsEvent, view)
		{
			if(view.type != "month")
			{
				$("#reservaStart").text(start.format("DD/MM/YYYY HH:mm"));
				$("#reservaEnd").text(end.format("DD/MM/YYYY HH:mm"));
				$("#reservaSala").text("select sala");
				$("#createReserva").modal('show');
			}
		}
	});

});