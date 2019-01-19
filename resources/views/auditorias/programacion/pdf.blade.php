<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title></title>

		<style type="text/css">
			@page {
				margin-top: 120px;
				margin-bottom: 82px;
				margin-left:  10px;
				margin-right: 10px;
			}
			.page-break { page-break-after: always; }

			table.header{
				position: fixed;
				top: -70px;
				width: 100%;
				margin-left: 20px;
				margin-right: 20px;
				font-size: 12px;
				text-align: center;
			}
			.title{font-size: 13px; font-weight: bold;}
			.title>h2{margin-bottom: 0;}
			.title>h3{margin-top: 0;}

			body{
				position: fixed;
				left: -20px;
				padding-top:60px;
				padding-left:20px;
				padding-right:20px;
				font-family:"Arial",sans-serif;
				font-size: 14px;
			}

			table.body{
				width: 100%;
				margin-left: 20px;
				margin-right: 20px;
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

			thead{ background-color: LightGray; }
			table { border-collapse: collapse; }
			table#head{/*table-layout: fixed;*/}
			table#result-encuesta{width:940px;}
			table, td, th { border: 1px solid black; }
			td, th { padding: 5px; }
			.td-text{ text-align: justify; }
			.td-number{
				text-align: center;
				width:50px;
			}
		</style>
		@stack('head')
	</head>
	
	<body>

    <div class="content">

      <table id="head" class="header" style="">
          <tr class="" style="text-align: center">
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

		<br>

      <table id="tb1" class="body" style="">
          <tr>
          	<td style="width: 200px">FECHA: {{$today}}</td>
          	<td>Periodo académico: </td>
          </tr>
          <tr >
          	<td colspan="2">AUDITOR LÍDER: {{$auditor_lider}}</td>
          </tr>
          <tr >
          	<td colspan="2">AUDITORES INTERNOS: {{$auditores_internos}}</td>
          </tr>
          <tr >
          	<td colspan="2">
          		Objetivo de la auditoria:
				<ol>
					<li>Evaluar los resultados obtenidos en el direccionamiento estratégico del sistema de gestión de calidad (eficacia)</li>
					<li>Determinar el grado de conformidad del Sistema de Gestión de la Calidad con los criterios establecidos  incluyendo ISO-9001:2008, los requisitos del cliente, legales y los requisitos de la prestación del servicio.</li>
					<li>Definir planes de mejoramientos a partir de los hallazgos detectados.</li>
				</ol>
			</td>
          </tr>
          <tr >
          	<td colspan="2">Alcance de la auditoria
          		<p>
					Inicia con la verificación del cumplimiento de los procedimientos del Proceso de Gestión Académica, incluye formatos, indicadores de Gestión, Cierre de No Conformidades y Finaliza con las acciones de mejoramiento.
				</p>

          	</td>
          </tr>
          <tr >
          	<td colspan="2">Criterios de Auditoria (Requisitos de la norma aplicada / Documentos de referencia)
          		<p>
					Requisitos 4, 5, 6, 7 y 8 de la norma NTC ISO 9001:2008. Procedimiento GA-PR-01 Organización Curricular, Procedimiento GA-PR-O2 Práctica Pedagógica, Procedimiento GA-PR-03 Evaluación y Seguimiento. GA-PR-O4 Admisiones y Matriculas, GA-PR-O5 Elaboración y Entrega de Certificados y constancias, GA-PR-O6 Elaboración y entrega de informes valorativos, GA-PR-O7 Elaboración y Entrega de Diplomas y Actas de Grado. GA-PR-O8  Estímulos para colaboradores. Formatos Aplicables.
				</p>
				<p>
					Indicadores de Gestión Académica, Atención de PQRS, Acciones correctivas y Preventivas, Niveles de Satisfacción de clientes. Cierre de no conformidades 2015.
				</p>
			</td>
          </tr>
          <tr >
          	<td colspan="2">
          		<p>Técnicas Aplicadas: Lista de verificación, entrevista, muestreo, observación, seguimiento, comprobación</p>
          	</td>
          </tr>
      </table>

		<br>

      <table id="tb2" class="body" style="text-align: center;">
          <tr>
          	<td style="">FECHA<br>(aaaa-mm-dd)</td>
          	<td style="">HORARIO</td>
          	<td style="">PROCESO AUDITADO</td>
          	<td style="">NOMBRE DEL<br>AUDITADO</td>
          	<td style="">NOMBRE DEL<br>AUDITOR</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>
          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>
          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>
          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

          <tr>
          	<td style="">2016-06-02</td>
          	<td style="">8am - 9am</td>
          	<td style="">Registro Académico</td>
          	<td style="">Carolina Vargas</td>
          	<td style="">Yulieth Ramírez</td>
          </tr>

      </table>
sadsasad
    {{-- <div class="page-break"></div> --}}


    </div><!-- end content -->
	</body>
</html>