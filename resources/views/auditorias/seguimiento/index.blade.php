@extends('layouts.app')
@rinclude('index-head')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Calendario de Auditorías</h1>
        <h1 class="pull-right"></h1>
    </section>


    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">



				<div class="row">
					<div class="col-xs-12 col-sm-12"> <!-- col des. estados -->

						<table class="col-xs-12 col-sm-12" class="status-legend" cellspacing="1">
							<tbody>
								<tr>
									<td class="estados hide"></td>
									<td class="estados pendiente">PENDIENTE</td>
									<td class="estados cumplida">CUMPLIDA</td>
									<td class="estados reprogramada">REPROGRAMADA</td>
									<td class="estados aplazada">APLAZADA</td>
								</tr>
							</tbody>
						</table>

					</div>

					<div class="col-xs-12 col-sm-12"> <!-- col calendar -->
						<div class="box box-primary">
							<div class="box-body no-padding">
								<!-- THE CALENDAR -->
								<div id="calendar"></div>
							</div><!-- /.box-body -->
						</div> <!-- /. box -->
					</div> <!-- /.col calendar -->
				</div> <!-- /.row -->
				<!-- /.Main content -->




            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

	<div id="errorAjax"></div>
	@rinclude('index-scripts')
@endsection

@push('modals')
<div class="modal fade" id="modalReserva" role="dialog" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content panel-danger">
			<div class="modal-header panel-heading" style="border-top-left-radius: inherit; border-top-right-radius: inherit;">
				<h4 class="modal-title">Detalle Proceso Auditoría<span class="id"></span></h4>
			</div>

			<div class="modal-body" id="divmodal" style="padding:40px 50px;">

				<div class="row"> 
					<div class="col-xs-2"><b>Área:</b></div>
					<div class="col-xs-10" id="strName">String</div>
				</div>

				<div class="row"> 
					<div class="col-xs-2"><b>Auditor:</b></div>
					<div class="col-xs-10" id="strAud">String</div>
				</div>

				<div class="row"> 
					<div class="col-xs-2"><b>Fecha:</b></div>
					<div class="col-xs-4" id="strDate">YYYY-MM-DD</div>
					<div class="col-xs-1"><b>Inicio:</b></div>
					<div class="col-xs-2" id="strStart">HH:mm</div>
					<div class="col-xs-1"><b>Fin:</b></div>
					<div class="col-xs-2" id="strEnd">HH:mm</div>
				</div>



			</div>

			<div class="modal-footer">
				<form id="frmDelete" method="POST" action="" accept-charset="UTF-8" class="frmModal pull-right">
					<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">
						<i class="fa fa-times" aria-hidden="true"></i> NO
					</button>

					{{ Form::token() }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i> SI ',[
						'class'=>'btn btn-xs btn-danger',
						'type'=>'submit',
						'data-toggle'=>'modal',
						'data-backdrop'=>'static',
						'data-keyboard'=>'false',
						'data-target'=>'#msgModalDeleting',
					]) }}
				</form>
			</div>
		</div>
	</div>
  </div>
</div>

@endpush