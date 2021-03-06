

@extends('applicant.layout')
@section('css')

@stop

@section('content')
    @if(isset($application) and count($application) > 0)
        <div class="row">
            <h4>Current job application</h4>
            <strong>Latest job application</strong>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 animated bounceInDown">
                @foreach($application as $a)
                    @if(isset($a))
                        <div class="card-panel">
                            <?php $jobtype = JobTypes::where('jobtypeid', '=', $a->jobtypeid)->first(); ?>
                            <div class="valign-wrapper">
                                <i class="material-icons">work</i>
                                <span class="tab1" style="font-size: 1.2em;">Applying for :</span>
                                <strong class="col l9">{{ $jobtype->description }}</strong>
                            </div>
                            <div class="divider"></div>
                            <div class="valign-wrapper">
                                <i class="material-icons">location_on</i>
                                <span class="tab1">Prefered location : </span>
                                <?php $loc = Regions::where('regionid', '=', $a->regionid)->first(); ?>
                                <strong class="col l9"> {{ $loc->location }}</strong>
                            </div>
                            <div class="valign-wrapper">
                                <i class="material-icons">view_stream</i>
                                <span class="tab1">Status :</span>
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <strong class="col l9">{{ $capacity[$a->capacity] }}</strong>
                            </div>
                            <div class="valign-wrapper">
                                <i class="material-icons">loyalty</i>
                                <span class="tab1">Preferred Salary :</span>
                                <strong class="col l9">{{ $a->salaryid }}</strong>
                            </div>
                            <div class="valign-wrapper">
                                <i class="material-icons">offline_pin</i>
                                <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday'); ?>
                                <span class="tab1">Preferred day/s off :</span>
                                <?php
                                $dayoffs = explode(',', $a->dayof);
                                ?>
                                <strong class="col l9">
                                    @foreach($dayoffs as $off)
                                        <span>{{ "," .$days[$off]}} </span>
                                        @endforeach
                                        </ul>

                                </strong>
                            </div>
                            <div class="divider">
                            </div>
                            <br />
                            <div class="row">
                                <strong>Job description</strong>
                                <br />
                                <p>
                                    {{ nl2br($a->pitch) }}
                                </p>
                            </div>
                            <div class="divider">
                            </div>
                            <br />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <ul class="pagination">
                <?php echo $application->links(); ?>
            </ul>
        </div>
    @else
        <div class="row" style="margin-top:20px;">
            <div class="col s12 m12 l12">
                <div class="card-panel" style="padding:10px;">
                    <?php $ad_count = Ads::all()->count(); ?>
                    <h5 class="center-align">Over {{ $ad_count }} job ads are now available</h5>
                    <h6 class="center-align">Create and post your job availavibility now and find your match employer that matches your job preference.</h6>
                    <div class="center-align">
                        <a class="btn blue" href="{{ asset('/applicant/job/type/') }}">Create job availability</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="divider"></div>
    </div>
    <div class="row">
        <h5>Auto suggested job ads</h5>
    </div>
    <div class="container-fluid">
        <div class="row animated bounceIn">
            <?php
            if(isset($application) and count($application) >0) {

            }else {
                $ads = Ads::orderBy('created_at', 'DESC')->paginate(5);
                $ad_match = count($ads);
            }
            ?>
            @if(isset($ads) and count($ads) > 0)
                <div class="col s12 m12 l12">
                    @foreach($ads as $ad)
                        <br>
                        <?php
                        $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
                        $edlevel = array("Elementary", "High School", "College graduate");
                        $jobtype = JobTypes::where('jobtypeid', '=', $ad->jobtypeid)->first();
                        $location = Regions::where('regionid', '=', $ad->regionid)->first();
                        ?>
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12 m12 l10">
                                    <span style="font-size: 1.2em;">Your ideal helper - {{ $jobtype->description }}</span>
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
                                    <div class="valign-wrapper">
                                        <span>Education level :</span>
                                        <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                        <strong class="col l10"> {{ $edlevel[$ad->edlevel] }}</strong>
                                    </div>
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
                                    <strong class="tab1">{{ $months[$date[1]] ."/" . $date[2] ."/" .$date[0] }} </strong>
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
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row center-align">
            <ul class="pagination">
                <?php echo $ads->links(); ?>
            </ul>
        </div>
    </div>
@stop

@section('js')

@stop