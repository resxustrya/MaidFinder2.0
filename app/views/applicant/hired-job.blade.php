



@extends('applicant.layout')

@section('content')
    <div class="row">
        <h4>Employement history</h4>
    </div>
    @if(isset($hirelist) and count($hirelist) > 0)
        <div class="container-fluid">
            <div class="row" style="margin-top: 10px;">
                <div class="col s12 m12 l11">
                    @foreach($hirelist as $hire)
                        <?php $emp = Employers::find($hire->empid); ?>
                        <?php $ads = Ads::where('empid', '=', $emp->empid)->first(); ?>
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
                                       <strong class="tab1">{{ $ads->salaryid }} - pesos</strong>
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
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
        <div class="card-panel">
            <div class="valign-wrapper center">
                <i class="material-icons">new_releases</i>
                <strong class="tab1">You are not hired yet. <a href="{{ asset('/employer/job/ads')}}">Find jobs here.</strong>
            </div>
        </div>
    @endif
@stop

@section('js')

@stop

@section('css')

@stop