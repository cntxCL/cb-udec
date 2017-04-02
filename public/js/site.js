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
		eventLimit: 1,
		select : function(start, end, jsEvent, view)
		{
			if(view.type != "month")
			{
				$("#reservaStart").text(start.format("DD/MM/YYYY HH:mm"));
				$("#reservaEnd").text(end.format("DD/MM/YYYY HH:mm"));
				$("#reservaSala").text("select sala");
				$("#createReserva").modal('show');
			}
		},
		eventClick : function(calEvent, jsEvent, view){
			window.open("reservas/" + calEvent.id + "/edit", "_blank");
			return false;
		}
	});


	$("#saveReservaBtn").click(function()
	{
		//rescatar datos para mandar peticion POST de creacion de reserva
		var reservaData = {
			inicio : $("#reservaStart").text(),
			fin : $("#reservaEnd").text(),
			personal_id : $("#reservaResponsable").val(),
			sala_id : selectedSalaId,
			motivo_id: "1",
			sala_id:"1",
			aceptado : 0
		}
		$.post("/reservas", reservaData, function(response){
			if(!response.flag){
				alert(respose.content);
			}else{
				$("#calendar").fullCalendar('renderEvent', {
					id : response.content.id,
					title : response.content.personal,
					start : moment(response.content.inicio, 'DD/MM/YYYY HH:mm'),
					end : moment(response.content.fin, 'DD/MM/YYYY HH:mm')
				});
			}
		}).fail(function(response){
			alert("Error guardando reserva, intente nuevamente");
		});
		$("#createReserva").modal('hide');
	});

	$("#btnCargarReservas").click(function(){
		$("#calendar").show();
		selectedSalaId = $("#selectSala").val();
		//ajax para pedir reservas y cargarlas al 
		$("#calendar").fullCalendar('removeEvents');
		$.get("sala/" + selectedSalaId + "/reservas", function(data){
			var events = []
			for(var index in data.content){
				events.push({
					id : data.content[index].id,
					title : data.content[index].personal,
					start : moment(data.content[index].inicio, 'YYYY/MM/DD HH:mm:ss'),
					end : moment(data.content[index].fin, 'YYYY/MM/DD HH:mm:ss')
				});
			}
			$("#calendar").fullCalendar('addEventSource', events);
		});
	});

});