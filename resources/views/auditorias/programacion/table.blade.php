
<table class="table table-responsive table-bordered table-striped" id="archivos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono </th>
            <th>Web</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($auditoriass as $auditorias)
        <tr>
            <td>{!! $auditoria->nombre !!}</td>
            <td>{!! $auditoria->direccion !!}</td>
            <td>{!! $auditoria->telefono !!}</td>
            <td>{!! $auditoria->web !!}</td>
            <td>{!! $auditoria->email !!}</td>
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
{{ $auditoria->links() }}