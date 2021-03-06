<table class="table table-responsive" id="procesos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Responsable</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($procesos as $procesos)
        <tr>
            <td>{!! $procesos->nombre !!}</td>
            <td>{!! $procesos->responsable !!}</td>
            <td>{!! $procesos->email !!}</td>
            <td>
                {!! Form::open(['route' => ['auditorias.procesos.destroy', $procesos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auditorias.procesos.show', [$procesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('auditorias.procesos.edit', [$procesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>