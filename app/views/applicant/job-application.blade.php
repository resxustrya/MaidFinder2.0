
@extends('applicant.layout')

@section('content')

    <div class="row">
        <div class="row valign-wrapper">
            <h4>Your job application</h4>
            <a class="add_new btn green tab3" href="{{ asset('/applicant/create/application') }}">
                <b>Create new</b>
            </a>
        </div>
    </div>
    @if($application and count($application) > 0)
        <div class="row">
           <div class="col s12 m12 l10">
               @foreach($application as $a)

                   <?php
                   $salary = Salaries::find($a->salaryid);
                   $location = Regions::find($a->regionid);
                   $jobtype = JobTypes::find($a->jobtypeid);
                   $edlevel = array('Elementary', 'High School', 'College');
                   $skills = ApplicantSkills::where('applicationid', '=', $a->applicationid)->first();
                   $duties = Duties::find($skills->dutyid);
                   ?>
                       <div class="row card-panel">
                           <div class="col s12 m12 l2">
                               <span>Create at : {{ $a->created_at }}</span>
                           </div>
                           <div class="col s12 m12 l8">
                               <div class="row">
                                   <div class="valign-wrapper">
                                       <strong class="material-icons">work</strong>
                                       <strong class="tab1">Job application preferences</strong>
                                   </div>
                                   <table>
                                       <tr>
                                           <td>Job Title : </td>
                                           <td><strong style="text-decoration: underline">{{ $jobtype->description }}</strong></td>
                                       </tr>
                                       <tr>
                                           <td>Contact :</td>
                                           <td>{{ $app->contactno }}</td>
                                       </tr>
                                       <tr>
                                           <?php $capacity = array('Full Time', 'Part Time'); ?>
                                           <td>Capacity : </td>
                                           <td>{{ $capacity[$a->capacity] }}</td>
                                       </tr>
                                       <tr>
                                           <td>Exptected salary :</td>
                                           <td>{{ $salary->amount_range }} (pesos)</td>
                                       </tr>
                                       <tr>
                                           <td>Helper gender :</td>
                                           <td>{{ $app->gender }}</td>
                                       </tr>
                                       <tr>
                                           <td>Education level :</td>
                                           <td>{{ $edlevel[$a->edlevel] }}</td>
                                       </tr>
                                   </table>
                               </div>
                               <div class="divider"></div>
                               <div class="row">
                                   <strong class="material-icons">description</strong> <strong>Job application description</strong>
                                   <p><strong class="tab3">{{ isset($a->pitch) ? nl2br($a->pitch) : '' }}</strong></p>
                               </div>
                               <div class="divider"></div>

                               <div class="row">
                                   <div class="col s12 m12 l12">
                                       <h6><strong>Perfurmed duties</strong></h6>
                                       @if(isset($duties))
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
                           <div class="col s12 m12 l2">
                               <div class="center-al ign">
                                   <div class="row">
                                       <a class="btn light-blue darken-3 waves-effect col s12 m12 l12 white-text" href="{{asset ('/applicant/job/application/edit/'. $a->applicationid)}}">Edit job</a>
                                   </div>
                                   <br />
                                   <div class="row">
                                       <a class="btn light-blue darken-3 waves-effect col s12 m12 l12 white-text" href="{{asset ('/applicant/job/application/delete/'. $a->applicationid)}}">Delete job</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">

                       </div>
               @endforeach
           </div>
        </div>
    @else
        <div class="row" style="margin-top:20px;">
            <div class="col s12 m12 l11">
                <div class="card-panel" style="padding:10px;">
                    <?php $ad_count = Ads::all()->count(); ?>
                    <h5 class="center-align">Over {{ $ad_count }} job ads are now available</h5>
                    <h6 class="center-align">Create and post your job availavibility now and find your match employer that matches your job preference.</h6>
                    <div class="center-align">
                        <a class="btn blue" href="{{ asset('/applicant/create/application') }}">Create Job</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop


@section('css')


@stop

@section('js')


@stop
