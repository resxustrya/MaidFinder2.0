
<?php
    $error = null;
    if(Session::has('error')) {
        $error = Session::get('error');
    }
    $input = null;
?>

@extends('home.layout')

@section('content')
    @if(Session::has('input'))
        <?php $input = Session::get('input'); ?>
    @endif
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l3">
            </div>
            <div class="col s12 m12 l6" style="margin-top:6em;">
                <ul class="collection with-header z-depth-4">
                    <li class="collection-header logHeader2 blue darken-1">
                        <div class="center white-text">
                           <h5>Complete your profile information</h5>
                        </div>
                    </li>
                    <li class="collection-item">
                        <form action="{{ asset('/create/profile') }}" method="POST">
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <input id="icon_prefix" type="text" name="fname" value="{{ isset($user->fname) ? $user->fname : ''}}" class="validate" placeholder="First name">
                                        <label for="icon_prefix">First name</label>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('fname') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <input id="icon_prefix" type="text" name="lname" value="{{ isset($user->lname) ? $user->lname : ''}}" class="validate" placeholder="Last name">
                                        <label for="icon_prefix">Last name</label>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('lname') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <input id="icon_prefix" type="text" value="{{ (isset($input['contactno'] )) ? $input['contactno'] : ''}}" name="contactno" class="validate" placeholder="Mobile #">
                                        <label for="icon_prefix">Mobile number</label>
                                    </div>
                                    <span class="red-text tab">{{ isset($error) ? $error->first('contactno') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <input id="icon_prefix" type="text" value="{{ (isset($input['address'] )) ? $input['address'] : ''}}" name="address" class="validate" placeholder="Complete address">
                                        <label for="icon_prefix">Full Address</label>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('address') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <strong>Birth Date</strong>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select class="browser-default" name="year">
                                            <option value="" selected disabled>Year</option>
                                            <?php $count = 1; ?>
                                            @for($i = date('Y');50 > $count++; $i--)
                                                <option {{ (isset($input['year']) and $input['year'] == $i) ? 'selected' : ''}} value="{{ $i }}"> {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('year') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select class="browser-default" name="month">
                                            <option value="" selected disabled>Month</option>
                                            <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                            @foreach($month as $key => $value)
                                                <option {{ (isset($input['month']) and $input['month'] == $key) ? 'selected' : ''}} value="{{ $key}}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('month') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select name="day"  class="browser-default">
                                            <option value="" selected disabled>Day</option>
                                            @for($i = 1; $i <= 31; $i++)
                                                <option {{ (isset($input['day']) and $input['day'] == $i) ? 'selected' : ''}} value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('day') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select name="location" class="browser-default">
                                            <option value="" selected disabled>Select Location</option>
                                            @foreach($location as $loc)
                                                <option {{ (isset($input['location'] ) and $input['location'] == $loc->regionid) ? 'selected' : ''}} value="{{$loc->regionid}}">{{ $loc['location'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('location') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select class="black-text browser-default" name="gender">
                                            <option class="black-text" value="">Gender</option>
                                            <option {{(isset($input['gender']) and $input['gender'] == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                            <option {{(isset($input['gender']) and $input['gender'] == "Female") ? 'selected' : '' }} value="Female">Female</option>
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('gender') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select class="black-text browser-default" name="civilstatus">
                                            <option disabled value="" selected>Civil status</option>
                                            <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                            @foreach($status as $key => $value)
                                                <option {{ (isset($input['civilstatus']) and $input['civilstatus'] == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('civilstatus') : '' }}</span>
                                </div>
                                <div class="input-field  col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select name="nationality" class="browser-default">
                                            <option value="" disabled selected>Select nationality</option>
                                            <?php $nationality = Nationalities::all(); ?>
                                            @foreach($nationality as $n)
                                                <option {{ (isset($input['nationality']) and $input['nationality']) ? 'selected' : '' }} value="{{ $n->id }}">{{ $n->nationality }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('nationality') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <div class="valign-wrapper">
                                        <select name="religion" class="browser-default">
                                            <option value="" disabled selected >Select religion</option>
                                            <?php $religion = Religions::all(); ?>
                                            @foreach($religion as $n)
                                                <option {{ (isset($input['religion']) and $input['religion']) ? 'selected' : '' }} value="{{ $n->id }}">{{ $n->religion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="red-text">{{ isset($error) ? $error->first('religion') : '' }}</span>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <input type="date" class="datepicker">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <button  type="submit" class="btn blue darken-4 waves-effect waves-light col s12">Submit profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col s12 m12 l3">

            </div>
        </div>
    </div>

@stop
<?php Session::forget('input'); ?>
@section('css')

@stop


@section('js')

@stop
