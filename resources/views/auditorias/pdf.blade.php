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
		</style>
	</head>
	
	<body>
        <div class="header">
		      <table id="tbHead" class="" style="text-align: center;">
		          <tr class="" style="">
		            <td style="width: 120px"><img src="{{ asset('img/logo.jpg') }}" width="120" /></td>
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
      
    {{-- <div class="page-break"></div> --}}


    </div><!-- end content -->
	</body>
</html>