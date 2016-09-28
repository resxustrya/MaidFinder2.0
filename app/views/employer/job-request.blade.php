

@extends('employer.layout')
@section('css')

@stop

@section('content')
    <div class="row">
        <h4>Job request</h4>
    </div>
    @if($apply_ad != null and count($apply_ad) > 0)
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12 l10">
                    @foreach($apply_ad as $a)
                        <?php
                            $application = Applications::where('appid', '=', $a->appid)->first();
                        ?>

                        @if(isset($application) and count($application) > 0)
                            <?php $applicant = Applicants::find($application->appid); ?>
                            <a class="black-text" target="_blank" href="{{ asset('/application/view/'.$application->applicationid) }}">
                                <div class="card-panel">
                                    <div class="row">
                                        <h4>{{ $applicant->fname  }}</h4>
                                        <div class="divider"></div>
                                        <?php $jobtype = JobTypes::find($application->jobtypeid); ?>
                                        <span>Contract situation :</span><strong class="tab2">{{ ($applicant->isHiring == NULL) ? 'Available' : 'Already hired'  }}</strong>
                                         <span class="valign-wrapper">
                                            <i class="material-icons">location_on</i>
                                            <span class="tab1">Location :</span>
                                             <?php $region = Regions::find($applicant->regionid); ?>
                                            <strong class="tab1">{{ $region->location }}</strong>
                                        </span>
                                        <span class="valign-wrapper">
                                            <i class="material-icons">work</i>
                                            <span class="tab1">Applying for :</span>
                                            <strong class="tab1">{{ $jobtype->description }}</strong>
                                        </span>
                                        <span class="valign-wrapper">
                                            <i class="material-icons">label</i>
                                            <span class="tab1">Nationality :</span>
                                            <?php $n = Nationalities::find($applicant->nationality); ?>
                                            <strong class="tab1">{{ $n->nationality }} </strong>
                                        </span> <span class="valign-wrapper">
                                            <i class="material-icons">label</i>
                                            <span class="tab1">Religion :</span>
                                                <?php $n = Religions::find($applicant->religion); ?>
                                                <strong class="tab1"> {{ $n->religion }}</strong>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <h5>Applicant message.</h5>
                                        <blockquote class="flow-text" style="font-size: 1em;">
                                            {{ $a->message }}
                                        </blockquote>
                                    </div>
                                    <div class="row">
                                        <div class="valign-wrapper">
                                            <a href="{{asset('/employer/remove/request/'. $a->id)}}"> <strong class="tab2">Remove</strong></a>
                                            <span class="tab1"> | </span>
                                            <a class="tab1" target="_blank" href="{{ asset('/application/view/'.$application->applicationid) }}">View profile</a>
                                        </div>
                                    </div>
                                    <br />
                                </div>
                            </a>
                            <br />
                        @else
                            <br />
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <i class="material-icons">new_releases</i>
                                    <h6>Helpers job application is currently not available. The helper might deleted his/her job application request.</h6>
                                    <a href="{{asset('/employer/remove/request/'. $a->id)}}"> <strong class="tab2">Remove</strong></a>
                                </div>
                            </div>
                            <br />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row"><h6>Job request is empty.</h6></div>
            <div class="row">
                <div class="col s12 m12 10">
                    <div class="card-panel">
                        <div class="valign-wrapper">
                            <i class="material-icons">new_releases</i>
                            <strong>Your don't have any job request for a moment. <a href="{{ asset('/helpers') }}">Browse for helpers now.</a> </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop

@section('js')

@stop