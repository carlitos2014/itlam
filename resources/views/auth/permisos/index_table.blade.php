<table class="table table-responsive" id="auditorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Display</th>
            <th>Roles</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($permisos as $permiso)
        <tr>
            <td>{{ $permiso -> name }}</td>
            <td>
                {{ $permiso -> display_name }}
                @if($permiso->description)
                <i class="fa fa-question-circle" aria-hidden="true" data-tooltip="tooltip" data-container="body" title="{{ $permiso -> description }}"></i>
                @endif
            </td>
            <td>{{ $permiso -> roles -> count() }}</td>
            <td>{{ datetime($permiso->created_at, true) }}</td>
            <td>{{ datetime($permiso->updated_at, true) }}</td>
            <td>
                {!! Form::open(['route' => ['auth.permisos.destroy', $permiso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auth.permisos.edit', [$permiso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>