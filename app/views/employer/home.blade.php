

@extends('employer.layout')


@section('content')
@if(isset($ads) and count($ads) >0)
    <div class="row">
        <h5>Current ad preferrences</h5>
    </div>
    <div class="row">
        <div class="col s12 m12 l11">
            @foreach($ads as $ad)
                <?php
                $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
                $edlevel = array("Elementary", "High School", "College graduate");
                $jobtype = JobTypes::where('jobtypeid', '=', $ad->jobtypeid)->first();
                $location = Regions::where('regionid', '=', $ad->regionid)->first();
                ?>
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <span style="font-size: 1.2em;">Your ideal helper - {{ $jobtype->description }}</span>
                            <br />
                            <br />
                            <div class="valign-wrapper">
                                <i class="material-icons">location_on</i>
                                <span class="tab1">Preferred location :</span>
                                <strong class="tab2">{{ $location->location }}</strong>
                            </div>
                            <div class="valign=wrapper">
                                <i class="material-icons">work</i>
                                <span class="tab1">Employment type :</span>
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <strong class="tab1">{{ $capacity[$ad->capacity] }}</strong>
                            </div>
                            <div class="valign-wrapper">
                                <i class="material-icons">supervisor_account</i>
                                <span class="tab1">Gender :</span>
                                <?php $gender = array('Male', 'Female', 'Any'); ?>
                                <strong class="tab1">{{ $gender[$ad->gender] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 center">
                            <a class="btn-large blue" href="{{ asset('/employer/ad/helper/type') }}">Create new ad</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <ul class="pagination">
            <?php echo $ads->links(); ?>
        </ul>
    </div>
@else
    <div class="container-fluid">
        <div class="row" style="margin-top:20px;">
            <div class="col s12 m12 l11">
                <div class="card-panel" style="padding:10px;">
                    <?php $application_count = Applications::all()->count(); ?>
                    <h5 class="center-align">Over {{ $application_count }} job applicant profiles  are now available.</h5>
                    <h6 class="center-align">Create and post your job ad availavibility now and find your match applicant that matches your job ad preference.</h6>
                    <br />
                    <div class="center-align">
                        <a class="btn-large blue" href="{{ asset('/employer/ad/helper/type') }}">Create job ad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container-fluid">
    @if(isset($ads) and count($ads) > 0)
        <div class="row">
            <h5>Auto suggested job applicants</h5>
        </div>
    @else
        <br />
        <div class="divider"></div>
        <div class="row">
            <h5>Job applicants near you.</h5>
        </div>
    @endif
    <div class="row" style="padding: 20px;">
        <div class="col s12 m12 l12" style="margin-left: 20px;">
            <?php
            if(isset($applications) and count($applications) > 0) {

            } else {
                $applications = Applications::where('regionid', '=' ,$emp->regionid)->paginate(12);
            }

            ?>
            <?php $count = 1; ?>
            @foreach($applications as $app)
                <?php
                $location = Regions::find($app->regionid);
                $applicant = Applicants::find($app->appid);
                $jobtype = JobTypes::find($app->jobtypeid);
                ?>
                <div class="col s12 m6 l3">
                    <a target="_blank" href="{{ asset('application/view/'. $app->applicationid) }}" class="black-text">
                        <div class="row">
                            <img class="image circle" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                        </div>
                        <div class="row">
                       <span class="valign-wrapper">
                           <i class="material-icons">perm_identity</i>
                           <strong class="tab1">{{ $applicant->fname }}</strong>
                       </span>
                       <span class="valign-wrapper">
                           <i class="material-icons">work</i>
                           <strong class="tab1">{{ $jobtype->description }}</strong>
                       </span>
                        </div>
                    </a>
                </div>
                <?php $count++ ?>
            @endforeach
        </div>
    </div>
    <div class="row">
        <ul class="pagination">
            <?php echo $applications->links(); ?>
        </ul>
    </div>
</div>

@stop

@section('js')
    @parent

@stop

@section('css')
    @parent
    <style>

        .image {
            height: 300px;
            max-width:300px;
        }
        .image {
            max-width: 150px;
            height: 150px;
        }
        .name {
            font-family: "Tahoma";
            font-size: 1.2em;
        }
        table.info tr td {
            padding: 0px;
            color: #333;
        }
    </style>

@stop