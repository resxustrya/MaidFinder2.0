@extends('applicant.layout')

@section('content')

    <div class="row">
        <span class="valign-wrapper">
            <h4>Your profile</h4>
            <a class="tab2 btn green" href="{{ asset('/applicant/profile/edit') }}">Edit Profile</a>
        </span>
    </div>
    <div class="tab2 container-fluid">
        <div class="row" style="margin-top: 10px;">
            <div class="col s12 m12 l10">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <div class="row">
                                <div class="left-align">
                                    <img class="profile-pic circle image responsive-img" src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                            </div>
                            <div class="row center">
                                <a class="btn green" id="change_pic"><i class="material-icons">radio</i></a>
                            </div>
                        </div>
                        <div class="col s12 m12 l9">
                            <h5>Basic information</h5>
                            <div class="divider"></div><br />
                            <span class="valign-wrapper">
                                <i class="material-icons">perm_identity</i><span>Name :</span>
                                <strong class="tab1">{{ $app->fname ." ". $app->lname }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Location :</span>
                                <strong class="tab1">{{ $location->location }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Complete address :</span>
                                <strong class="tab1">{{ $app->address }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">group_work</i><span>Gender :</span>
                                <strong class="tab1"> {{ $app->gender }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">picture_in_picture</i><span>Birthday :</span>
                                <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                <?php $bdate = explode('-', $app->birth); ?>
                                <strong class="tab1">{{ $month[$bdate[1]].'/' . $bdate[2] .'/' . $bdate[0]  }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">label</i><span>Civil status :</span>
                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                <strong class="tab1"> {{ $status[$app->civilstatus] }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">polymer</i><span>Nationality :</span>
                                <?php $n = Nationalities::find($app->nationality); ?>
                                <strong class="tab1">{{ $n->nationality }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">toc</i><span>Religion :</span>
                                <?php $n = Religions::find($app->religion); ?>
                                <strong class="tab1">{{ $n->religion }}</strong>
                            </span>
                            <br />
                            <h5>Contact Information</h5>
                            <div class="divider"></div><br />
                            <span class="valign-wrapper">
                                <i class="material-icons">phone</i><span>Mobile phone :</span>
                                <strong class="tab1">{{ $app->contactno }}</strong>
                            </span>
                            <span class="valign-wrapper">
                                <i class="material-icons">email</i><span>Email :</span>
                                <strong class="tab1">{{ $app->email }}</strong>
                            </span>
                            <br />
                            <h5>NBI Credentials</h5>
                            <div class="divider"></div>
                            <br />
                            <div class="row">
                                <div class="col s12 ml6">
                                    @if($app->nbi == NULL)
                                        <div class="card-panel red accent-1">
                                            <strong class="white-text">
                                                For security and applicant credibelity, every account is required to upload NBI clearance image(original copy).
                                                <a href="#" class="black-text" id="nbi">Upload NBI</a>
                                            </strong>
                                        </div>
                                    @else
                                        <img src="{{ asset('/public/uploads/nbi/' . $app->nbi) }}" class="responsive-img img-container"/>
                                        <br />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="divider"></div>
@if($application != null and count($application) >0 )
    <?php
    $salary = Salaries::find($application->salaryid);
    $location = Regions::find($application->regionid);
    $jobtype = JobTypes::find($application->jobtypeid);
    $edlevel = array('Elementary', 'High School', 'College');
    $skills = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
    $duties = Duties::find($skills->dutyid);
    ?>
    <div class="row">
        <div class="col s12 m12 l10">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m12 l2">
                        {{ $application->created_at }}
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="row">
                            <h5 class="center-align">Basic job information</h5>
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
                                    <td>{{ $capacity[$application->capacity] }}</td>
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
                                    <td>{{ $edlevel[$application->edlevel] }}</td>
                                </tr>
                            </table>
                            <p>
                            <h6><strong>Job description</strong></h6>
                            {{ $application->pitch }}
                            </p>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h6><strong>Performed duties</strong></h6>
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
                        <div class="center-align">
                            <div class="row">
                                <a class="btn grey lighten-4 col s12 m12 l12" href="{{asset ('/applicant/job/application/edit/'. $application->applicationid)}}"><i class="material-icons black-text">mode_edit</i></a>
                            </div>
                            <div class="row">
                                <a class="btn grey lighten-4 black-text col s12 m12 l12" href="{{asset ('/applicant/job/application/delete/'. $application->applicationid)}}"><i class="material-icons">delete</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--MODAL -->
    <div id="modalnbi" class="modal ">
        <h5>NBI upload.</h5>
        <div class="row" style="margin-top: 10px;">
           <div class="col s12 m12 l12">
               <form action="{{ asset('applicant/nbi/upload') }}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="appid" value="{{ $app->appid }}" />
                   <div class="row">
                       <img src="{{ asset('public/images/NBI.png') }}" id="photo" class="responsive-img" />
                   </div>
                   <div class="row">
                       <div class="input-field col s12 m12 l12">
                           <input type="file" name="nbi" id="picture" onchange="readFile(this);"/>
                       </div>
                   </div>
                   <div class="row">
                       <input type="submit" name="submit" value="Upload photo" class="btn green col l12">
                   </div>
               </form>
           </div>
        </div>
    </div>
    <div id="profile" class="modal ">
        <h5 class="center-align">Change profile picture</h5>
        <div class="row" style="margin-top: 10px;">
            <div class="col s12 m12 l12">
                <form action="{{ asset('/applicant/update/picture') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="appid" value="{{ $app->appid }}" />
                    <div class="row center">
                        <img src="{{ asset('public/images/facebook.jpg') }}" id="photo" class="responsive-img in_img" style="width:400px;"/>
                    </div>
                    <div class="row center">
                        <div class="input-field col s12 m12 l12">
                            <input type="file" name="profilepic" id="picture" onchange="changePic(this);"/>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="Upload photo" class="btn green col l12">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@stop
@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('.reveal').hide();
            $('.photo').change(function() {
                $('.reveal').show();
            });
            $('#nbi').click(function(event){
                event.preventDefault();
                $('#modalnbi').width("500px");
                $('#modalnbi').openModal();
            });
            $('#change_pic').click(function(){
                $('#profile').openModal();
            });
        });
        function changePic(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.in_img').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@stop
@section('css')
    @parent
    <style>
        .name {
            font-size: 2em;
        }
        table tr td {
            padding: 0px;
        }
         .img-container {
             width: 200px;
             height: 300px;
         }
    </style>

@stop
