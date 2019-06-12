
<table class="table table-responsive table-bordered table-striped" id="asignacion-table">
    <thead>

        <th>Profesor</th>
        <th>Observaciones</th>
        <th>Fecha</th>
        <th colspan="3">Acción</th>

    </thead>
    <tbody >
        @foreach($asignacion as $row)
        <tr>

            <td>{!! $row->teacher->nombres .' '.$row->teacher->apellidos  !!}</td>
            <td>{!! $row-> observacion !!}</td>
            <td>{!! $row-> created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['asignacion.destroy', $row->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    @permission('acad-asignacion-download')
                    <a href="{!! route('asignacion.download',[$row->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-download"></i></a>
                    @endpermission

                    @permission('acad-asignacion-edit')
                    <a href="{!! route('asignacion.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endpermission

                    @permission('acad-asignacion-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Seguro?')"]) !!}
                    @endpermission
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $asignacion->links() }}