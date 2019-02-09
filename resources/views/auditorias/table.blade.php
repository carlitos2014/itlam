<table class="table table-responsive" id="auditorias-table">
    <thead>
        <tr>
            <th>Fecha</th>
        <th>Lugar</th>
        <th>Objetivos</th>
        <th>Alcances</th>
        <th>Criterios</th>
        <th>Observaciones</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($auditorias as $auditoria)
        <tr>
            <td>{!! $auditoria->fecha !!}</td>
            <td>{!! $auditoria->lugar !!}</td>
            <td>{!! $auditoria->objetivos !!}</td>
            <td>{!! $auditoria->alcances !!}</td>
            <td>{!! $auditoria->criterios !!}</td>
            <td>{!! $auditoria->observaciones !!}</td>
            <td>
                {!! Form::open(['route' => ['auditorias.destroy', $auditoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auditorias.show', [$auditoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('auditorias.edit', [$auditoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>