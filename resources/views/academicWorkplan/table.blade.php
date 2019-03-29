
<table class="table table-responsive table-bordered table-striped" id="acaWork-table">
    <thead>

    </thead>
    <tbody >
        @foreach($acaWork as $row)
        <tr>
            <td>

                <b>Creado: </b><?=  $row->created_at;  ?></span> </div>
                <div class="box-header "><i class="fa fa-file-pdf-o text-danger"></i>  <?= $row->ruta ;  ?>  </div>
                <div class="box-body"> 

                    {!! Form::open(['route' => ['academicWorkplan.destroy', $row->id], 'method' => 'delete']) !!}

                    <div class=''>
                        <a href="imagenes/<?= $row->ruta; ?>"target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i> </a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}

                </div>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $acaWork->links() }}