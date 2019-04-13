<table class="table table-responsive" id="auditorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Creado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario -> name }}</td>
            <td>{{ $usuario -> username }}</td>
            <td>{{ $usuario -> cedula }}</td>
            <td>{{ $usuario -> email }}</td>
            <td>{{ $usuario -> roles ->implode('display_name', ',') }}</td>
            <td>
                {!! Form::open(['route' => ['auth.usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! URL::to('password/reset?id='.$usuario->id) !!}" class='btn btn-default btn-xs' data-tooltip="tooltip" title="Cambiar Contraseña"><i class="fa fa-fw fa-key text-warning" aria-hidden="true"></i></a>
                    <a href="{!! route('auth.usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="fa fa-user-times" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
