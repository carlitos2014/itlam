@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Auditoria
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('auditorias.show_fields')
                    <a href="{!! route('auditorias.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
