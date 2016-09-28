

@extends('employer.layout')

@section('content')
    <div class="row">
        <h4>Your shortlist</h4>
    </div>
    @if($shortlist and count($shortlist) > 0)
        <div class="row">
            <div class="col s12 m12 l10">
                @foreach($shortlist as $list)
                    <?php $applicant = Applicants::find($list->appid); ?>
                    <?php $application = Applications::where('appid','=', $applicant->appid)->first(); ?>
                    @if(isset($application) and count($application) > 0 )
                        <a class="black-text" target="_blank" href="{{ asset('/application/view/'.$application->applicationid) }}">
                            <div class="card-panel">
                                <div class="row">
                                    <h5>{{ $applicant->fname  }}{{ $applicant->isHiring }}</h5>
                                    <div class="divider"></div>
                                    <?php $jobtype = JobTypes::find($application->jobtypeid); ?>
                                    <span>Contract situation :</span><strong class="tab2">{{ ($applicant->isHiring == NULL) ? 'Available' : 'Already hired'  }}</strong>
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
                                    <a class="btn green" href="{{ asset('/employer/shortlist/remove/'.$list->listid )}}">Remove</a>
                                </div>
                            </div>
                        </a>
                        <br />
                    @else
                        <div class="card-panel">
                            <div class="valign-wrapper">
                                <i class="material-icons">new_releases</i>
                                <span class="tab2">{{ $applicant->fname  }} job application is currently not available.</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <div class="row">
            <h6>Your shorlist is empty.</h6>
        </div>
        <div class="row">
            <div class="col s12 m12 l0">
                <div class="card-panel white" style="padding:10px;">
                    <h6 class="black-text">Browse for helper profiles, add them to your shortlist if you like a helper profile. <a href="{{ asset('/helpers') }}">Helpers</a></h6>
                </div>
            </div>
        </div>
    @endif
@stop

@section('css')

@stop

@section('js')

@stop

