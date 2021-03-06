@extends('helpers.layout')
@section('title')
    <title>Job Seekers</title>
@stop
@section('content')
    <?php
        $locations = Regions::all();
        $jobtypes =JobTypes::all();
        $salary = Salaries::all();
    ?>
    <div class="">
        <div class="row white" style="padding: 0px;">
            <div class="col l1"><span>&nbsp;</span></div>
            <div class="col s12 m12 l10">
                <h4>Job Applicant profiles</h4>
                <p>To get the best search result, use our search filtering feature below that allows you to match a helper based on your job ad criteria. </p>
            </div>
            <div class="col s12 m12 l1">
                <span>&nbsp;</span>
            </div>
        </div>
    </div>
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l3">
                <div class="card-panel">
                    <strong style="font-size: 1.2em;">Search criteria</strong>
                    <form action="{{ asset('/search/profiles') }}" method="GET">
                        <div class="row">
                            <select name="jobtypeid" class="icons">
                                <option value="" selected>Position</option>
                                @foreach($jobtypes as $job)
                                    <option  value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br />
                        <div class="row">
                            <select name="location" class="icons">
                                <option value="" selected>Preffered location</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br />
                        <div class="row">
                            <select name="salaryid" class="icons">
                                <option value="" selected>Salary (pesos)</option>
                                @foreach($salary as $sal)
                                    <option value="{{ $sal->salaryid }}">{{ $sal->amount_range }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br />
                        <div class="row">
                            <select name="capacity" class="icons">
                                <option value="" disabled selected>Status</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="row">
                                    <p>
                                        <input type="submit" class="btn-large green col s12 m12 l12 center-align" name="search" value="Find your match" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m12 l8">

                <?php $count = 1; ?>
                @if(isset($application) and count($application) > 0)
                    <?php foreach($application as $app) : ?>
                    <?php
                    $location = Regions::find($app->regionid);
                    $applicant = Applicants::find($app->appid);
                    $jobtype = JobTypes::find($app->jobtypeid);
                    ?>
                    @if($applicant->isVerified and $applicant->ishiring == 0)
                        <div class="col s12 m6 l6 tab1 hoverable" style="margin-top: 10px;">
                            <a target="_blank" href="{{ asset('application/view/'. $app->applicationid) }}" class="grey-text">
                                <div class="card-panel" style="padding: 3px;">
                                    <div class="row">
                                        <div class="profile-img col s12 m12 l4">
                                            <div class="center-align" style="padding-top: 10px;">
                                                <img class="image circle" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l1 hide-on-med-and-down">
                                            <p>&nbsp;</p>
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <p>
                                            <table class="black-text info">
                                                <tr>
                                                    <td><i class="material-icons">perm_identity</i></td>
                                                    <td><span class="name">{{ $applicant->fname }}</span> </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="material-icons">room</i> </td>
                                                    <td>{{ $location->location }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="material-icons">work</i> </td>
                                                    <td>{{ $jobtype->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <?php

                                                    $id = $applicant->appid;

                                                    $rating = DB::table('app_rating')->where('appid', '=', $id)->sum('partialrating');
                                                    $countEmp =  DB::table('app_rating')->where('appid', '=', $id)->count('empid');

                                                    ?>
                                                    <script>
                                                        var a = {{ $rating  }};
                                                        var b = {{ $countEmp }};
                                                        var res = a / b;
                                                    </script>
                                                    <td><strong>

                                                            <script>
                                                                if(isNaN(res))
                                                                    document.write('');
                                                                else {
                                                                    for(var i = 1; i < Math.round(res); i++) {
                                                                        document.write('<i class="tiny material-icons">star</i>');
                                                                    }
                                                                }
                                                                if(!isNaN(res)) {
                                                                    document.write('<span class="tab1">' + res + '</span>');
                                                                }
                                                            </script>
                                                        </strong></td>
                                                </tr>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col s12 m12 l5">
                                            <p>
                                                <a href="{{ asset('application/view/'. $app->applicationid) }}">View helper profile</a>
                                            </p>
                                        </div>
                                        <div class="col s12 m12 l6 right">
                                    <span style="font-size: 0.8em;">
                                         Posted :
                                        <?php
                                        $date = date('Y-m-d',strtotime($app->created_at));
                                        $date = explode("-" ,$date);

                                        $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                        $month = str_replace('0', '', $date[1]);
                                        $month = $months[$month];
                                        $year = $date[0];
                                        $day = $date[2];
                                        ?>
                                        <span>{{ $month ."-" . $day ."-" .$year }}</span>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    <div id="modal{{$count}}" class="modal modal-fixed-footer fade ql-modal" role="dialog">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 m12 l4">
                                    <div class="card-panel">
                                        <div class="row">
                                            <img class="img-fluid square employer-image col s12 m12 l12" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                                        </div>
                                        <table class="info">
                                            <tr>
                                                <td><i class="material-icons">perm_identity</i></td>
                                                <td><span class="name">{{ $applicant->fname ." ". $applicant->lname }}</span> </td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">room</i> </td>
                                                <td>{{ $location->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">work</i> </td>
                                                <td>{{ $jobtype->description }}</td>
                                            </tr>
                                        </table>
                                        <p>
                                            {{ $applicant->pitch }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col s12 m12 l8">
                                    <div class="row">
                                        <div class="col s12 m12 l12 orange lighten-1 card-panel">
                                            <p class="white-text">
                                                You must subscribe to our membership plan so you can view helper profiles and job application.
                                            </p>
                                        </div>
                                        <div class="col s23 m23 l12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn green ">Ok</a>
                        </div>
                    </div>
                    <?php $count++ ?>
                    <?php endforeach; ?>
                @else
                    <div class="row">
                        <h5>No results found.</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if($application->count() < $application->getTotal())
                <ul class="pagination center-align">
                    {{ $application->links() }}
                </ul>
            @endif
        </div>
    </div>
@stop

@section('css')
    @parent
    <style>
        .profile-img {
            max-height: 150px;
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
        .modal {
            width: 100% !important;
            mex-height: 100% !important;
        }
    </style>
@stop
@section('js')
    @parent
    <script>
        $('.modal-trigger').leanModal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 100, // Transition in duration
            out_duration: 100, // Transition out duration
        });
    </script>
@stop
