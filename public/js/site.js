$( document ).ready(function() {

	var selectedSalaId = -1;

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


	$("#saveReservaBtn").click(function()
	{
		//rescatar datos para mandar peticion POST de creacion de reserva
		var reservaData = {
			start : $("#reservaStart").text(),
			end : $("#reservaEnd").text(),
			personal_id : $("#reservaResponsable").val(),
			sala_id : selectedSalaId,
			motivo_id: "1"
		}
		$("#createReserva").modal('hide');
	});

	$("#btnCargarReservas").click(function(){
		$("#calendar").show();
		selectedSalaId = $("#selectSala").val();
		//ajax para pedir reservas y cargarlas al calendario
	});

});