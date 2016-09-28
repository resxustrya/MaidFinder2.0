


@extends('admin.layout')


@section('content')
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m12 l6 center-align">
                <h4>Applicants</h4>
                <?php $not_verified_count = Applicants::where('isVerified', '=', 0)->count(); ?>
                <?php $verified_count = Applicants::where('isVerified', '=', 1)->count(); ?>
                <p>
                    <a href="{{ asset('/admin/applicant/accounts-pending') }}">Pending accounts - ({{ $not_verified_count }})</a>
                </p>
                <p>
                    <a href="{{ asset('/admin/applicant/accounts/') }}">Applicant accounts - ({{ $verified_count }})</a>
                </p>
            </div>
            <div class="col s12 m12 l6 center-align">
                <h4>Employers</h4>
                <?php $not_verified_count = Employers::where('isVerified', '=', 0)->count(); ?>
                <?php $verified_count = Employers::where('isVerified', '=', 1)->count(); ?>
                <p>
                    <a href="{{ asset('admin/employer/accounts-pending') }}">Pending accounts - ({{ $not_verified_count }}) </a>
                </p>
                <p>
                    <a href="{{ asset('/admin/employer/accounts') }}">Employer accounts - ({{ $verified_count }})</a>
                </p>
            </div>
        </div>
    </div>
@stop


@section('js')

@stop


@section('css')


@stop
