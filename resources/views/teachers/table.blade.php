
<table class="table table-responsive table-bordered table-striped" id="archivos-table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Sede</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td>{!! $teacher->nombres !!}</td>
            <td>{!! $teacher->apellidos !!}</td>
            <td>{!! $teacher->telefono !!}</td>
            <td>{!! $teacher->email !!}</td>
            <td>{!! $teacher->sede->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['teacher.destroy', $teacher->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('teacher.show', [$teacher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('teacher.edit', [$teacher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>