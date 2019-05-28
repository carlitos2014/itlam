
<table class="table table-responsive table-bordered table-striped" id="sgsst_s-table">
    <thead>

        <th>Nombre</th>
        <th>Descripción</th>
        <th>Formato</th>
        <th colspan="3">Acción</th>

    </thead>
    <tbody >
        @foreach($sgsst_s as $row)
        <tr>

            <td>{!! $row-> nombre !!}</td>
            <td>{!! $row-> description !!}</td>
            <td>
                <!-- <b>Creado: </b><?=  $row->created_at;  ?></span> </div> -->
                <div class="box-header "><i class="fa fa-file-text-o"></i>
                </div>
               <!--  <div class="box-body"> --> 
            </td>    
            <td>
                    {!! Form::open(['route' => ['sgsst_s.destroy', $row->id], 'method' => 'delete']) !!}

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
{{ $sgsst_s->links() }}