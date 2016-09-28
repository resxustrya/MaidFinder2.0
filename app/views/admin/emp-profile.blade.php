

@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="container">
            <div class="row center">
                <h5>Applicant profile</h5>
            </div>
            <div class="card-panel">
                <div class="row center">
                    <img src="{{ asset('/public/uploads/profile/' . $emp->profilepic) }}" class="responsive-img img-container"/>
                    <br />
                    <a class="full" href="" >View large</a>
                    <a class="small" href="">View small</a>
                </div>
                <div class="divider"></div>
                <br />
                <div class="row info">
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">perm_identity</i>
                        <strong class="tab1">Name :</strong>
                        <strong class="tab1">{{ $emp->fname. " ". $emp->lname }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">perm_phone_msg</i>
                        <strong class="tab1">Mobile # :</strong>
                        <strong class="tab1">{{ $emp->contactno}}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">location_on</i>
                        <strong class="tab1">Address :</strong>
                        <?php $regions = Regions::find($emp->regionid); ?>
                        <strong class="tab1">{{ $regions->location }} - ( {{ $emp->address }} )</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">label</i>
                        <strong class="tab1">Gender :</strong>
                        <strong class="tab1">{{ $emp->gender }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">view_quilt</i>
                        <strong class="tab1">Nationality :</strong>
                        <?php $n = Nationalities::find($emp->nationality); ?>
                        <strong class="tab1">{{ $n->nationality  }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">toll</i>
                        <strong class="tab1">Religion</strong>
                        <?php $r = Religions::find($emp->religion); ?>
                        <strong class="tab1">{{ $r->religion }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <i class="material-icons">label</i>
                        <strong class="tab1">Civil Status :</strong>
                        <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                        <strong class="tab1">{{ $status[$emp->civilstatus] }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $(document).ready(function(){
            $('.small').hide();
            $('.full').click(function(event){
                event.preventDefault();
                $('.info').hide();
                $('.small').show();
                $('.full').hide();
                $('.responsive-img').height('100%').width('100%');
            });
            $('.small').click(function(event){
                event.preventDefault();
                $('.info').show();
                $('.small').hide();
                $('.full').show();
                $('.img-container').height('200px').width('200px');
            });
            $('#send').click(function() {
                var message= $('#message').val();
                $('#send').attr('disabled');
                var url = {{ "'" . asset('/admin/applicant/message') ."'"}};
                var data = {
                    "message" : $('#message').val(),
                    "empid" : {{ $emp->empid }},
                    "number" : {{ $emp->contactno }}
                };
                $.post(url,data, function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok"){
                        $('#modal1').closeModal();
                        var $toastContent = $('<h5>Your application request was sent to employer.</h5>');
                        Materialize.toast($toastContent,5000);
                    }
                });

            });
        });
    </script>

@stop

@section('css')
    @parent
    <style>
        .img-container {
            width: 200px;
            height: 200px;
        }
    </style>
@stop
