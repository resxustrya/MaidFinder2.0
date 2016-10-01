@extends('applicant.layout')

@section('content')

    <div class="row">
        <span class="valign-wrapper">
            <h4>Your profile</h4>
              </span>
    </div>
    <div class="tab2 container-fluid">
        <div class="row" style="margin-top: 10px;">
            <div class="col s12 m12 l10">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <div class="row">
                                <div class="left-align animated bounceInUp">
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
                            <div class="valign-wrapper">
                                <i class="material-icons">perm_identity</i><span>Name :</span>
                                <strong class="col l9">{{ $app->fname ." ". $app->lname }}</strong>
                            </div>
                            <br>
                            <div class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Location :</span>
                                <strong class="col l9">{{ $location->location }}</strong>
                            </div><br>
                            <div class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Complete address :</span>
                                <strong class="col l8">{{ $app->address }}</strong>
                            </div>
                            <br>
                            <div class="valign-wrapper">
                                <i class="material-icons">group_work</i><span>Gender :</span>
                                <strong class="col l9"> {{ $app->gender }}</strong>
                            </div><br>
                            <div class="valign-wrapper">
                                <i class="material-icons">picture_in_picture</i><span>Birthday :</span>
                                <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                <?php $bdate = explode('-', $app->birth); ?>
                                <strong class="col l9">{{ $month[$bdate[1]].'/' . $bdate[2] .'/' . $bdate[0]  }}</strong>
                            </div><br>
                            <div class="valign-wrapper">
                                <i class="material-icons">label</i><span>Civil status :</span>
                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                <strong class="col l9"> {{ $status[$app->civilstatus] }}</strong>
                            </div><br>
                            <div class="valign-wrapper">
                                <i class="material-icons">polymer</i><span>Nationality :</span>
                                <?php $n = Nationalities::find($app->nationality); ?>
                                <strong class="col l9">{{ $n->nationality }}</strong>
                            </div><br>
                            <div class="valign-wrapper">
                                <i class="material-icons">toc</i><span>Religion :</span>
                                <?php $n = Religions::find($app->religion); ?>
                                <strong class="col l9">{{ $n->religion }}</strong>
                            </div>
                            <br />
                            <h5>Contact Information</h5>
                            <div class="divider"></div><br />
                            <div class="valign-wrapper">
                                <i class="material-icons">phone</i><span>Mobile phone :</span>
                                <strong class="col l9">{{ $app->contactno }}</strong>
                            </div><br>
                            <span class="valign-wrapper">
                                <i class="material-icons">email</i><span>Email :</span>
                                <strong class="col l9">{{ $app->email }}</strong>
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
                            <br />
                            <div class="row">
                                <a class="col l9 btn green" href="{{ asset('/applicant/profile/edit') }}">Edit Profile</a>
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
