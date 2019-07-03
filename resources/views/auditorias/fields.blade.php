@include('widgets.datepicker')
@include('widgets.select2')

<div class="col-sm-12 col-lg-12">
    <!-- Fecha Field -->
    @include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fecha', 'label'=>'Fecha' ])
    <!-- Lugar Field -->
    @include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'lugar', 'label'=>'Lugar'])
</div>
<div class="col-sm-12 col-lg-12">
    <!-- Lugar Auditor lider -->
    @include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditor_lider_id', 'label'=>'Auditor lider', 'data'=>$arrAuditores, 'options'=>['required']]) 
    <!-- Lugar Auditores internos -->
    @include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditoresInternos', 'label'=>'Auditores internos', 'data'=>$arrAuditores, 'multiple'=>true, 'options'=>['']])
</div>

<div class="col-sm-12 col-lg-12">
    <!-- Fecha Field -->
    @include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fecha_apertura', 'label'=>'Fecha apertura' ])
    <!-- Lugar Field -->
    @include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'lugar_apertura', 'label'=>'Lugar apertura'])
</div>
<div class="col-sm-12 col-lg-12">
    <!-- Fecha Field -->
    @include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fecha_cierre', 'label'=>'Fecha cierre' ])
    <!-- Lugar Field -->
    @include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'lugar_cierre', 'label'=>'Lugar cierre'])
</div>


<!-- Objetivos Field -->
<div class="col-sm-12 col-lg-6">
    @include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'objetivos', 'label'=>'Objetivos:', 'options'=>['maxlength' => '3000'] ])
</div>

<!-- Alcances Field -->
<div class="col-sm-12 col-lg-6">
    @include('widgets.forms.input', [ 'type'=>'textarea',  'name'=>'alcances', 'label'=>'Alcances:', 'options'=>['maxlength' => '3000'] ])
</div>

<!-- Criterios Field -->
<div class="col-sm-12 col-lg-6">
    @include('widgets.forms.input', [ 'type'=>'textarea',  'name'=>'criterios', 'label'=>'Criterios:', 'options'=>['maxlength' => '3000'] ])
</div>

<!-- Observaciones Field -->
<div class="col-sm-12 col-lg-6">
    @include('widgets.forms.input', [ 'type'=>'textarea',  'name'=>'observaciones', 'label'=>'Observaciones:', 'options'=>['maxlength' => '3000'] ])
</div>


@if(isset($auditoria))
<div class="form-group col-sm-12">
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <th>id</th>
            <th>FECHA</th>
            <th>HORARIO</th>
            <th>PROCESO AUDITADO</th>
            <th>NOMBRE DEL AUDITADO</th>
            <th>NOMBRE DEL AUDITOR</th>
            <th>
                <a href="{!! route('auditorias.auditoriaProcesos.create',['auditoria'=>$auditoria->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-plus"></i> proceso</a>
            </th>
        </thead>
        <tbody>
            @foreach($auditoria->procesos->sortBy('fecha') as $aud_proceso)
            <tr>
                <td>{{$aud_proceso->id}}</td>
                <td>{{$aud_proceso->fecha->format('Y-m-d')}}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $aud_proceso->hora_inicio)->format('g:i a').' - '.\Carbon\Carbon::createFromFormat('H:i:s', $aud_proceso->hora_fin)->format('g:i a')}}</td>
                <td>{{$aud_proceso->proceso->nombre }}</td>
                <td>{{$aud_proceso->proceso->responsable }}</td>
                <td>{{$aud_proceso->auditor->nombre }}</td>
                <td class="text-center">
                    <div class='btn-group'>
                        <a href="{!! route('auditorias.auditoriaProcesos.edit', [$aud_proceso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        {{ Form::button('<i class="glyphicon glyphicon-trash"></i>',[
                            'class'=>'btn btn-xs btn-danger btn-delete',
                            'data-toggle'=>'modal',
                            'data-id'=> $aud_proceso->id,
                            'data-modelo'=> str_upperspace(class_basename($aud_proceso)),
                            'data-descripcion'=> $aud_proceso->nombre,
                            'data-action'=>route('auditorias.auditoriaProcesos.destroy', [$aud_proceso->id]),
                            'data-target'=>'#pregModalDelete',
                            'data-tooltip'=>'tooltip',
                            'title'=>'Borrar',
                        ])}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditorias.index') !!}" class="btn btn-default">Cancelar</a>
</div>


@include('widgets.modals.modal-delete')