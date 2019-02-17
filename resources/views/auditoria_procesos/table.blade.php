<table class="table table-responsive" id="auditoriaProcesos-table">
    <thead>
        <tr>
            <th>Fecha</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Proceso Id</th>
        <th>Auditor Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($auditoriaProcesos as $auditoriaProcesos)
        <tr>
            <td>{!! $auditoriaProcesos->fecha !!}</td>
            <td>{!! $auditoriaProcesos->hora_inicio !!}</td>
            <td>{!! $auditoriaProcesos->hora_fin !!}</td>
            <td>{!! $auditoriaProcesos->proceso_id !!}</td>
            <td>{!! $auditoriaProcesos->auditor_id !!}</td>
            <td>
                {!! Form::open(['route' => ['auditoriaProcesos.destroy', $auditoriaProcesos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auditoriaProcesos.show', [$auditoriaProcesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('auditoriaProcesos.edit', [$auditoriaProcesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>