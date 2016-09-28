


@extends('applicant.layout')

@section('content')
    <div class="row">
        <h4>Employer job request</h4>
    </div>
    @if(isset($hirelist) and count($hirelist) > 0)
        <div class="container-fluid">
            <div class="row" style="margin-top: 10px;">
                <div class="col s12 m12 l11">
                    @foreach($hirelist as $hire)
                        <?php $emp = Employers::find($hire->empid); ?>
                        <?php $ads = Ads::where('empid', '=', $emp->empid)->first(); ?>
                        @if(isset($ads) and count($ads) > 0)
                            <div class="card-panel">
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <i class="material-icons">person_pin</i>
                                        <h5><span class="tab1">{{ $emp->fname ." ". $emp->lname }}</span> </h5>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <i class="material-icons">work</i>
                                        <?php $jobtype = JobTypes::find($ads->jobtypeid); ?>
                                        <strong class="tab1">Position : </strong>
                                        <strong class="tab2"> {{ $jobtype->description }}</strong>
                                    </div>
                                    <div class="valign-wrapper">
                                        <i class="material-icons">assignment</i>
                                        <strong class="tab1">Job description :</strong>
                                        <strong class="tab1">{{ $ads->pitch }}</strong>
                                    </div>
                                </div>
                                <br />
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                       <span class="valign-wrapper">
                                           <i class="material-icons">location_on</i>
                                           <span class="tab1">Preffred location :</span>
                                           <?php $loc = Regions::find($ads->regionid);?>
                                           <strong class="tab1"> {{ $loc->location }} </strong>
                                       </span>
                                       <span class="valign-wrapper">
                                           <i class="material-icons">phone</i>
                                           <strong class="tab1">Mobile no. :</strong>
                                           <strong class="tab1">{{ $emp->contactno }}</strong>
                                       </span>
                                        <span class="valign-wrapper">
                                           <i class="material-icons">label</i>
                                           <span class="tab1">Capacity :</span>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <strong class="tab2">{{ $capacity[$ads->capacity] }}</strong>
                                       </span>
                                       <span class="valign-wrapper">
                                           <i class="material-icons">label</i>
                                           <span class="tab1">Preffered salary :</span>
                                           <?php $salary = Salaries::find($ads->salaryid);?>
                                           <strong class="tab1">{{ $salary->amount_range }} - pesos</strong>
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
                                            <?php
                                                $duties = Duties::where('adid', '=', $ads->adid)->first();
                                            ?>
                                            @if(isset($duties) and count($duties) > 0)
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

                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="row">
                                            <strong style="font-size: 1.2em;">Employer's message</strong>
                                        </div>
                                        <div class="row">
                                            <blockquote class="flow-text">
                                                {{ $hire->message }}
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <br />
                                @if($hire->status == 1)
                                    <div class="row">
                                        @if($hire->accepted == 1)
                                            <div class="col s12 m12 l12">
                                                <span class="valign-wrapper center">
                                                    <i class="material-icons">thumb_up</i>
                                                    <strong class="tab1">Job request accepted</strong>
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="valign-wrapper">
                                            @if($hire->accepted == 0)
                                                <a class="btn green" href="{{ asset('/applicant/accept/request/'.$hire->id) }}">Accept request</a>
                                            @else
                                                <a class="btn green" href="{{ asset('/applicant/cancel/request/'.$hire->id) }}">Cancel hire</a>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="card-panel">
                                            <div class="valign-wrapper">
                                                <i class="material-icons">error_outline</i>
                                                <strong class="tab1">Sorry but the employer currently cancel this job ad request.</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <br />
                         @else
                            <div class="row">
                                <div class="card-panel">
                                    <div class="valign-wrapper">
                                        <i class="material-icons">error_outline</i>
                                        <strong class="tab1">Sorry but the employer ad is currently not available</strong>
                                    </div>
                                </div>
                            </div>
                         @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <ul class="pagination">
                    <?php echo $hirelist->links(); ?>
                </ul>
            </div>
        </div>
    @else
        <div class="row">
            <h6>Job request is empty</h6>
        </div>
        <div class="card-panel">
            <div class="valign-wrapper">
                <i class="material-icons">new_releases</i>
                <strong class="tab1">You currently don't have an employers job request. </strong>
            </div>
        </div>
    @endif
@stop

@section('js')

@stop

@section('css')

@stop