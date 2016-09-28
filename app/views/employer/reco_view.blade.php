
@extends('employer.layout')


@section('content')
    <div class="row">
        <h5>Recomendation</h5>
    </div>
    <div class="row">
        @if(isset($reco) and count($reco) > 0)
            @foreach($reco as $r)
                <?php $app = Applicants::where('appid', '=', $r->appid)->first(); ?>
                <?php $emp = Employers::where('empid', '=', $r->emp_recomend)->first(); ?>
                <div class="col s12 m6 l4 card-panel center" style="margin-top: 10px;padding:10px;">
                    <a target="_blank" href="{{ asset('/employer/recomend/profile/'.$app->appid) }}" class="black-text">
                        <div class="row">
                            <img class="image circle" src="{{ asset('public/uploads/profile/'.(($app->profilepic) != null ? $app->profilepic :'facebook.jpg' )) }}">
                        </div>
                        <div class="row">
                               <span class="valign-wrapper">
                                   <i class="material-icons">perm_identity</i>
                                   <strong class="tab1">{{ $app->fname ." ". $app->lname }}</strong>
                               </span>
                               <span class="valign-wrapper">
                               <i class="material-icons">work</i>
                                   <?php $application = Applications::where('appid', '=',$app->appid)->first();?>
                                   <?php
                                   $job = null;
                                   if(isset($application) and count($application) > 0) {
                                       $job = JobTypes::find($application->jobtypeid);
                                   }
                                   ?>

                                   <strong class="tab1">Looking for : {{ $job->description}}</strong>
                                </span>
                                 <span class="valign-wrapper">
                                   <i class="material-icons">person_pin</i>
                                   <strong class="tab1">Recomended by : {{ $emp->fname ." ". $emp->lname }}</strong>
                               </span>
                        </div>
                        <div class="row">
                            <a class="btn green" href="{{ asset('/employer/recomend/profile/'.$app->appid) }}">View profile</a>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <h5>Remendation is empty.</h5>
        @endif
    </div>

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