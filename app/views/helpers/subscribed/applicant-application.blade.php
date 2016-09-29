
<?php
    $available = true;
    $hirelist = HireLists::where('appid', '=', $applicant->appid)->first();
    if(isset($hirelist) and count($hirelist)> 0 and $hirelist->accepted == 1) {
        if($hirelist->empid != $emp->empid) {
            $available = false;
        }
    }
?>
@extends('helpers.subscribed.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header">
                    <li class="collection-item">
                        <h5 class="grey-text">Applicant profile</h5>
                        <div class="row">
                            <div class="col s12 m12 l2">
                                <div class="row">
                                    <img id="editpicture" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($applicant['profilepic']) != null ? $applicant['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                            </div>
                            <div class="col s12 m12 l3">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                            <td><span class="grey-text text-darken-4 name">{{ $applicant->fname}}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">location_on</i></span></td>
                                            <?php $location = Regions::find($applicant->regionid); ?>
                                            <td><span class="grey-text text-darken-4">{{ $location->location }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">supervisor_account</i> </span> </td>
                                            <td><span class="grey-text text-darken-4">{{ $applicant->gender }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                    
                            </div>
                            <div class="col s12 m12 l5">
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                        <table class="other_info">
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Age :</span> </td>
                                                <td><span class="grey-text text-darken-4">{{ 21}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Nationanlity :</span></td>
                                                <?php $n = Nationalities::find($applicant->nationality); ?>
                                                <td><span class="grey-text text-darken-4">{{ $n->nationality }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Religion :</span> </td>
                                                <?php $n = Religions::find($applicant->religion); ?>
                                                <td><span class="grey-text text-darken-4">{{ $n->religion }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Civil Status :</span> </td>
                                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                                <td><span class="grey-text text-darken-4">{{ $status[$applicant->civilstatus] }}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        @if($emp->subscribe == 1)
                            <div class="row">
                                <div class="col s12 m12 l3">
                                    <strong style="font-size: 1.2em;" class="grey-text">Contact information</strong>
                                </div>
                                <div class="col s12 m12 l8">
                                    <div class="col s12 m12 l3">
                                        <table>
                                            <tr>
                                                <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                                <td><span class="grey-text text-darken-4 name">{{ $applicant->fname ." ". $applicant->lname }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4"><i class="material-icons">email</i> </span> </td>
                                                <td><span class="grey-text text-darken-4">{{ $applicant->email }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4"><i class="material-icons">phone</i></span></td>
                                                <td><span class="grey-text text-darken-4">{{ $applicant->contactno }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4"><i class="material-icons">location_on</i> </span> </td>
                                                <td><span class="grey-text text-darken-4">{{ $applicant->address }}</span> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                        @else
                                    <h6 class="blue-grey-text center-align"><span>You will need to <a href="{{ asset('/subscription') }}">subscribe</a> to a membership plan in order to contact applicants.</span></h6>
                        @endif

                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l3 z-depth-0">
                                <div class="row">
                                    <strong style="font-size: 1.2em;" class="grey-text">Job application preferences</strong>
                                </div>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <span>Applying for a : </span>
                                        <?php $jobtype = JobTypes::where('jobtypeid', '=', $application->jobtypeid)->first(); ?>
                                        <strong class="tab1">{{ $jobtype->description }}</strong>
                                    </div>
                                    <br />
                                    <div class="valign-wrapper">
                                        <span>Preferred salary: </span>
                                        <strong class="tab1"> ₱ {{ sprintf("%.2f",$application->salaryid) }} PHP</strong>
                                    </div>
                                    <br />
                                    <div class="valign-wrapper">
                                        <span>Preferred job location :</span>
                                        <?php $location = Regions::find($application->regionid); ?>
                                        <strong class="tab1">{{ $location->location }}</strong>
                                    </div>
                                    <br />
                                    <div class="valign-wrapper">
                                        <span>Employment :</span>
                                        <?php $capacity = array('Full Time', 'Part Time'); ?>
                                        <strong class="tab1">{{ $capacity[$application->capacity] }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                                <strong style="font-size: 1.2em;" class="grey-text">About</strong>
                                <p>
                                    {{ nl2br($application->pitch) }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <h5 class="grey-text">Performed Duties</h5>
                        </div>
                        <div class="row">
                            <?php $duties = AppDuties::where('applicationid', '=', $application->applicationid)->get(); ?>
                            @if(isset($duties) and count($duties) > 0)
                                <ul>
                                    @foreach($duties as $duty)
                                        <?php $d = Duties::find($duty->duties); ?>
                                        <li class="valign-wrapper">
                                            <i class="material-icons">done_all</i>
                                            <strong class="tab1">{{ $d->description }}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                                <h5 class="grey-text">Previous employer feedback</h5>
                                <?php $rating = AppRatings::where('appid', '=', $applicant->appid)->get();?>
                                @if(isset($rating) and count($rating) > 0)
                                    @foreach($rating as $r)
                                        <blockquote class="valign-wrapper">
                                            <?php $employer = Employers::find($r->empid); ?>
                                                <img style="width:30px;height: 30px;" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($employer->profilepic) != null ? $employer->profilepic :'facebook.jpg' )) }}" />
                                                <strong class="tab1">{{ $r->feedback }}</strong>
                                        </blockquote>
                                    @endforeach
                                @else
                                    <h6>No previous employer feedback</h6>
                                @endif
                            </div>
                        </div>
                    </li>
                    @if($emp->subscribe == 1)
                        <li class="collection-item">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12 m12 l6">
                                            <a href="#modal1" class="hire_btn btn light-blue darken-4 col s12 m12 l12">Hire applicant</a>
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <a href="#" onclick="addShortlist()" class="btn light-blue darken-4 col s12 m12 l12 card-panel">Add to shortlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="message container-fluid">
                <h5 class="center-align grey-text">Hire applicant.</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="cols 12 m12 l20">
                        <form action="{{ asset('/applicant/apply/ad') }}" class="pitch" method="POST">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea pitch-msg" rows="20" name="pitch-msg"></textarea>
                                <label for="textarea1" class="grey-text">Send applicant a message notifaction.</label>
                            </div>
                            <label for="textarea1" class="error red-text"></label>
                            <div class="row center-align">
                                <div class="col s12 m12 l12">
                                    <input type="submit" class="btn green" name="submit" value="Submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="btn yellow darken-1 modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
    </div>
    <div id="modal3" class="modal" style="padding: 5px;">
        <div class="modal-content center-align">
            <p style="font-size: 1em;" class="valign-center"><i class="material-icons small">done</i>You already sent a request to the applicant.</p>
        </div>
    </div>
    <br />
    <div class="divider"></div>
    <!-- AUTO SUGGESTED APPLICANTS -->
    <div class="container-fluid">
        <?php  $ad = Ads::where('empid', '=', $emp->empid)->first(); ?>
        <div class="row">
            @if(isset($ad) and count($ad) > 0)
                <h5 class="tab3">Auto suggested job applicant based on your latest job ad preference. </h5>
            @else
                <h5 class="tab3">Auto suggested job applicant near you. </h5>
            @endif
        </div>
        <div class="row" style="padding: 20px;">
            <div class="col s12 m12 l12">
                <?php $count = 1;
                    $applicatoin_auto = null;
                    if(isset($ad) and count($ad) > 0) {
                        $application_auto = Applications::where('jobtypeid', '=' , $ad->jobtypeid)->paginate(6);
                    } else {

                        $application_auto = Applications::where('regionid', '=',$emp->regionid )
                                        ->orderBy('created_at', 'DESC')
                                        ->paginate(6);
                    }
                ?>
                @if(isset($application_auto) and count($application_auto) > 0)
                    <?php foreach($application_auto as $app_auto) : ?>
                    <?php
                    $location = Regions::find($app_auto->regionid);
                    $applicant_auto = Applicants::find($app_auto->appid);
                    $jobtype = JobTypes::find($app_auto->jobtypeid);
                    ?>
                    <div class="col s12 m6 l4 hoverable" style="margin-top: 10px;">
                        <a target="_blank" href="{{ asset('application/view/'. $app_auto->applicationid) }}" class="grey-text">
                            <div class="card-panel" style="padding: 3px;">
                                <div class="row">
                                    <div class="profile-img col s12 m12 l4">
                                        <div class="center-align" style="padding-top: 10px;">
                                            <img class="image circle" src="{{ asset('public/uploads/profile/'.(($applicant_auto->profilepic) != null ? $applicant_auto->profilepic :'facebook.jpg' )) }}">
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l1 hide-on-med-and-down">
                                        <p>&nbsp;</p>
                                    </div>
                                    <div class="col s12 m12 l6">
                                        <p>
                                        <table class="black-text info">
                                            <tr>
                                                <td><i class="material-icons">perm_identity</i></td>
                                                <td><span class="name">{{ $applicant_auto->fname }}</span> </td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">room</i> </td>
                                                <td>{{ $location->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">work</i> </td>
                                                <td>{{ $jobtype->description }}</td>
                                            </tr>
                                        </table>
                                        </p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l5">
                                        <p>
                                            <a href="{{ asset('application/view/'. $app_auto->applicationid) }}">View helper profile</a>
                                        </p>
                                    </div>
                                    <div class="col s12 m12 l6 right">
                                            <span style="font-size: 0.8em;">
                                                 Posted :
                                                <?php
                                                $date = date('Y-m-d',strtotime($app_auto->created_at));
                                                $date = explode("-" ,$date);

                                                $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                                $month = str_replace('0', '', $date[1]);
                                                $month = $months[$month];
                                                $year = $date[0];
                                                $day = $date[2];
                                                ?>
                                                <span>{{ $month ."-" . $day ."-" .$year }}</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="modal{{$count}}" class="modal modal-fixed-footer fade ql-modal" role="dialog">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 m12 l4">
                                    <div class="card-panel">
                                        <div class="row">
                                            <img class="img-fluid square employer-image col s12 m12 l12" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                                        </div>
                                        <table class="info">
                                            <tr>
                                                <td><i class="material-icons">perm_identity</i></td>
                                                <td><span class="name">{{ $applicant_auto->fname ." ". $applicant_auto->lname }}</span> </td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">room</i> </td>
                                                <td>{{ $location->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">work</i> </td>
                                                <td>{{ $jobtype->description }}</td>
                                            </tr>
                                        </table>
                                        <p>
                                            {{ $applicant_auto->pitch }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col s12 m12 l8">
                                    <div class="row">
                                        <div class="col s12 m12 l12 orange lighten-1 card-panel">
                                            <p class="white-text">
                                                You must subscribe to our membership plan so you can view helper profiles and job application.
                                            </p>
                                        </div>
                                        <div class="col s23 m23 l12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn green ">Ok</a>
                        </div>
                    </div>
                    <?php $count++ ?>
                    <?php endforeach; ?>
                @else
                    <div class="row">
                        <h5>No results found.</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if($application_auto->count() < $application_auto->getTotal())
                <ul class="pagination center-align">
                    {{ $application_auto->links() }}
                </ul>
            @endif
        </div>
    </div>
@stop

@section('css')
    @parent
    <style>
        .profile-pic {
            height : 330px;
            width: 330px;
        }
        .profile-img {
            max-height: 150px;
        }
        .image {
            max-width: 150px;
            height: 150px;
        }
        .name {
            font-family: "Tahoma";
            font-size: 1.2em;
        }
        table.info tr td {
            padding: 0px;
            color: #333;
        }
        .modal {
            width: 100% !important;
            mex-height: 100% !important;
        }
    </style>
@stop
<?php
    $hired = HireLists::where('empid', $emp->empid)
                        ->where('appid', $applicant->appid)
                        ->first();
    $isHired = 'false';
    if($hired and count($hired)) {
        $isHired = 'true';
    }
    $emplist = EmpShortLists::where('empid', '=', $emp->empid)
                            ->where('appid' , '=', $applicant->appid)
                            ->first();
    $isListed = 'false';
    if($emplist and count($emplist) > 0) {
        $isListed = 'true';
    }
?>
@section('js')
    @parent
    <script>
        var hire = {{ $isHired }};
        $(document).ready(function() {
            $('.hire_btn').click(function() {
                if(hire == true) {
                    $('#modal3').openModal();
                } else {
                    $('#modal1').openModal();
                }
            });
            $('.pitch').submit(function(event){
                event.preventDefault();
                var pitch = $('.pitch-msg').val();
                if(pitch == null || pitch == "") {
                    $('.error').html('<span>Should not be empty</span>');
                } else {
                    var data = {
                        "appid" : {{ $applicant->appid }},
                        "empid" : {{ $emp->empid }},
                        "pitch" : $('#textarea1').val()
                    };
                    var url =  {{ "'". asset('/employer/hire') ."'"}};
                    $.post(url, data, function(response){
                        var result = JSON.parse(response);
                        if(result.ok == 'ok') {
                            $('#modal1').closeModal();
                            hire = true;
                            var $toastContent = $('<h6>Your hiring request was sent to employer.</h6>');
                            Materialize.toast($toastContent,5000);
                        }
                    });
                }
            });
        });

        function addShortlist() {
            var listed = {{ $isListed }};
            var data = {
                "appid": {{ $applicant->appid }},
                "empid": {{ $emp->empid }},
            };
            if(listed == true) {
                alert("Applicant is already in your shorlist.");
            } else {
                var url = {{ "'". asset('/employer/add/shortlist') ."'"}};
                $.post(url, data,function(response) {
                    var res = JSON.parse(response);
                    if(res.status == "ok") {
                        listed = true;
                        var $toastContent = $('<h6>Applicant is added to your shorlist</h6>');
                        Materialize.toast($toastContent,5000);
                    }
                });
            }
        }
    </script>
@stop
