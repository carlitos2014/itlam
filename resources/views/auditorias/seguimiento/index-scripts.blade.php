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
					//var startt = moment(event.start).format('HH:mm');
					//var endd = moment(event.end).format('HH:mm');
					//element.find('.fc-title').append( '<br>' + startt + ' - ' + endd);
					element.addClass(event.estado.toLowerCase());
				},
				eventAfterAllRender: function( view ) {
					$('#msgModalProcessing').modal('hide');
				},
				eventMouseover: function(calEvent, jsEvent) {
					//console.log(calEvent);
					var tooltip = '<div class="tooltipevent '+calEvent.estado.toLowerCase()+'">'+
						'<b>Responsable Proceso:</b> '+calEvent.procesoResp +'<br>'+
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
					//Visualizar Popup con los detalles de la reserva
					var start = moment(calEvent.start).format('YYYY-MM-DD HH:mm');
					var end = moment(calEvent.end).format('YYYY-MM-DD HH:mm');
					var modal = $('#modalReserva');
					var info = $('#divmodal');
					info.empty();
					info.append('<span class="LAVA_ID hide">'+calEvent.LAVA_ID+'</span>');
					info.append('<p><b>Lavadora: </b> '+calEvent.LAVA_DESCRIPCION+' <b>Estado:</b> ' +calEvent.ESRE_NOMBRE+ '</p>');
					info.append('<p><b>Inicio: </b> ' + start + '<b> Fin: </b> ' + end +'</p>');
					info.append('<p><b>Creado por:</b> <span class="RESE_CREADOPOR">' +calEvent.RESE_CREADOPOR+ '</span></p>');


					var RESE_CREADOPOR = modal.find('.RESE_CREADOPOR').text();
					var userCurrent = '{{ Auth::user()->username }}';
					var rolCurrent = 'admin';
					{{-- \Entrust:: --}}

					var frmDelete = modal.find('#frmDelete');
					if(userCurrent == RESE_CREADOPOR || rolCurrent == 'admin'){
						frmDelete
							.attr('action', 'seguimientos/'+calEvent.RESE_ID)
							.removeClass('hide');
					}else{
						frmDelete
							.attr('action', 'seguimientos/'+calEvent.RESE_ID)
							.removeClass('hide');
					}

					modal.modal('show');

					$(this).css('border-color', 'red');
				}
			});

		});
	</script>

@endpush