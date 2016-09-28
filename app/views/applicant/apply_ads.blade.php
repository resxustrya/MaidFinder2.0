

@extends('applicant.layout')

@section('content')
    <div class="row">
        <span class="valign-wrapper">
            <h4>Job ads you applied</h4>
        </span>
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
            <div class="col s12 m12 l11">
                @if($apply_ad and count($apply_ad))
                    @foreach($apply_ad as $a)
                        <?php $ads = Ads::where('adid', '=',$a->adid)
                                        ->where('deleted_at', '=', NULL)
                                ->first();
                        ?>
                        @if($ads and count($ads))
                            <a href="{{ asset('employer/ad/profile/'.$ads->adid)  }}" class="hoverable waves-green black-text">
                                <div class="card-panel">
                                    <div class="row">
                                        <div class="valign-wrapper">
                                            <?php $job = JobTypes::find($ads->jobtypeid); ?>
                                            <h5>Position :<span class="tab1">{{ $job->description }}</span> </h5>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <strong style="font-size: 1.2em;">Job description :</strong>
                                        <br />
                                        <span class="">{{ $ads->pitch }}</span>
                                    </div>
                                    <br />
                                    <div class="divider"></div>
                                    <br />
                                    <div class="row">
                                        <div class="col s12 m12 l6">
                                       <span class="valign-wrapper">
                                           <i class="material-icons">location_on</i>
                                           <span>Preffred location :</span>
                                           <?php $loc = Regions::find($ads->regionid); ?>
                                           <strong class="tab2">{{ $loc->location }}</strong>
                                       </span>
                                        <span class="valign-wrapper">
                                           <i class="material-icons">label</i>
                                           <span>Capacity :</span>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <strong class="tab2">{{ $capacity[$ads->capacity] }}</strong>
                                       </span>
                                       <span class="valign-wrapper">
                                           <i class="material-icons">label</i>
                                           <span>Salary :</span>
                                           <strong class="tab2">{{ $ads->salaryid }} - Pesos</strong>
                                       </span>
                                       <span class="valign-wrapper">
                                           <i class="material-icons">label</i>
                                           <span>Startdate :</span>
                                           <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                           <?php $startdate = explode('-', $ads->startdate); ?>
                                           <strong class="tab2">{{  $month[$startdate[1]].'/' . $startdate[2] .'/' . $startdate[0] }}</strong>
                                       </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @else
                    <div class="card-panel">
                        <div class="valign-wrapper">
                            <i class="material-icons">new_releases</i>
                            <strong class="tab1">You currently don't applied to any job ads. Go to <a href="{{ asset('/employer/job/ads') }}">employer ads</a> </strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('js')

@stop