@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Asignación Académica
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('academicAsignacion.show_fields')
                    <a href="{!! route('asignacion.index') !!}" class="btn btn-default">Voler</a>
                </div>
            </div>
        </div>
    </div>
@endsection
