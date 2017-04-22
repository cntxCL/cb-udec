$( document ).ready(function() {

	var selectedSalaId = -1;
	var maxBlocksAllowed = 0;

	$(".select2").select2({
		language: 'es'
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
		maxTime : '21:00',
		slotLabelInterval : '01:00',
		slotLabelFormat: 'HH:mm', 
		selectable : true,
		eventLimit: 1,
		selectOverlap : false,
		allDaySlot: false,
		select : function(start, end, jsEvent, view)
		{
			var maxTimeSpan = moment.duration(maxBlocksAllowed * 30, 'minutes');
			var allowedEnd = moment(start).add(maxTimeSpan);
			if(view.type != "month" && selectedSalaId != -1 && end.isSameOrBefore(allowedEnd))
			{
				$("#reservaStart").text(start.format("DD/MM/YYYY HH:mm"));
				$("#reservaEnd").text(end.format("DD/MM/YYYY HH:mm"));
				$("#reservaSala").text($("#selectSala option[value='"+selectedSalaId+"']").text());
				$("#createReserva").modal('show');
			}else{
				if(view.type == "month"){
					return;
				}
				if(selectedSalaId == -1){
					alert("Debe seleccionar y cargar reservas de una sala");
					return;
				}
				if(end.isAfter(allowedEnd)){
					alert("Periodo seleccionado supera el máximo permitido");
					return;
				}
			}
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
			motivo_id: $("#reservaMotivo").val(),
			aceptado : 0
		}
		$.post("/reservas", reservaData, function(response){
			if(!response.flag){
				alert(response.content);
			}else{
				$("#calendar").fullCalendar('renderEvent', {
					id : response.content.id,
					title : response.content.personal + "\n " + response.content.motivo ,
					start : moment(response.content.inicio, 'DD/MM/YYYY HH:mm'),
					end : moment(response.content.fin, 'DD/MM/YYYY HH:mm'),
					backgroundColor : "#7e8490"
				});
			}
		}).fail(function(response){
			alert("Error guardando reserva, intente nuevamente.");
		});
		$("#createReserva").modal('hide');
	});

	$("#btnCargarReservas").click(function(){
		$("#calendar").show();
		selectedSalaId = $("#selectSala").val();
		maxBlocksAllowed = $("#selectSala :selected").data("maxtime");
		//ajax para pedir reservas y cargarlas al 
		$("#calendar").fullCalendar('removeEvents');
		$.get("sala/" + selectedSalaId + "/reservas", function(data){
			var events = []
			for(var index in data.content){
				events.push({
					id : data.content[index].id,
					title : data.content[index].personal + "\n " + data.content[index].motivo,
					start : moment(data.content[index].inicio, 'YYYY/MM/DD HH:mm:ss'),
					end : moment(data.content[index].fin, 'YYYY/MM/DD HH:mm:ss'),
					backgroundColor : data.content[index].aceptado ? "#00a65a" : "#7e8490"
				});
			}
			$("#calendar").fullCalendar('addEventSource', events);
		});
	});

});