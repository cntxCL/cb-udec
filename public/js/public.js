$( document ).ready(function() {

	var selectedSalaId = -1;
	var maxBlocksAllowed = 0;

	$(".select2").select2();

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
		slotLabelInterval : '01:00',
		slotLabelFormat: 'HH:mm', 
		selectable : true,
		eventLimit: 1,
		selectOverlap : false,
		eventClick : function(calEvent, jsEvent, view){
			var windowDet = window.open("reservas/" + calEvent.id + "/edit", "_blank");
			windowDet.onunload = function(e){
				if(e.URL != "about:blank"){
					$("#btnCargarReservas").click();	
				}
			}
			return false;
		}
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