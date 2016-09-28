

@extends('admin.layout')

@section('content')

    <div class="row">
       <div class="container">
           <div class="row center">
               <h5>Applicant profile</h5>
           </div>
           <div class="card-panel">
              <div class="row center">
                  <div class="col s12 m12 l6">
                      <img src="{{ asset('/public/uploads/profile/' . $app->profilepic) }}" class="responsive-img img-container"/>
                      <br />
                      <a class="full" href="" >View large(profile)</a>
                      <a class="small" href="">View small(profile)</a>
                  </div>
                  <div class="col s12 m12 l6">
                      @if($app->nbi != NULL)
                          <img src="{{ asset('/public/uploads/nbi/' . $app->nbi) }}" class="responsive-img img-container"/>
                          <br />
                          <a class="full" href="" >View large</a>
                          <a class="small" href="">View small</a>
                      @else
                          <img src="{{ asset('/public/images/NBI.png') }}" class="responsive-img img-container"/>
                      @endif
                  </div>

              </div>
               <div class="divider"></div>
               <br />
               <div class="row info">
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Name :</strong>
                        <strong class="tab1">{{ $app->fname. " ". $app->lname }}</strong>
                    </div>
                   <div class="valign-wrapper center-align">
                       <strong class="tab1">Mobile # :</strong>
                       <strong class="tab1">{{ $app->contactno}}</strong>
                   </div>
                    <div class="valign-wrapper center-align">
                        <strong class="tab1">Address :</strong>
                        <?php $regions = Regions::find($app->regionid); ?>
                        <strong class="tab1">{{ $regions->location }} - ( {{ $app->address }} )</strong>
                    </div>
                   <div class="valign-wrapper center-align">
                       <strong class="tab1">Gender :</strong>
                       <strong class="tab1">{{ $app->gender }}</strong>
                   </div>
                   <div class="valign-wrapper center-align">
                       <strong class="tab1">Nationality :</strong>
                       <?php $n = Nationalities::find($app->nationality); ?>
                       <strong class="tab1">{{ $n->nationality  }}</strong>
                   </div>
                   <div class="valign-wrapper center-align">
                       <strong class="tab1">Religion</strong>
                       <?php $r = Religions::find($app->religion); ?>
                       <strong class="tab1">{{ $r->religion }}</strong>
                   </div>
                   <div class="valign-wrapper center-align">
                       <strong class="tab1">Civil Status :</strong>
                       <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                       <strong class="tab1">{{ $status[$app->civilstatus] }}</strong>
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
                var url = {{ "'" . asset('/admin/applicant/message') ."'"}};
                var data = {
                    "message" : $('#message').val(),
                    "appid" : {{ $app->appid }},
                    "number" : {{ $app->contactno }}
                };
                $.post(url,data, function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok"){
                        $('#modal1').closeModal();
                        var $toastContent = $('<h5>Message sent.</h5>');
                        Materialize.toast($toastContent,5000);
                    }
                });

            });
            $('#verify').click(function(){
                var url = {{ "'" . asset('/admin/applicant/verify') ."'"}};
                var data = {
                    "appid" : {{ $app->appid }}
                };
                $.post(url, data ,function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok") {
                        var $toastContent = $('<h5>{{ $app->fname }} succesfully verified.</h5>');
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
