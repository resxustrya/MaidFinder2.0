@extends('employer.layout')

@section('content')
    <div class="row">
        <span class="valign-wrapper">
            <h4>Update your profile</h4>
        </span>
    </div>
    <div class="tab2 container-fluid">
        <form action="{{ asset('/employer/update') }}" method="POST">
            <div class="row" style="margin-top: 10px;">
                <div class="col s12 m12 l10">
                    <div class="card-panel">
                        <h5>User information</h5>
                        <div class="divider"></div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="fname" value="{{ $emp->fname }}" class="validate">
                                    <label for="icon_prefix">First Name</label>
                                </div>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" name="lname" value="{{ $emp->lname }}" class="validate">
                                <label for="icon_prefix">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <div class="valign-wrapper">
                                    <strong>Gender</strong>
                                    <select class="browser-default tab1" name="gender">
                                        <option value="">Gender</option>
                                        <option {{(isset($emp->gender) and $emp->gender == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{(isset($emp->gender) and $emp->gender == "Female") ? 'selected' : '' }} value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <span class="red-text">{{ isset($error) ? $error->first('gender') : '' }}</span>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <div class="valign-wrapper">
                                    <strong>Civil status</strong>
                                    <select class="browser-default" name="civilstatus">
                                        <option disabled value="" selected>Civil status</option>
                                        <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                        @foreach($status as $key => $value)
                                            <option {{ (isset($emp->civilstatus) and $emp->civilstatus == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="red-text">{{ isset($error) ? $error->first('civilstatus') : '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <div class="valign-wrapper">
                                    <strong>Birthdate</strong>
                                    <select class="browser-default tab1" name="year">
                                        <option value="" selected disabled>Year</option>
                                        <?php $date = explode('-', $emp['bdate']); $count = 1; ?>
                                        @for($i = date('Y');50 > $count++; $i--)
                                            <option {{ $date[0] == $i ? 'selected' : ''}} value="{{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>

                                    <select class="browser-default" name="month">
                                        <option value="" selected disabled>Month</option>
                                        <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                        @foreach($month as $key => $value)
                                            <option {{ $date[1] == $key ? 'selected' : ''}} value="{{ $key}}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <select name="day"  class="browser-default">
                                        <option value="" selected disabled>Day</option>
                                        @for($i = 1; $i <= 31; $i++)
                                            <option {{ $date[2] == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <div class="valign-wrapper">
                                    <strong>Nationality</strong>
                                    <select name="nationality" class="browser-default tab1">
                                        <option value="" disabled selected>Select nationality</option>
                                        <?php $nationality = Nationalities::all(); ?>
                                        @foreach($nationality as $n)
                                            <option {{ (isset($emp->nationality) and $emp->nationality == $n->id) ? 'selected' : '' }} value="{{ $n->id }}">{{ $n->nationality }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="red-text">{{ isset($error) ? $error->first('nationality') : '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <div class="valign-wrapper">
                                    <strong>Religion</strong>
                                    <select name="religion" class="browser-default tab1">
                                        <option value="" disabled selected >Select religion</option>
                                        <?php $religion = Religions::all(); ?>
                                        @foreach($religion as $n)
                                            <option {{ (isset($emp->religion) and $emp->religion == $n->id) ? 'selected' : '' }} value="{{ $n->id }}">{{ $n->religion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="red-text">{{ isset($error) ? $error->first('religion') : '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <div class="valign-wrapper">
                                    <strong>Locatoin</strong>
                                    <select name="location" class="browser-default tab1">
                                        <option value="" selected disabled>Location</option>
                                        @foreach($location as $loc)
                                            <option value="{{ $loc->regionid}}" {{ (($emp->regionid == $loc->regionid) ? 'selected' : '') }}>{{ $loc['location'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h5>Contact Information</h5>
                        <div class="divider"></div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <i class="material-icons prefix">location_on</i>
                                <input id="icon_prefix" type="text" value="{{ $emp->address != null ? $emp->address: '' }}" name="address" class="validate">
                                <label for="icon_prefix">Complete address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_prefix" type="text" value="{{ $emp->contactno != null ? $emp->contactno : '' }}" name="contactno" class="validate">
                                <label for="icon_prefix">Contact number</label>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="center-align">
                                    <input type="submit" name="submit" value="Update profile" class="btn btn-large  green"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
    @parent
    <script crossorigin="anonymous">
        $(document).ready(function() {

        });

    </script>
@stop
