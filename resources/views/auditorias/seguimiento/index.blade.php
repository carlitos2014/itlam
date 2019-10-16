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

{{-- @rinclude('index-modalCrearReservas') --}}

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalReserva" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header modal-header-reserva" style="padding:40px 50px;">		
		<h2><span class="glyphicon glyphicon-modal-window"></span> Detalle Reserva</h2>
	  </div>
	  <div class="modal-body" id="divmodal" style="padding:40px 50px;">
	  		AQUÍ VA LA INFO
	  </div>
	  <div class="modal-footer">
				<form id="frmDelete" method="POST" action="" accept-charset="UTF-8" class="frmModal pull-right">
					<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">
						<i class="fas fa-times" aria-hidden="true"></i> Cerrar
					</button>

					{{ Form::token() }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('<i class="fas fa-trash" aria-hidden="true"></i> Anular ',[
						'class'=>'btn btn-xs btn-danger',
						'type'=>'submit',
						'data-toggle'=>'modal',
						'data-backdrop'=>'static',
						'data-keyboard'=>'false',
						//'data-target'=>'#msgModalDeleting',
					]) }}
				</form>
          </div>
	</div>
  </div>
</div>



<!-- Mensaje Modal al borrar registro. Bloquea la pantalla mientras se procesa la solicitud -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="msgModalProcessing" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<h4>
					<i class="fa fa-cog fa-spin fa-3x fa-fw" style="vertical-align: middle;"></i> Cargando...
				</h4>
			</div>
		</div>

	</div>
</div><!-- Fin de Mensaje Modal al borrar registro.-->


<div id="errorAjax"></div>

@rinclude('index-scripts')
@endsection

