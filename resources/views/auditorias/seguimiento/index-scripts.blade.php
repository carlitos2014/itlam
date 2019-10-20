@push('js')
	{!! Html::script('js/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('js/fullcalendar/fullcalendar.min.js') !!}
	{!! Html::script('js/fullcalendar/es.js') !!}

	<script type='text/javascript'>
		//Carga de datos a mensajes modales para eliminar y clonar registros
		$(document).ready(function () {

			$('#modalReserva').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				var modal = $(this);
			});


			/* initialize the calendar
			-----------------------------------------------------------------*/
			$('#msgModalProcessing').modal();
			$('#calendar').fullCalendar({
				//theme: true,
				displayEventTime: true,
				editable: false,
				droppable: false, // this allows things to be dropped onto the calendar !!!
				header: {
					left: 'prev,next today',
					center: 'title',
					//right: 'month,listMonth,agendaWeek,listWeek,agendaDay'
					right: 'month,agendaWeek,agendaDay'
				},
				events: {
					url:'seguimientos/cargaEventos'
				},
				eventRender: function(event, element) {
					element.addClass(event.estado.toLowerCase());
				},
				eventAfterAllRender: function( view ) {
					$('#msgModalProcessing').modal('hide');
				},
				eventMouseover: function(calEvent, jsEvent) {
					//console.log(calEvent);
					var tooltip = '<div class="tooltipevent '+calEvent.estado.toLowerCase()+'">'+
						'<b>Auditor:</b> '+calEvent.auditor.nombre +'<br>'+
						'<b>Lider:</b> '+calEvent.auditorLider.nombre +'<br>'+
						'<b>Responsable Proceso:</b> '+calEvent.proceso.responsable +'<br>'+
						'<b>Estado:</b> '+ calEvent.estado +' <br>' +
						'<b>Hora inicio:</b> '+ moment(calEvent.start).format('HH:mm') +' ' +
						'<b>Hora fin:   </b> '+ moment(calEvent.end).format('HH:mm') +'<br>' +
						'</div>';
					var $tool = $(tooltip).appendTo('body');
					$(this).mouseover(function(e) {
						$(this).css('z-index', 10000);
						$tool.fadeIn('500');
						$tool.fadeTo('10', 1.9);
					}).mousemove(function(e) {
						$tool.css('top', e.pageY + 10);
						$tool.css('left', e.pageX + 20);
					});
				},
				eventMouseout: function(calEvent, jsEvent) {
					$(this).css('z-index', 8);
					$('.tooltipevent').remove();
				},
				eventClick: function(calEvent, jsEvent, view) {
					console.log(calEvent.proceso);
					console.log(calEvent.auditorLider);
					//Visualizar ventana modal con los detalles de la reserva
					var date = moment(calEvent.start).format('YYYY-MM-DD');
					var start = moment(calEvent.start).format('HH:mm');
					var end   = moment(calEvent.end).format('HH:mm');
					var modal = $('#modalReserva');

					modal.find('#strAud').text(calEvent.auditorLider.nombre);
					modal.find('#strName').text(calEvent.proceso.nombre);
					modal.find('#strResp').text(calEvent.proceso.responsable);
					modal.find('#strDate').text(date);
					modal.find('#strStart').text(start);
					modal.find('#strEnd').text(end);

					modal.modal('show');
					$(this).css('border-color', 'red');
				}
			});

		});
	</script>

@endpush