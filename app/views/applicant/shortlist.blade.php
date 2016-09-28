
@extends('applicant.layout')

@section('content')
    <div class="row">
        <h4>Your ad shortlist</h4>
    </div>
    @if(isset($shortlist) and count($shortlist) > 0)
        <div class="row">
            @foreach($shortlist as $list)
                <?php $ad = Ads::where('empid', '=', $list->empid)->first(); ?>
                @if(isset($ad) and count($ad) > 0)
                    <?php $emp = Employers::find($ad->adid); ?>
                    <a href="{{ asset('employer/ad/profile/'.$ad->adid)  }}" class="hoverable waves-green black-text">
                        <div class="col s12 m12 l11" style="margin-top: 20px;">
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <?php $job = JobTypes::find($ad->jobtypeid); ?>
                                    <h5>Position :<span class="tab1">{{ $job->description }}</span> </h5>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <strong style="font-size: 1.2em;">Job description :</strong>
                                    <br />
                                    <span class="">{{ $ad->pitch }}</span>
                                </div>
                                <br />
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l6">

                               <span class="valign-wrapper">
                                   <i class="material-icons">location_on</i>
                                   <span>Preffred location :</span>
                                   <?php $loc = Regions::find($ad->regionid); ?>
                                   <strong class="tab2">{{ $loc->location }}</strong>
                               </span>
                                <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Capacity :</span>
                                    <?php $capacity = array('Full Time', 'Part Time'); ?>
                                    <strong class="tab2">{{ $capacity[$ad->capacity] }}</strong>
                               </span>
                               <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Salary :</span>
                                   <?php $salary = Salaries::find($ad->salaryid); ?>
                                   <strong class="tab2">{{ $salary->amount_range }} - Pesos</strong>
                               </span>
                               <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Startdate :</span>
                                   <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                   <?php $startdate = explode('-', $ad->startdate); ?>
                                   <strong class="tab2">{{  $month[$startdate[1]].'/' . $startdate[2] .'/' . $startdate[0] }}</strong>
                               </span>
                                    </div>
                                </div>
                                <br />
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="row">
                                            <strong style="font-size: 1.2em;">Expected duties</strong>
                                        </div>
                                        <div class="row">
                                            <?php $duties = Duties::where('adid', '=', $ad->adid)->first(); ?>
                                            @if($duties and count($duties) > 0)
                                                @if($duties->cooking != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cooking }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->laundry != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->laundry }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->gardening != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->gardening }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->grocery != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->grocery }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->cleaning != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cleaning }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->tuturing != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->tuturing }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->driving != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->driving }}</strong>
                                                    </div>
                                                @endif
                                                @if($duties->pet != null)
                                                    <div class="col s12 m12 l4">
                                                        <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->pet }}</strong>
                                                    </div>
                                                @endif
                                                <p>
                                                    {{ $duties->other }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <span>Date posted - </span>
                                        <?php
                                        $date = date('Y-m-d',strtotime($ad->created_at));
                                        $date = explode("-" ,$date);

                                        $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                        $month = str_replace('0', '', $date[1]);
                                        $month = $months[$month];
                                        $year = $date[0];
                                        $day = $date[2];
                                        ?>
                                        <strong class="tab1">{{ $month ."-" . $day ."-" .$year }}</strong>
                                    </div>
                                    <br />
                                    <div class="row">

                                        <a href="{{ asset('/applicant/shortlist/remove/'.$list->listid) }}" class="btn green">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @else
                    <div class="row">
                        <div class="col s12 m12 l10">
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <i class="material-icons">info</i>
                                    <strong class="tab1">Sorry but the job is currently not available. The employer might removed the ad.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <ul class="pagination">
                <?php echo $shortlist->links() ;?>
            </ul>
        </div>
    @else
        <h6>Your shorlist is empty.</h6>
    @endif
@stop

@section('css')

@stop

@section('js')

@stop