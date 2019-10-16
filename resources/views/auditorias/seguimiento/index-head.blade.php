@push('css')
    {!! Html::style('css/fullcalendar.css') !!}

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<style type="text/css">
		.modal-header-reserva {
			background-color: #286090;
			color:white !important;
			text-align: center;
			font-size: 25px;
			border-radius:6px;
		}
		.btn-primaryy {
			-webkit-border-radius: 8;
			-moz-border-radius: 8;
			border-radius: 8px;
			font-family: Arial;
			color: #ffffff;
			font-size: 28px;
			background: #265a88;
			padding: 10px 23px 10px 20px;
			text-decoration: none;
		}
		.btn-primaryy:hover {
			background: #23527c;
			color: #ffffff;
		  	text-decoration: none;
		}
		.btn-primaryy:focus {
		  	background: #23527c;
		  	color: #ffffff;
		 	text-decoration: none;
		}

		table.status-legend {
			width:100px;
			border: solid 1px #999;
		}
		.fc-title{color: black;}

		.tooltipevent{
			width:200px;
			max-height:250px;
			/*background-color: #f9ec54;*/
			position:absolute;
			z-index:10001;
			padding: 5px;
		}

		.estados {
			z-index: 8;
			width:100px;
			border-radius: 8px;
			text-align: center;
		}
		.cumplida {
			background-color: rgb(0, 255, 0);
		}
		.pendiente {
			background-color: rgb(255, 255, 0);
		}
		.anulada {
			background-color: rgb(204, 204, 204);
		}
		.reprogramada {
			background-color: cyan;
		}
		.aplazada {
			background-color: gray;
		}
	</style>
@endpush