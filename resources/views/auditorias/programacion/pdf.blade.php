<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title></title>

		<style type="text/css">
			@page {
				margin-top: 120px;
				margin-bottom: 82px;
				margin-left: 40px;
				margin-right: 40px;
			}
			.page-break { page-break-after: always; }
			.header{
				position: fixed;
				top: -120px;
				width: 100%;
				margin-left: 20px;
				margin-right: 20px;
			}
			.title{
				position: absolute;
				top: -90px;
				width: 100%;
				text-align: center;
			}
			.title>h2{margin-bottom: 0;}
			.title>h3{margin-top: 0;}
			.footer{
				position: fixed;
				bottom: 30px;
				width: 100%;
				color: #606060;
				margin-left: 20px;
				margin-right: 20px;
			}

			body{
				padding-left:20px;
				padding-right:20px;
				font-family:Arial;
				/*font-size: 12px;*/
			}

			thead{ background-color: LightGray; }
			table { border-collapse: collapse; }
			table#head{width:950px;/*table-layout: fixed;*/}
			table#result-encuesta{width:940px;}
			table, td, th { border: 1px solid black; }
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

      <table id="head">
          <tr class="" style="text-align: center">
            <td><img src="{{ asset('img/logo.jpg') }}" height="70" /></td>
            <td><pre><b>ASOCIACION CESAR CONTO</b>
				Colegio Cesar Conto Sede Principal, Colegio Cesar Conto Sede Petecuy y Colegio Técnico Comercial Dana María
				<b>ASOCIACION ANTONIO MACEO</b>
				Corporación Educativa Antonio Maceo, Centro Etnoeducativo Antonio Maceo y Liceo Santa Clara.</pre>
			</td>
            <td>GQ – FR – 08<br>
				Versión 04<br>
				2013 - 04 – 01<br>
				Página 2 de 2<br>
			</td>
          </tr>
          <tr>
          	<td colspan="3"><b>PLAN DE AUDITORIAS</b></td>
          </tr>
      </table>



    </div><!-- end content -->


	</body>
</html>