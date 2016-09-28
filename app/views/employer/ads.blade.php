
@extends('employer.layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l6 valign-wrapper">
            <h4 class="black-text">Your job ads</h4>
            <a class="btn green tab3" href="{{ asset('/employer/ad/helper/type') }}">Create new ad</a>
        </div>
    </div>
    @if(isset($ads) and count($ads) >0)
        <div class="row">
            <div class="col s12 m12 l10">
                @foreach($ads as $ad)
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
                                <br />
                                <span>Experience :</span>
                                <?php $exp = array('Less than one year', 'One year', 'Two years', 'Three years above'); ?>
                                <strong class="tab1">{{ $exp[$ad->yearexp] }}</strong>
                                <br />
                                <span>Education level :</span>
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                <strong class="tab1"> {{ $edlevel[$ad->edlevel] }}</strong>
                                <br />
                                <span>Salary :</span>
                                <strong class="tab1"> {{ sprintf("%.2f" ,$ad->salaryid) }}</strong>
                                <br />
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
                            <div class="col s12 m12 l2">
                                <div class="row">
                                    <a href="{{ asset('/employer/ad/edit/'. $ad->adid) }}"><span>Edit ad</span></a>
                                    <br />
                                    <a  href="{{ asset('/employer/ad/delete/'. $ad->adid) }}"><span>Remove ad</span></a>
                                </div>
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
    @endif
@stop

@section('js')

@stop

@section('css')
    @parent
    <style>
        table tr td {
            padding: 1px;
        }
        ul.pagination li {
            font-size: inherit;
        }
    </style>
@stop
