
<table class="table table-responsive table-bordered table-striped" id="archivos-table">
    <thead>

    </thead>
    <tbody >
        @foreach($archivos as $archivo)
        <tr>
            <td>

                <div class="box-header"><b>Nombre: </b> <?= $archivo->nombre ;  ?> <span class=" tools pull-right" ><b>Creado: </b><?=  $archivo->created_at;  ?></span> </div>
                <div class="box-header "><i class="fa fa-file-pdf-o text-danger"></i>  <?= $archivo->ruta ;  ?>  </div>
                <div class="box-body"> 

                    {!! Form::open(['route' => ['cargarArchivos.destroy', $archivo->id], 'method' => 'delete']) !!}

                    <div class=''>
                        <a href="imagenes/<?= $archivo->ruta; ?>"target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i> </a>
                        <a href="imagenes/<?= $archivo->ruta; ?>"target="_blank" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-save-file"></i></a>
                        <a href="{!! route('cargarArchivos.edit', [$archivo->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}

                </div>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $archivos->links() }}