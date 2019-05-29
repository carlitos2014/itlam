@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Formato SGSST
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('sgsst.show_fields')
                    <a href="{!! route('sgsst_s.index') !!}" class="btn btn-default">Voler</a>
                </div>
            </div>
        </div>
    </div>
@endsection
