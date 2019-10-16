@push('js')
	{!! Html::script('js/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('js/fullcalendar.js') !!}

	<script type="text/javascript">
		//Carga de datos a mensajes modales para eliminar y clonar registros
		$(document).ready(function () {

			$('#modalReserva').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				var modal = $(this);
			});

			$('#anularReserva').on('click', function (event) {
				//alert('llamar método para anular');
			});


			//Token para envío de peticiones por ajax a los controladores de Laravel
			var crsfToken = $('meta[name="csrf-token"]').attr('content');
			//var sala = getUrlParameter('sala');
			//var equipo = getUrlParameter('equipo');
			//var equipo = null;


			/*var fchInicio = $('#RESE_FECHAINICIO').parent().datetimepicker();
			fchInicio.data("DateTimePicker")
				.options({
					//stepping: 60,
					//sideBySide: true, // Muestra la hora yla fecha juntas
					useCurrent: false,  //Important! See issue #1075. Requerido para minDate
					//minDate: moment(), //-1 Permite seleccionar el dia actual
					//defaultDate: moment().add(30,'minutes'), //-1 Permite seleccionar el dia actual
					daysOfWeekDisabled: [0],//Deshabilita el día domingo
					format: 'YYYY-MM-DD HH:mm'
				})
				.disabledHours([0,1,2,3,4,5,6,22,23]);*/


			/***** Funciones para reservar *****/
			//$('#btn-reservar').on('click', function() {
			$('#msgModalProcessing').on('shown.bs.modal', function() {
					reservaHastaFecha();
				//$('#msgModalProcessing').modal('handleUpdate')
				//window.setTimeout(function(){ location.reload(); }, 1000);
			});



			function reservaHastaFecha() {
				//Obteniendo valores del formulario
				var lavadora = $('#LAVA_ID').val();
				var titulo = 'L'+lavadora;
				var fechaini = fchInicio.data("DateTimePicker").date();
				var nhoras = $('#RESE_HORAS').val();

				//Se valida que no existan reservas para la fecha y lavadora seleccionada.
				var puedeHacerReservas = validarFechaReservada(fechaini, nhoras, lavadora);

				//Se adiciona la fecha al arreglo de reservas
				var arrReservas = [{
					'RESE_TITULO': titulo,
					'RESE_FECHAINI': fechaini.format('YYYY-MM-DD HH:mm'),
					'RESE_HORAS': nhoras, 
					'LAVA_ID': lavadora,
				}];

				if(puedeHacerReservas && arrReservas.length>0){
					$.ajax({
						url: 'seguimientos/guardarReservas',
						data: { reservas : arrReservas },
						type: 'GET',
						headers: { 'X-CSRF-TOKEN': crsfToken },
						success: function(events) {
							$('#calendar').fullCalendar('refetchEvents');
							toastr['success']('¡Su reserva se ha realizado satisfactoriamente!', 'OK');
							$('#modalcrearres').modal('toggle');
						},
						error: function(json){
							console.log("Error al crear la reserva");
							$('#errorAjax').append(json.responseText);
							toastr['error']('¡No se puede realizar la reserva!. Verifique los datos estén completos.', 'Error');
							$('#msgModalProcessing').modal('hide');
						},
					});
				} else {
					toastr['error']('¡No se puede realizar reservas. '+msgError, 'Error');
					$('#msgModalProcessing').modal('hide');
				}
			};

			/***** HELPERS - Funciones de apoyo *****/
			
			function validarFechaReservada(fechaini, nhoras, lavadora){
				//trae todas las reservas del fullcalendar 
				var reservasTodas = $('#calendar').fullCalendar('clientEvents');
				//se le adiciona el numero de horas
				var fechafin = moment(fechaini).add(1, 'hours');
				var fechafinal = moment(fechafin,'YYYY-MM-DD HH:mm').format('YYYY-MM-DD HH:mm');
				return true;
			}


			//Valida que una fecha de reserva nueva no se "traslape" con una reserva existente
			// Para mas información, visite el archivo seguimientos/testvalidacion.blade.php
			function validarReservaLibre(fIniExis, fFinExis, fIniNew, fFinNew){
				var esvalida = false;

				if(( (fIniNew >= fIniExis) &&
					  (fIniNew >= fFinExis) &&
					  (fFinNew >= fFinExis) 
					) || (
					  (fIniNew < fIniExis) &&
					  (fIniNew < fFinExis) &&
					  (fFinNew <= fIniExis)
						))
					esvalida = true;
				
				return esvalida;
			}
					
			//Obtener el valor de un parametro enviado por GET
			function getUrlParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');
					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
			};

			/*//Obtener array de festivos por Ajax
			function getFestivos() {
				var arrFestivos = [];
				$.ajax({
					url: 'getFestivos',
					async: false,
					dataType: 'json',
					type: 'POST',
					headers: {
						"X-CSRF-TOKEN": crsfToken
					},
					success: function(festivos) {
						for(var i = 0; i < festivos.length; i++){
							var ffest = moment(festivos[i].FEST_FECHA, 'YYYY-MM-DD').format('YYYY-MM-DD');
							arrFestivos[i] = ffest;
						}
					},
					error: function(json){
						console.log("Error al consultar festivos");
						$('#errorAjax').append(json.responseText);
					}        
				});
				//console.log("Festivos:" + arrFestivos);
				return arrFestivos;
			}*/

			/* initialize the external events
			-----------------------------------------------------------------*/
			function ini_events(ele) {
				ele.each(function () {
					// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
					// it doesn't need to have a start or end
					var eventObject = {
						title: $.trim($(this).text()) // use the element's text as the event title
					};

					// store the Event Object in the DOM element so we can get to it later
					$(this).data('eventObject', eventObject);

					// make the event draggable using jQuery UI
					$(this).draggable({
						zIndex: 1070,
						revert: true, // will cause the event to go back to its
						revertDuration: 0  //  original position after the drag
					});
				});
			}

			ini_events($('#external-events div.external-event'));
			/* initialize the calendar
			-----------------------------------------------------------------*/
			//Date for the calendar events (dummy data)
			//while(reload==false){


			$('#calendar').fullCalendar({
				//theme: true,
				displayEventTime: false,
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,listMonth,agendaWeek,listWeek,agendaDay'
				},
				buttonText: {
					today: 'hoy',
					month: 'mes',
					listMonth: 'lista x mes',
					week: 'semana',
					listWeek: 'lista x semana',
					day: 'dia',
				},
				events: {
					url:"seguimientos/cargaEventos"
				},
				eventRender: function(event, element) { 
					var startt = moment(event.start).format('HH:mm');
					var endd = moment(event.end).format('HH:mm');
					element.find('.fc-title').append( '<br>' + startt + ' - ' + endd);
					element.addClass(event.estado.toLowerCase());
				},
				eventAfterAllRender: function( view ) {
					$('#msgModalProcessing').modal('hide');
				},
				eventMouseover: function(calEvent, jsEvent) {
					console.log(calEvent);
					var tooltip = '<div class="tooltipevent '+calEvent.estado.toLowerCase()+'">'+
						"<b>Responsable Proceso:</b> "+calEvent.procesoResp +"<br>"+
						"<b>Estado:</b> "+ calEvent.estado +" <br>" +
						"<b>Hora inicio:</b> "+ moment(calEvent.start).format('HH:mm') +"<br>" +
						"<b>Hora fin:   </b> "+ moment(calEvent.end).format('HH:mm') +"<br>" +
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
					info.append("<span class='LAVA_ID hide'>"+calEvent.LAVA_ID+"</span>");
					info.append("<p><b>Lavadora: </b> "+calEvent.LAVA_DESCRIPCION+" <b>Estado:</b> " +calEvent.ESRE_NOMBRE+ "</p>");
					info.append("<p><b>Inicio: </b> " + start + "<b> Fin: </b> " + end +"</p>");
					info.append("<p><b>Creado por:</b> <span class='RESE_CREADOPOR'>" +calEvent.RESE_CREADOPOR+ "</span></p>");


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
				},
				editable: false,
				droppable: true, // this allows things to be dropped onto the calendar !!!
				drop: function (date, allDay) { // this function is called when something is dropped
					// retrieve the dropped element's stored Event Object
					var originalEventObject = $(this).data('eventObject');
					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);
					allDay=false;
					// assign it the date that was reported
					copiedEventObject.start = date;
					copiedEventObject.end = date;
					copiedEventObject.allDay = allDay;
					copiedEventObject.backgroundColor = $(this).css("background-color");
					copiedEventObject.borderColor = $(this).css("border-color");

					// render the event on the calendar
					//$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
						// if so, remove the element from the "Draggable Events" list
						$(this).remove();
					}

					//Guardamos el evento creado en base de datos
					var title=copiedEventObject.title;
					var start=copiedEventObject.start.format("YYYY-MM-DD HH:mm");
					var end=copiedEventObject.end.format("YYYY-MM-DD HH:mm");
					var back=copiedEventObject.backgroundColor;

					var fechaInicioStr = $('#RESE_FECHAINICIO').data("DateTimePicker").date();
					var fechaIni = moment(fechaInicioStr).format("YYYY-MM-DD HH:mm:ss");

					var fechaFinStr = $('#fechaFin').data("DateTimePicker").date();
					var fechaFin = moment(fechaFinStr).format("YYYY-MM-DD HH:mm:ss");
				
					$.ajax({
						url: 'guardaEventos',
						data: 'title='+ title+'&start='+ fechaIni+'&allday='+allDay+'&background='+back+
						'&end='+fechaFin,
						type: "POST",
						headers: {
						"X-CSRF-TOKEN": crsfToken
						},
						success: function(events) {
							console.log('Evento creado');
							$('#calendar').fullCalendar('refetchEvents');
						},
						error: function(json){
							console.log("Error al crear evento");
							$('#errorAjax').append(json.responseText);
						}
					});
				}
			});

		});
	</script>

@endpush