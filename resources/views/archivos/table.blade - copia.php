
<table class="table table-responsive table-bordered table-striped" id="sedes-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Archivo</th>

            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($archivos as $archivo)

        <div class="box box-primary">
            <div class="box-header"><i class="fa fa-user text-primary"></i>  <?= $archivo->nombre ;  ?> <span class="text-light-blue tools pull-right" >Creado-<?=  $archivo->created_at;  ?></span> </div>
            <div class="box-body"> 
              <i class="fa fa-circle-o text-yellow"></i> <span class="text-light-blue" >-<?=  $archivo->titulo;  ?></span>
              <br/> <span><b>Archivo: </b><?=  $archivo->ruta;  ?></span>    <span class="tools pull-right" ><a href="javascript:void(0);" ><i class="fa fa-trash-o"></i></a></span> 
              
              
              <br/><a href=""  target="_blank"><button class="btn  btn-info btn-xs">Ver</button></a>  
              <a href="descargar_publicacion/<?=  $archivo->id;   ?>"  ><button class="btn  btn-success btn-xs">Descargar</button></a>               
          </div>

      </div>
      <tr>


        <td>{!! $archivo->nombre !!}</td>
        <td>{!! $archivo->ruta !!}</td>
        <td>
            {!! Form::open(['route' => ['sedes.destroy', $archivo->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="imagenes/<?= $archivo->ruta; ?>"target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('cargarArchivos.edit', [$archivo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>      
    </tr>
    @endforeach
</tbody>
</table>
