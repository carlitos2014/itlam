<table class="table table-responsive" id="auditorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Display</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $rol)
        <tr>
            <td>{{ $rol -> name }}</td>
            <td>
                {{ $rol -> display_name }}
                @if($rol->description)
                <i class="fa fa-question-circle" aria-hidden="true" data-tooltip="tooltip" data-container="body" title="{{ $rol -> description }}"></i>
                @endif
            </td>
            <td>{{ datetime($rol->created_at, true) }}</td>
            <td>{{ datetime($rol->updated_at, true) }}</td>
            <td>
                {!! Form::open(['route' => ['auth.roles.destroy', $rol->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auth.roles.edit', [$rol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>