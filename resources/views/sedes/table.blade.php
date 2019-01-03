<table class="table table-responsive" id="sedes-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Web</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sedes as $sedes)
        <tr>
            <td>{!! $sedes->nombre !!}</td>
            <td>{!! $sedes->direccion !!}</td>
            <td>{!! $sedes->telefono !!}</td>
            <td>{!! $sedes->web !!}</td>
            <td>{!! $sedes->email !!}</td>
            <td>
                {!! Form::open(['route' => ['sedes.destroy', $sedes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sedes.show', [$sedes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sedes.edit', [$sedes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>