<table class="table table-responsive" id="firmas-table">
    <thead>
        <tr>
            <th>Cargo</th>
            <th>Archivo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($firmas as $firma)
        <tr>
            <td>{!! $firma->cargo !!}</td>
            <td><img src="{{ asset('storage/firmas/'.$firma->filename).'?'.\Carbon\Carbon::now()->timestamp }}" alt="" title="" width="100px" /></td>
            <td>
                {!! Form::open(['route' => ['app.firmas.destroy', $firma->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('app.firmas.show', [$firma->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('app.firmas.edit', [$firma->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {{--!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>