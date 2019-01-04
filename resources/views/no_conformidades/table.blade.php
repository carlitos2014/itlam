<table class="table table-responsive table-bordered table-striped" id="noConformidades-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Motivo</th>
        <th>Grado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($noConformidades as $noConformidades)
        <tr>
            <td>{!! $noConformidades->nombre !!}</td>
            <td>{!! $noConformidades->motivo !!}</td>
            <td>{!! $noConformidades->grado !!}</td>
            <td>
                {!! Form::open(['route' => ['noConformidades.destroy', $noConformidades->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('noConformidades.show', [$noConformidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('noConformidades.edit', [$noConformidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>