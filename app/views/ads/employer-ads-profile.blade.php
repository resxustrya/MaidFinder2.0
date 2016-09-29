

@extends('ads.layout')

@section('content')
    <div class="container-fluid" style="padding:0px;">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header">
                    <li class="collection-item">
                        <h5 class="grey-text">Employer profile</h5>
                        <div class="row">
                            <div class="col s12 m12 l2">
                                <div class="row">
                                    <img id="editpicture" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                            </div>
                            <div class="col s12 m12 l3">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                            <td><span class="grey-text text-darken-4 name">{{ $emp->fname ." ". $emp->lname }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">email</i> </span> </td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->email }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">location_on</i></span></td>
                                            <?php $region = Regions::find($ads->regionid); ?>
                                            <td><span class="grey-text text-darken-4">{{ $region->location }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">phone</i></span></td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->contactno }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">supervisor_account</i> </span> </td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->gender }}</span></td>
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
                                                <td><span class="grey-text text-darken-4">{{ $age }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Nationanlity :</span></td>
                                                <?php $n = Nationalities::find($emp->nationality); ?>
                                                <td><span class="grey-text text-darken-4">{{ $n->nationality }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Religion :</span> </td>
                                                <?php $n = Religions::find($emp->religion); ?>
                                                <td><span class="grey-text text-darken-4">{{ $n->religion }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Civil Status :</span> </td>
                                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                                <td><span class="grey-text text-darken-4">{{ $status[$emp->civilstatus] }}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <?php $jobtype = JobTypes::find($ads->jobtypeid); ?>
                        <strong class="grey-text" style="font-size: 1.2em;">I currently looking for a - {{ $jobtype->description }}</strong>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <div class="row">
                                    <h5 class="grey-text">Job ad preferences</h5>
                                </div>
                                <div class="row">
                                    <table class="ad_prefer tab3">
                                        <tr>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong> {{ $jobtype->description }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">location_on</i> </td>
                                            <?php $location = Regions::find($ads->regionid); ?>
                                            <td><strong>{{ $location->location }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">loyalty</i> </td>
                                            <td><strong>{{ $ads->salaryid }}</strong></td>
                                        </tr>
                                        <tr>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong>{{ $capacity[$ads->capacity] }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">label</i></td>
                                            <td><strong>Helper should be  {{ $ads->gender }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <h5 class="grey-text">Job ad description</h5>
                        <div class="row">
                            <strong>{{ nl2br($ads->pitch) }}</strong>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l3">
                                <h5>Expected duties</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <?php $duties = ExpDuties::where('adid', '=' ,$ads->adid)->get(); ?>
                                <ul>
                                    @if(isset($duties) and count($duties)> 0)
                                        @foreach($duties as $d)
                                            <li class="valign-wrapper">
                                                <i class="material-icons">done_all</i>
                                                <?php $d = Duties::find($d->duties); ?>
                                                <strong class="tab1">{{ $d->description }}</strong>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l6">
                                    <a href="#modal1" class="apply_btn btn light-blue darken-4 col s12 m12 l12 card-panel">Apply job</a>
                                </div>
                                <div class="col s12 m12 l6">
                                    <a onclick="addShortList();" class="btn light-blue darken-4 col s12 m12 l12 card-panel">Ad to shortlist</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="message container-fluid">
                <h5 class="center-align grey-text">Make a short story for your job application</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="cols 12 m12 l20">
                        <form action="{{ asset('/applicant/apply/ad') }}" class="pitch" method="POST">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea pitch-msg" rows="20" name="pitch-msg"></textarea>
                                <label for="textarea1" class="grey-text">Tell your employer about yourself and why should they hire you.</label>
                            </div>
                            <label for="textarea1" class="error red-text"></label>
                            <div class="row center-align">
                                <div class="col s12 m12 l12">
                                    <input type="submit" class="btn green" name="submit" value="Submit application" />
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
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Message</h4>
            <form action="#" method="POST">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Write your message here</label>
                        <span class="orange-text" id="err"></span>
                    </div>
                </div>
                <div class="row">
                    <button class="btn green col s12 m12 l12 send_btn">Send message</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal3" class="modal" style="padding: 5px;">
        <div class="modal-content center-align">
            <p style="font-size: 1em;" class="valign-center"><i class="material-icons small">done</i> You already sent a request to this employer.</p>
        </div>
    </div>
    <!-- AUTO SUGGESTED APPLICANTS -->

    <?php
        $auto_app = Applications::where('appid', '=', $app->appid)->first();
        $auto_ads = null;
        if(isset($auto_app) and count($auto_app) > 0) {
            $auto_ads = Ads::where('jobtypeid','=', $auto_app->jobtypeid)->paginate(10);
        }
    ?>
    <br />
    <br />
    <div class="divider"></div>
    <div class="container">
        <div class="row">
            <h5>Auto suggested job ads based on your latest job ad preference. </h5>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l1">
                &nbsp;
            </div>
            <div class="col s12 m12 l11">
                @if(isset($auto_ads) and count($auto_ads) > 0)
                    <?php $capacity = array('Full Time','Par Time'); ?>
                    @foreach($auto_ads as $aud)
                        <a href="{{ asset('employer/ad/profile/'.$aud->adid)  }}" class="hoverable waves-green black-text">
                            <div class="col s12 m12 l11" style="margin-top: 20px;">
                                <div class="card-panel">
                                    <div class="row">
                                        <div class="valign-wrapper">
                                            <?php $job = JobTypes::find($aud->jobtypeid); ?>
                                            <h5>Position :<span class="tab1">{{ $job->description}}</span></h5>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <strong style="font-size: 1.2em;">Job description :</strong>
                                        <br />
                                        <span class="">{{ $aud->pitch }}</span>
                                    </div>
                                    <br />
                                    <div class="divider"></div>
                                    <br />
                                    <div class="row">
                                        <div class="col s12 m12 l6">

                                   <span class="valign-wrapper">
                                       <i class="material-icons">location_on</i>
                                       <span>Preffred location :</span>
                                       <?php $loc = Regions::find($aud->regionid); ?>
                                       <strong class="tab2">{{ $loc->location }}</strong>
                                   </span>
                                    <span class="valign-wrapper">
                                       <i class="material-icons">label</i>
                                       <span>Capacity :</span>
                                        <?php $capacity = array('Full Time', 'Part Time'); ?>
                                        <strong class="tab2">{{ $capacity[$aud->capacity] }}</strong>
                                   </span>
                                   <span class="valign-wrapper">
                                       <i class="material-icons">label</i>
                                       <span>Salary :</span>
                                       <strong class="tab2">{{ $aud->salary }} - Pesos</strong>
                                   </span>
                                   <span class="valign-wrapper">
                                       <i class="material-icons">label</i>
                                       <span>Startdate :</span>
                                       <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                       <?php $startdate = explode('-', $aud->startdate); ?>
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
                                                <?php $duties = ExpDuties::where('adid', '=', $aud->adid)->get(); ?>
                                                @if(isset($duties) and count($duties) >0)
                                                    <ul>
                                                        @foreach($duties as $duty)
                                                            <li class="valign-wrapper">
                                                                <i class="material-icons">done_all</i>
                                                                <span class="tab1">{{ $duty->description }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
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
                                            $date = date('Y-m-d',strtotime($aud->created_at));
                                            $date = explode("-" ,$date);

                                            $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                            $month = str_replace('0', '', $date[1]);
                                            $month = $months[$month];
                                            $year = $date[0];
                                            $day = $date[2];
                                            ?>
                                            <strong class="tab1">{{ $month ."-" . $day ."-" .$year }}</strong>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <br />
                                        <a href="{{ asset('employer/ad/profile/'.$aud->adid)  }}" class="red-text text-lighten-2" style="font-size: 1.2em;">View full profile</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <div class="row">
                        <ul class="pagination">
                            <?php echo $auto_ads->links(); ?>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col s12 m12 l1">
            </div>
        </div>
    </div>



    <?php
        $applied_ad = ApplyAds::where('appid', '=', $app->appid)
                                ->where('empid', '=', $emp->empid)->first();
        $isApplied = 'false';
        if($applied_ad and count($applied_ad) > 0 and $ads->adid == $applied_ad->adid) {
            $isApplied = 'true';
        }
        $shortlist_count = 0;
        $isListed = 'false';
        $shortlist = AppShortList::where('appid', '=', $app->appid)
                                    ->where('empid', '=' ,$emp->empid)->first();
        if(isset($shortlist) and count($shortlist)) {
            $shortlist = count($shortlist);
            $isListed = 'true';
        }
    ?>
@stop

@section('js')
    @parent
    <script>
        var isListed = {{ $isListed }};
        var isApplied = {{ $isApplied }} ;
        $(document).ready(function() {
            $('.apply_btn').click(function(event){
                if(isApplied == true) {
                    $('#modal3').openModal();
                } else {
                    $('#modal1').openModal();
                }
            });
            $('.pitch').submit(function(e){
                e.preventDefault();
                var pitch = $('.pitch-msg').val();
                if(pitch == null || pitch == "") {
                    $('.error').html('<span>Should not be empty</span>');
                } else {
                    var data = {
                        "empid" : {{ $emp->empid }},
                        "adid" : {{ $ads->adid }},
                        "pitch-message" : $('#textarea1').val()
                    };
                    var url =  {{ "'". asset('/applicant/apply/ad') ."'"}};
                    $.post(url, data, function(response){
                        if(response == "ok") {
                            $('#modal1').closeModal();
                            isApplied = true;
                            var $toastContent = $('<h5 class="white-text">Your application request was sent to employer.</h5>');
                            Materialize.toast($toastContent,5000);
                        }
                    });
                }
            });
        });
        function addShortList() {
           var data = {
               "appid" : {{ $app->appid }},
               "empid" : {{ $emp->empid }}
           };
            if(isListed == false) {
                var url = {{ "'". asset('/applicant/shortlist/add/') ."'" }};
                $.post(url, data, function(response) {
                    var res = JSON.parse(response);
                    if(res.status == "ok"){
                        var $toastContent = $('<h5>Employer was added to your shorlist.</h5>');
                        Materialize.toast($toastContent,5000);
                    }
                });
            } else {
                var $toastContent = $('<h5>Job ad is already short listed.</h5>');
                Materialize.toast($toastContent,5000);
            }
        }

    </script>
@stop

@section('css')
    @parent
    <style>
        #profilepic {
            height : 200px;
            width: 200px;
        }
        .name {
            font-size: 2em;
        }
        table tr td {
            padding: 0px;
        }
        .name {
            font-size: 1.2em;
            font-family: "DejaVu Sans", sans-serif;
        }
        table.ad_prefer tr td {
            padding:0px;
        }
    </style>
@stop