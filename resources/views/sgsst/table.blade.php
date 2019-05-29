
<table class="table table-responsive table-bordered table-striped" id="sgsst_s-table">
    <thead>

        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th colspan="3">Acción</th>

    </thead>
    <tbody >
        @foreach($sgsst_s as $row)
        <tr>

            <td>{!! $row-> nombre !!}</td>
            <td>{!! $row-> description !!}</td>
            <td>{!! $row-> created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['sgsst_s.destroy', $row->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sgsst_s.download',[$row->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-download"></i></a>
                    <a href="{!! route('sgsst_s.show', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sgsst_s.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $sgsst_s->links() }}