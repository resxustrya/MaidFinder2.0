
@extends('admin.layout')


@section('content')
    <div class="row">
        <h4>Employers subscription</h4>
    </div>
    <div class="row">
        <div class="col s12 m12 l10">
            <div class="card-panel">
                <a href="{{ asset('/admin/subscriber/add') }}" class="btn blue">Add new subscriber</a>
                <a href="{{ asset('/admin/subscriber') }}" class="btn blue tab2">View subscriber</a>
            </div>
        </div>
    </div>
@stop


@section('css')


@stop

@section('js')


@stop
