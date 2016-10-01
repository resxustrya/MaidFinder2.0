

@extends('employer.layout')

@section('content')
    <div class="row">
        <h5>Recomended profile</h5>
    </div>
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
                                    <h5 class="grey-text">Contact information</h5>
                                    <div class="row">
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
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        @else
                            <div class="row center">
                                <a href="{{ asset('/subscription') }}"><strong>Contact applicant</strong></a>
                            </div>
                        @endif
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                                <h5 class="grey-text">Job application preferences</h5>
                                <div class="col s12 m12 l12">
                                    <table class="ad_prefer">
                                        <tr>
                                            <?php $jobtype = JobTypes::where('jobtypeid', '=', $application->jobtypeid)->first(); ?>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong>I'm applying {{ $jobtype->description }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">location_on</i> </td>
                                            <td><strong>{{ $location->location }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">loyalty</i> </td>
                                            <?php $salary = Salaries::where('salaryid', '=', $application->salaryid)->first();?>
                                            <td><strong>{{ $salary->amount_range }}</strong></td>
                                        </tr>
                                        <tr>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong>{{ $capacity[$application->capacity] }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                                <h5 class="grey-text">About job application</h5>
                                <strong>
                                    {{ nl2br($application->pitch) }}
                                </strong>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <h5 class="grey-text">Performed Duties</h5>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                                <h5 class="grey-text">Previous employer feedback</h5>
                                <?php $rating = AppRatings::where('appid', '=', $applicant->appid)->get();?>
                                @foreach($rating as $r)
                                    <blockquote class="valign-wrapper">
                                        <?php $emp = Employers::find($r->empid); ?>
                                        <img style="width:30px;height: 30px;" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($emp->profilepic) != null ? $emp->profilepic :'facebook.jpg' )) }}" />
                                        <strong class="tab1">{{ $r->feedback }}</strong>
                                    </blockquote>
                                @endforeach
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

                    @else
                        <li class="collection-item">
                            <div class="row">
                                <div class="container">
                                    <div class="row center">
                                        <a class="btn blue" href="{{ asset('/subscription') }}"><strong>Hire applicant</strong></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>



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
                            var $toastContent = $('<h6>Your hiring request was sent to</h6>');
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

