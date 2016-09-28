

@extends('ads.layout')
@section('title')
    <title>Employer ads</title>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row white" style="padding: 0px;">
                <div class="col l1"><span>&nbsp;</span></div>
                <div class="col s12 m12 l10">
                    <h4>MaidFinder Employer Ads</h4>
                    <p>To get the best search result, use our search filtering feature below that allows you to match a helper based on your job ad criteria. </p>
                </div>
                <div class="col s12 m12 l1">
                    <span>&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <br />
                <div class="card-panel">
                    <?php
                    $jobtypes = JobTypes::all();
                    $locations = Regions::all();
                    $salary = Salaries::all();
                    ?>
                    <h5>Search Criteria</h5>
                    <h5 class="divider"></h5>
                    <form action="{{ asset('/search/ads') }}" method="GET">
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <select name="location" class="browser-default">
                                    <option value="" selected>Preffered location</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l4">
                                <select name="jobtype" class="browser-default">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtypes as $job)
                                        <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l4">
                                <select name="capacity" class="browser-default">
                                    <option value="" selected>Capacity</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <p>
                                <input type="submit" class="btn blue col s12 m12 l12 center-align" name="search" value="Find your match" />
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <br />
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l1">&nbsp;</div>
            <div class="col s12 m12 l10">
                @if(isset($ads) and count($ads) > 0)
                    @foreach($ads as $ad)
                        <?php
                            $emp = Employers::find($ad->empid);
                        ?>
                        @if($emp->isVerified)
                            <br>
                            <a href="{{ asset('employer/ad/profile/'.$ad->adid)  }}" class="hoverable waves-green black-text">
                                <?php
                                $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
                                $edlevel = array("Elementary", "High School", "College graduate");
                                $jobtype = JobTypes::where('jobtypeid', '=', $ad->jobtypeid)->first();
                                $location = Regions::where('regionid', '=', $ad->regionid)->first();
                                ?>
                                <div class="card-panel">
                                    <div class="row">
                                        <div class="col s12 m12 l10">
                                            <span style="font-size: 1.2em;">{{ $emp->fname }} - {{ $jobtype->description }}</span>
                                            <br />
                                            <br />
                                            <div class="valign-wrapper">
                                                <span class="">Preferred location :</span>
                                                <strong class="col l10">{{ $location->location }}</strong>
                                            </div>
                                            <div class="valign=wrapper">
                                                <span class="">Employment type :</span>
                                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                                <strong class="tab1">{{ $capacity[$ad->capacity] }}</strong>
                                            </div>
                                            <div class="valign-wrapper">
                                                <span class="">Gender :</span>
                                                <?php $gender = array('Male', 'Female', 'Any'); ?>
                                                <strong class="col l10">{{ $gender[$ad->gender] }}</strong>
                                            </div>
                                            <br />
                                            <div class="valign-wrapper">
                                                 <span>Experience :</span>
                                                <?php $exp = array('Less than one year', 'One year', 'Two years', 'Three years above'); ?>
                                                <strong class="col l10">{{ $exp[$ad->yearexp] }}</strong>
                                            </div>
                                                <span>Education level :</span>
                                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                                <strong class="tab2"> {{ $edlevel[$ad->edlevel] }}</strong>
                                            <br />
                                            <div class="valign-wrapper">
                                                <span>Salary :</span>
                                                <strong class="col l10"> {{ sprintf("%.2f" ,$ad->salaryid) }}</strong>
                                            </div>
                                            <br />
                                            <?php
                                            $date = explode("-" ,$ad->startdate);
                                            $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                            ?>
                                            <span>Start date :</span>
                                            <strong class="tab2">{{ $months[$date[1]] ."/" . $date[2] ."/" .$date[0] }} </strong>
                                            <br />
                                            <br />
                                            <div class="valign-wrapper">
                                                <strong style="font-size: 1.3em;">Job ad desciption : </strong>
                                                <span class="tab2"> {{ $ad->pitch }}</span>
                                            </div>
                                            <br />
                                            <strong style="font-size: 1.3em;">Expected duties :</strong>
                                            <ul>
                                                <?php $duty = ExpDuties::where('adid' , '=', $ad->adid)->get(); ?>
                                                @if(isset($duty) and count($duty) > 0)
                                                    @foreach($duty as $d)
                                                        <li class="valign-wrapper">
                                                            <i class="material-icons">label</i>
                                                            <?php $a = Duties::find($d->duties); ?>
                                                            <span class="tab1"> {{ $a->description }}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @else
                    <div class="row">
                        <h3>No results found.</h3>
                    </div>
                @endif
            </div>
            <div class="col s12 m12 l1">
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="pagination">
            <?php echo $ads->links(); ?>
        </ul>
    </div>

@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/ads.css') }}" />
@stop
@section('js')
@stop
