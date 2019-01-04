@extends('layouts.menu')
@section('title', '/ Contratos')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-12">
			Mis Certificados - {{auth()->user()->cedula}}
		</div>
	</div>
@endsection

@section('section')

	<table class="table" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">Empleador</th>
				<th class="col-md-5">Tipo Contrato</th>
				<th class="col-md-5">Clase Contrato</th>
				<th class="col-md-5">Salario</th>
				<th class="col-md-5">Cargo</th>
				<th class="col-md-5">Estado</th>
				<th class="col-md-5">Fecha Ingreso</th>
				<th class="col-md-5">Fecha Fin</th>
				<th class="col-md-5">Fecha Retiro</th>
				<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($contratos as $contrato)
			<tr>
				<td>{{ $contrato -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $contrato -> TICO_DESCRIPCION }}</td>
				<td>{{ $contrato -> CLCO_DESCRIPCION }}</td>
				<td>{{ $contrato -> CONT_SALARIO }}</td>
				<td>{{ $contrato -> CARG_DESCRIPCION }}</td>
				<td>{{ $contrato -> ESCO_DESCRIPCION }}</td>
				<td>{{ $contrato -> CONT_FECHAINGRESO }}</td>
				<td>{{ $contrato -> CONT_FECHATERMINACION }}</td>
				<td>{{ $contrato -> CONT_FECHARETIRO }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-danger btn-xs" href="{{ route('CnfgContratos.certificados.build', [ 'CONT_ID' => $contrato->CONT_ID ] ) }}" data-tooltip="tooltip" title="Generar certificado">
						<i class="fas fa-file-pdf" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@include('widgets.modals.modal-delete')
@endsection