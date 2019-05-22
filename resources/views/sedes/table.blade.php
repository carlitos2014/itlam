
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
    @foreach($sedes as $sede)
        <tr>
            <td>{!! $sede->nombre !!}</td>
            <td>{!! $sede->direccion !!}</td>
            <td>{!! $sede->telefono !!}</td>
            <td>{!! $sede->web !!}</td>
            <td>{!! $sede->email !!}</td>
            <td>
                {!! Form::open(['route' => ['sedes.destroy', $sede->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sedes.show', [$sede->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sedes.edit', [$sede->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $sedes->links() }}