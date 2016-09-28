

@extends('employer.layout')

@section('content')
    <div class="row">
        <span class="valign-wrapper">
            <h4>Recommend</h4>
        </span>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            @if(isset($ads) and count($ads) >0)
                @foreach($ads as $ad)
                    <?php $e = Employers::where('empid', '=', $ad->empid)->first(); ?>
                    <div class="col s12 m6 l3" style="margin-top: 10px;">
                        <a target="_blank" href="{{ asset('/recommned/'. $e->empid .'/' .$appid .'/'. $emp->empid) }}" class="black-text">
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
                                <a class="btn green" href="{{ asset('/recommned/'. $e->empid .'/' .$appid .'/'. $emp->empid) }}">Reccomend</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
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
