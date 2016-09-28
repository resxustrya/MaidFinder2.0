@extends('employer.layout')

@section('content')
           <div class="row">
        <span class="valign-wrapper">
            <h4>Your profile</h4>
            <a class="tab2 btn green" href="{{ asset('/employer/update') }}">[Edit Profile]</a>
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
                                    <img class="profile-pic circle image responsive-img" src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="row center">
                                    <a class="btn green" id="change_pic"><i class="material-icons">radio</i></a>
                                </div>
                            </div>

                        </div>
                        <div class="col s12 m12 l9">
                            <h5>Basic information</h5>
                            <div class="divider"></div><br />
                            <span class="valign-wrapper">
                                <i class="material-icons">perm_identity</i><span>Name :</span>
                                <strong class="tab1">{{ $emp->fname ." ". $emp->lname }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Location :</span>
                                <strong class="tab1">{{ $location->location }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">location_on</i><span>Complete address :</span>
                                <strong class="tab1">{{ $emp->address }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">group_work</i><span>Gender :</span>
                                <strong class="tab1"> {{ $emp->gender }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">picture_in_picture</i><span>Birthday :</span>
                                <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                <?php $bdate = explode('-', $emp->bdate); ?>
                                <strong class="tab1">{{ $month[$bdate[1]].'/' . $bdate[2] .'/' . $bdate[0]  }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">label</i><span>Civil status :</span>
                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                <strong class="tab1"> {{ $status[$emp->civilstatus] }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">polymer</i><span>Nationanlity :</span>
                                <?php $n = Nationalities::find($emp->nationality); ?>
                                <strong class="tab1">{{ $n->nationality }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">toc</i><span>Religion :</span>
                                <?php $n = Religions::find($emp->religion); ?>
                                <strong class="tab1">{{ $n->religion }}</strong>
                            </span>
                            <br />
                            <h5>Contact Information</h5>
                            <div class="divider"></div><br />
                            <span class="valign-wrapper">
                                <i class="material-icons">phone</i><span>Mobile phone :</span>
                                <strong class="tab1">{{ $emp->contactno }}</strong>
                            </span>
                            <br />
                            <span class="valign-wrapper">
                                <i class="material-icons">email</i><span>Email :</span>
                                <strong class="tab3">{{ $emp->email }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- modal -->
       <div id="profile" class="modal ">
           <h5 class="center-align">Change profile picture</h5>
           <div class="row" style="margin-top: 10px;">
               <div class="col s12 m12 l12">
                   <form action="{{ asset('/employer/update/picture') }}" method="POST" enctype="multipart/form-data">

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
                       <br />
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
            $('#change_pic').click(function() {
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
    </script>
@stop
@section('css')
    @parent
    <style>
        .profile-pic {
            width: 200px;
            height: 200px;
            max-height: 10%;
            max-width: 10%;
        }
        .info {

        }
    </style>
@stop
