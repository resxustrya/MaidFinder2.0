

@extends('employer.layout')
@section('css')

@stop

@section('content')
    <div class="row">
        <h4>Applicant job request</h4>
    </div>
    @if($apply_ad != null and count($apply_ad) > 0)
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12 l12">
                    @foreach($apply_ad as $a)
                        <?php $application = Applications::where('appid', '=', $a->appid)->first(); ?>
                        <?php $applicant = Applicants::find($application->appid); ?>
                        @if(isset($application) and count($application) > 0)
                                <div class="card-panel">
                                    <div class="row">
                                       <div class="col s12 m12 l3">
                                           <img id="editpicture" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($applicant['profilepic']) != null ? $applicant['profilepic'] :'facebook.jpg' )) }}" />
                                       </div>
                                       <div class="col s12 m12 l9">
                                           <div class="row">
                                               <h5>Applicant message.</h5>
                                               <blockquote class="flow-text" style="font-size: 1em;">
                                                   {{ $a->message }}
                                               </blockquote>
                                           </div>
                                           <div class="row">
                                               <h5>About</h5>
                                           </div>
                                           <div class="row">
                                               <div class="col s12 m12 l5">
                                                   <table>
                                                       <tr>
                                                           <td>Name: </td>
                                                           <td> {{ $applicant->fname }}</td>
                                                       </tr>
                                                       <tr>
                                                           <td>Address :</td>
                                                           <td>{{ $applicant->address }}</td>
                                                       </tr>
                                                       <tr>
                                                           <td>Age :</td>
                                                           <?php
                                                               $date = explode('-', $applicant->birth);
                                                           ?>
                                                           <td>{{ date('Y') - $date[0] }}</td>
                                                       </tr>
                                                       <tr>
                                                           <td>Gender :</td>
                                                           <td>{{ $applicant->gender }}</td>
                                                       </tr>
                                                       <tr>
                                                           <td>Nationality :</td>
                                                           <?php $n = Nationalities::where('id', '=', $applicant->nationality)->first(); ?>
                                                           <td>{{ $n->nationality }}</td>
                                                       </tr>
                                                       <tr>
                                                           <td>Religion :</td>
                                                           <?php $r = Religions::where('id', '=', $applicant->religion)->first(); ?>
                                                           <td>{{ $r->religion }}</td>
                                                       </tr>
                                                   </table>
                                               </div>
                                           </div>
                                           @if($emp->subscribe == 1)
                                               <div class="row">
                                                   <h5>Contact</h5>
                                               </div>
                                               <div class="row">
                                                    <table>
                                                        <tr>
                                                            <td>Full name:</td>
                                                            <td>{{ $applicant->fname . $applicant->lname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email :</td>
                                                            <td>{{ $applicant->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone no #:</td>
                                                            <td>{{ $applicant->contactno }}</td>
                                                        </tr>
                                                    </table>
                                               </div>
                                           @else
                                                <div class="row">
                                                    <div class="card-panel">
                                                        <span>You will need to <a href="{{ asset('/subscription') }}">subscribe</a> to a membership in order to contact applicants.</span>
                                                    </div>
                                                </div>
                                           @endif
                                           <?php $ab = Applications::where('appid', '=', $applicant->appid)->first(); ?>
                                           @if(isset($ab) and count($ab) > 0)
                                               <div class="row">
                                                   <h5>Applicant job preferrence</h5>
                                               </div>
                                               <div class="row">
                                                   <div class="col s12 m12 l5">
                                                       <table>
                                                           <tr>
                                                               <td>Applying for : </td>
                                                               <?php $jobtype = JobTypes::find($ab->jobtypeid); ?>
                                                               <td>{{ $jobtype->description }}</td>
                                                           </tr>
                                                           <tr>
                                                               <td>Preferred salary:</td>
                                                               <td>{{ $ab->salaryid }}</td>
                                                           </tr>
                                                           <tr>
                                                               <td>Employment :</td>
                                                               <?php $capacity = array('Full Time', 'Part Time'); ?>
                                                               <td>{{ $capacity[$ab->capacity] }}</td>
                                                           </tr>
                                                           <tr>
                                                               <td>Year experience</td>
                                                               <?php $exp = array('Less than one year', 'One year', 'Two years', 'Three years above'); ?>
                                                               <td>{{ $exp[$ab->yearexp] }}</td>
                                                           </tr>
                                                           <tr>
                                                               <td>Education level</td>
                                                               <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                                               <td>{{ $edlevel[$ab->edlevel] }}</td>
                                                           </tr>
                                                       </table>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <strong>Performed duties</strong>
                                               </div>
                                               <div class="row">
                                                   <?php $duties = AppDuties::where('applicationid' ,'=', $application->applicationid)->get(); ?>
                                                   @if(isset($duties) and count($duties) > 0)
                                                       <ul>
                                                           @foreach($duties as $duty)
                                                               <li>
                                                                   <?php $d = Duties::find($duty->duties); ?>
                                                                   <i class="material-icons">done_all</i>
                                                                   <strong>{{ $d->description }}</strong>
                                                               </li>
                                                           @endforeach
                                                       </ul>
                                                   @endif
                                               </div>
                                           @endif
                                       </div>
                                    </div>
                                    <br />
                                    <div class="row center">
                                        @if($emp->subscribe == 1)
                                            <a class="btn btn-large blue" href="{{ asset('/employer/hire/applicant/'.$applicant->appid) }}">Hire applicant</a>
                                        @endif
                                    </div>
                                </div>
                            <br />
                        @else
                            <br />
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <i class="material-icons">new_releases</i>
                                    <h6>Helpers job application is currently not available. The helper might deleted his/her job application request.</h6>
                                    <a href="{{asset('/employer/remove/request/'. $a->id)}}"> <strong class="tab2">Remove</strong></a>
                                </div>
                            </div>
                            <br />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row"><h6>Job request is empty.</h6></div>
            <div class="row">
                <div class="col s12 m12 10">
                    <div class="card-panel">
                        <div class="valign-wrapper">
                            <i class="material-icons">new_releases</i>
                            <strong>Your don't have any job request for a moment. <a href="{{ asset('/helpers') }}">Browse for helpers now.</a> </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop

@section('js')

@stop