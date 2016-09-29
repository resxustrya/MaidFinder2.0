

@extends('employer.layout')

@section('content')
    <div class="row">
        <span class="valign-wrapper">
            <h4>Recommendations</h4>
        </span>
    </div>
    <div class="row">
        <h6>Choose who do you want to recommend your previous helper.</h6>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            @if(isset($ads) and count($ads) >0)
                @foreach($ads as $ad)
                    <?php $e = Employers::where('empid', '=', $ad->empid)->first(); ?>
                    <div class="col s12 m6 l4" style="margin-top: 10px;">
                        <div class="card-panel">
                            <div class="row">
                                <img class="image circle" src="{{ asset('public/uploads/profile/'.(($e->profilepic) != null ? $e->profilepic :'facebook.jpg' )) }}">
                            </div>
                            <div class="row">
                               <span class="valign-wrapper">
                                   <i class="material-icons">perm_identity</i>
                                   <strong class="tab1">{{ $e->fname ." ". $e->lname }}</strong>
                               </span>
                               <span class="valign-wrapper">
                               <i class="material-icons">work</i>
                                   <?php $ad = Ads::where('empid', '=',$e->empid)->first();?>
                                   <?php
                                   $job = null;
                                   if(isset($ad) and count($ad) > 0) {
                                       $job = JobTypes::find($ad->jobtypeid);
                                   }
                                   ?>

                                   <strong class="tab1">Looking for : {{ $job->description}}</strong>
                                </span>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <button class="btn green" onclick="recommend({{ $e->empid }} ,{{ $emp->empid }} , {{ $appid }})">Recommend</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <ul class="paginate">
            <?php echo $ads->links(); ?>
        </ul>
    </div>
@stop

@section('css')
    @parent
    <style>

        .image {
            height: 300px;
            max-width:300px;
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
    </style>
@stop
@section('js')
    @parent
    <script>
        function recommend(a,b,c) {
            var url = {{"'". asset('/employer/recommend/to') ."'" }};
            var data = {
                'recomendto' : a,
                'recomendby' : b,
                'appid' : c
            };
            $.post(url,data, function(response){
                var res = JSON.parse(response);
                if(res.status == "ok") {
                    var $toastContent = $('<h6 class="white-text">Recommendation sent</h6>');
                    Materialize.toast($toastContent,5000);
                } else {
                    var $toastContent = $('<h6 class="white-text">Recommendation already sent.</h6>');
                    Materialize.toast($toastContent,5000);
                }
            });
        }
    </script>


@stop
