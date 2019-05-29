
<table class="table table-responsive table-bordered table-striped" id="academics-table">
    <thead>

    </thead>
    <tbody >
        @foreach($academics as $row)
        <tr>
            <td>

                <b>Creado: </b><?=  $row->created_at;  ?></span> </div>
                <div class="box-header "><i class="fa fa-file-pdf-o text-danger"></i>  <?= $row->ruta ;  ?>  </div>
                <div class="box-body"> 

                    {!! Form::open(['route' => ['academic.destroy', $row->id], 'method' => 'delete']) !!}

                   
                    <div class='btn-group'>
                    <a href="{!! route('academic.download',[$row->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-download"></i></a>
                    <a href="{!! route('academic.show', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('academic.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Seguro?')"]) !!}
                </div

                    {!! Form::close() !!}

                </div>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $academics->links() }}