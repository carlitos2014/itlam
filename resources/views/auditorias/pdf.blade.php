<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Auditoría {{$auditoria->lugar}} - {{$auditoria->fecha->format('Y-m-d')}}</title>

		<style type="text/css">
			@page {
				margin-top: 120px;
				margin-bottom: 82px;
				margin-left:  60px;
				margin-right: 60px;
			}
			.page-break { page-break-after: always; }

			.header{
				position: fixed;
				top: -70px;
				width: 100%;
				font-size: 12px;
			}

			.title{font-size: 13px; font-weight: bold;}
			.title>h2{margin-bottom: 0;}
			.title>h3{margin-top: 0;}

			body{
				padding-top:70px;
				font-family:"Arial",sans-serif;
				font-size: 14px;
			}

			table.body{
				width: 100%;
				font-size: 16px;
			}

			.footer{
				position: fixed;
				bottom: 30px;
				width: 100%;
				color: #606060;
				margin-left: 20px;
				margin-right: 20px;
			}
			.text-muted{color: #777;font-size: 12px;}

			table { border-collapse: collapse;page-break-inside: auto; }
			table, td, th { border: 1px solid black; }
			thead { background-color: LightGray; }
			td, th { padding: 5px; }
			th { font-size: 12px; }
			.text-justify {text-align: justify;}
		</style>
	</head>
	
	<body>
		<div class="header">
			  <table id="tbHead" class="" style="text-align: center;">
				  <tr class="" style="">
					<td style="width: 120px"><img src="{{ public_path().'/img/logo.jpg' }}" width="120" /></td>
					<td>
						<span class="title">ASOCIACION CESAR CONTO</span><br>
						Colegio Cesar Conto Sede Principal, Colegio Cesar Conto Sede Petecuy y Colegio Técnico Comercial Dana María<br>
						<span class="title">ASOCIACION ANTONIO MACEO</span><br>
						Corporación Educativa Antonio Maceo, Centro Etnoeducativo Antonio Maceo y Liceo Santa Clara.<br>
					</td>
					<td style="width: 120px">
						GQ – FR – 08<br>
						Versión 04<br>
						2013 - 04 – 01<br>
						<!-- Espacio reservado para numeración de página--><br>
					</td>
				  </tr>
				  <tr>
					<td colspan="3"><b>PLAN DE AUDITORIAS</b></td>
				  </tr>
			  </table>
		</div>



	<div class="content">

	  <table id="tb1" class="body" style="">
		  <tr>
			<td style="width: 200px">FECHA: {{$today}}</td>
			<td>Periodo académico: </td>
		  </tr>
		  <tr >
			<td colspan="2">AUDITOR LÍDER: {{$auditoria->auditorLider->nombre}}</td>
		  </tr>
		  <tr >
			<td colspan="2">AUDITORES INTERNOS: {{ implode(', ', $auditoria->auditoresInternos->pluck('nombre')->toArray()) }}</td>
		  </tr>
		  <tr >
			<td colspan="2">
				Objetivo de la auditoria:
				<ol>
						 @foreach(preg_split('/[\n\r]+/', $auditoria->objetivos ) as $obj)
					<li>{{$obj}}</li>
						 @endforeach
				</ol>
			</td>
		  </tr>
		  <tr >
			<td colspan="2">Alcance de la auditoria
					@foreach(preg_split('/[\n\r]+/', $auditoria->alcances ) as $obj)
					<p>{{$obj}}</p>
					@endforeach
			</td>
		  </tr>
		  <tr >
			<td colspan="2">Criterios de Auditoria <span class="text-muted">(Requisitos de la norma aplicada / Documentos de referencia)</span>
					@foreach(preg_split('/[\n\r]+/', $auditoria->criterios ) as $obj)
					<p>{{$obj}}</p>
					@endforeach
			</td>
		  </tr>
		  <tr >
			<td colspan="2">
				<p>Técnicas Aplicadas: Lista de verificación, entrevista, muestreo, observación, seguimiento, comprobación</p>
			</td>
		  </tr>
	  </table>

		<br>

	  <table id="tbProcesos" class="body" style="text-align: center;">
		  <tr>
			<th style="">FECHA<br>(aaaa-mm-dd)</th>
			<th style="">HORARIO</th>
			<th style="">PROCESO AUDITADO</th>
			<th style="">NOMBRE DEL<br>AUDITADO</th>
			<th style="">NOMBRE DEL<br>AUDITOR</th>
		  </tr>

			@foreach($auditoria->procesos as $aud_proceso)
			<tr>{{-- dd(   $aud_proceso->hora_inicio ) --}}
				<td>{{$aud_proceso->fecha->format('Y-m-d')}}</td>
				<td style="font-size: 12px;">{{ \Carbon\Carbon::createFromFormat('H:i:s', $aud_proceso->hora_inicio)->format('g:i a').' - '.\Carbon\Carbon::createFromFormat('H:i:s', $aud_proceso->hora_fin)->format('g:i a')}}</td>
				<td>{{$aud_proceso->proceso->nombre }}</td>
				<td>{{$aud_proceso->proceso->responsable }}</td>
				<td>{{$aud_proceso->auditor->nombre }}</td>
			</tr>
			@endforeach
	  </table>
	  
	@if($auditoria->procesos->count() < 6)
		<div class="page-break"></div>
	@else
		<br>
	@endif

	  <table id="tbProg" class="body" style="text-align: center;">
		<tr>
			<td>REUNIÓN<br>DE APERTURA</td>
			<td>FECHA: {{$auditoria->fecha_apertura->toDateString()}}</td>
			<td>HORA:  {{$auditoria->fecha_apertura->format('h:i A')}}</td>
			<td>LUGAR:<br>{{$auditoria->lugar_apertura}}</td>
		</tr>
		<tr>
			<td>REUNIÓN<br>DE CIERRE</td>
			<td>FECHA: {{$auditoria->fecha_cierre->toDateString()}}</td>
			<td>HORA:  {{$auditoria->fecha_cierre->format('h:i A')}}</td>
			<td>LUGAR:<br>{{$auditoria->lugar_cierre}}</td>
		</tr>
	  </table>

		<br>

	  <table id="tbObsFirm" class="body" style="">
		<tr style="vertical-align: top">
			<td rowspan="2" style="height: 300px;">OBSERVACIONES</td>
			<td>
				Firma Coordinador de Calidad<br>
				{ img }
			</td>
		</tr>
		<tr style="vertical-align: top">
			<td >
				Firma aprobación de la Alta Dirección<br>
				{ img }
			</td>
		</tr>
	  </table>


		<br>
		<h3 style="text-align: center;">CONTROL DE CAMBIOS</h3>

		<table id="tbControlCambios" class="body" style="text-align: center;font-size: 12px;">
			<tr>
				<th style="">FECHA REGISTRO</th>
				<th style="">VERSIÓN</th>
				<th style="">MOTIVO DEL CAMBIO</th>
				<th style="">FECHA DE SOCIALIZACIÓN</th>
			</tr>
			<tr>
				<td></td>
				<td>2º</td>
				<td class="text-justify"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>3º</td>
				<td class="text-justify"></td>
				<td></td>
			</tr>
			<tr>
				<td>01/04/2013</td>
				<td>4º</td>
				<td class="text-justify">Se incluye en plantilla la nueva institución que hace parte de la Asociación Cesar Conto. Se unifica con el Listado maestro de Registros. Al definir algunos formatos como documentos, se da paso a la organización del consecutivo. Antes GQ-FR-06..</td>
				<td>22/03/2013</td>
			</tr>
		</table>

	</div><!-- end content -->
	</body>
</html>