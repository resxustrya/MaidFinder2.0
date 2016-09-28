

@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="container">
            <div class="row center">
                <h5>Employer profile</h5>
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
                        <strong class="tab1">Name :</strong>
                        <strong class="tab1">{{ $emp->fname. " ". $emp->lname }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Mobile # :</strong>
                        <strong class="tab1">{{ $emp->contactno}}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Address :</strong>
                        <?php $regions = Regions::find($emp->regionid); ?>
                        <strong class="tab1">{{ $regions->location }} - ( {{ $emp->address }} )</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Gender :</strong>
                        <strong class="tab1">{{ $emp->gender }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Nationality :</strong>
                        <?php $n = Nationalities::find($emp->nationality); ?>
                        <strong class="tab1">{{ $n->nationality  }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Religion</strong>
                        <?php $r = Religions::find($emp->religion); ?>
                        <strong class="tab1">{{ $r->religion }}</strong>
                    </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Civil Status :</strong>
                        <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                        <strong class="tab1">{{ $status[$emp->civilstatus] }}</strong>
                    </div>
                </div>
                <div class="row center">
                    <button class="btn green" id="verify">Verify</button>
                    <button class="btn green modal-trigger" href="#modal1">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div id="modal1" class="modal ">
        <div class="card-panel">
            <div class="row">
                <h5 class="center">Your message</h5>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12 valign-wrapper">
                    <input type="text" maxlength="100" id="message" placeholder="Type your message" />
                </div>
            </div>
            <br />
            <div class="row center">
                <button id="send" class="btn blue">Send message</button>
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
                var url = {{ "'" . asset('/admin/employer/message') ."'"}};
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
            $('#verify').click(function(){
                var url = {{ "'" . asset('/admin/employer/verify') ."'"}};
                var data = {
                    "empid" : {{ $emp->empid }}
                };
                $.post(url, data ,function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok") {
                        var $toastContent = $('<h5>{{ $emp->fname }} succesfully verified.</h5>');
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
