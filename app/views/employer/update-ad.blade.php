
@extends('employer.layout')

@section('content')
    <div class="container-fluid">
        @if(Session::has('error'))
            <?php $error = Session::get('error'); ?>
        @endif
        <div class="row">
            <div class="col s12 m12 l7 offset-l2">
                <div class="row"><h6>&nbsp;</h6></div>
                <h4>Update ad</h4>
                <div class="divider"></div>
                <br />
                <div class="card-panel">
                    <form action="{{ asset('/create/ad') }}" method="POST">
                        <input type="text" name="jobtypeid" value="{{ $ad->jobypied }}" />
                        <div class="row valign-wrapper">

                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Preferred location</h6>
                            </div>
                            <div class="col s12 m12 l8 ">
                                <?php $location = Regions::all(); ?>
                                <select name="location" class="icons">
                                    <option value="" selected>Select</option>
                                    @foreach($location as $loc)
                                        <option value="{{ $loc->regionid }}" {{  $ad->regionid == $loc->regionid ? 'selected' : '' }}>{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="location">{{ isset($error)? $error->first('location') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Employment type</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <select name="capacity" class="icons">
                                    <option value="" selected>Select</option>
                                    @foreach($capacity as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->capacity == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Year experienced</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <?php $exp = array('Less than one year', 'One year', 'Two years', 'Three years above'); ?>
                                <select name="yearexp" class="icons">
                                    <option value="" selected>Select</option>
                                    @foreach($exp as $key => $value)
                                        <option value="{{$key}}" {{ $ad->yearexp == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="yearexp">{{ isset($error)? $error->first('yearexp') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Education level</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                <select name="edlevel" class="icons">
                                    <option value="" selected>Select</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->edlevel == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Gender</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <?php $gender = array('Male', 'Female', 'Any'); ?>
                                <select name="gender" class="icons">
                                    <option value="" selected="">Select</option>
                                    @foreach($gender as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->gender == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="edlevel">{{ isset($error)? $error->first('gender') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Start date</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row">
                                    <div class="col s12 m12 l4">
                                        <select class="icons" name="year">
                                            <?php $date = explode('-', $ad->startdate); ?>
                                            <option value="" selected disabled>Year</option>
                                            <?php $count = 1 ?>
                                            @for($i = date('Y');20 > $count++; $i++)
                                                <option value="{{ $i }}" {{ $date[0] == $i ? 'selected' : '' }}> {{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label class="red-text" for="year">{{ isset($error)? $error->first('year') : '' }}</label>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <select class="icons" name="month">
                                            <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                            <option value="" selected disabled>Month</option>
                                            @foreach($month as $key => $value)
                                                <option value="{{ $key }}" {{ $date[1] == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <label class="red-text" for="month">{{ isset($error)? $error->first('month') : '' }}</label>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <select name="day"  class="icons">
                                            <option value="" selected disabled>Day</option>
                                            @for($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}" {{ $date[2] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label class="red-text" for="day">{{ isset($error)? $error->first('day') : '' }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Day off's</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row tab2">
                                    <input type="checkbox" class="filled-in" id="d1" name="off[]" value="0" {{ isset($dayof[0]) and $dayof[0] == 0 ? 'checked' : ''  }}  />
                                    <label for="d1">Sunday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d2" name="off[]" value="1" {{ isset($dayof[1]) and $dayof[1] == 1 ? 'checked' : ''  }} />
                                    <label for="d2">Monday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d3" name="off[]" value="2" {{ isset($dayof[2]) and $dayof[2] == 2 ? 'checked' : ''  }} />
                                    <label for="d3">Tuesday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d4" name="off[]" value="3" {{ isset($dayof[3]) and $dayof[3] == 3 ? 'checked' : ''  }} />
                                    <label for="d4">Wednesday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d5" name="off[]" value="4" {{ isset($dayof[4]) and $dayof[4] == 4 ? 'checked' : ''  }} />
                                    <label for="d5">Thursday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d6" name="off[]" value="5" {{ isset($dayof[5]) and $dayof[5] == 5 ? 'checked' : ''  }} />
                                    <label for="d6">Friday</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="d7" name="off[]" value="6" {{ isset($dayof[6]) and $dayof[6] == 6 ? 'checked' : ''  }} />
                                    <label for="d7">Saturday</label>
                                </div>
                                <div class="row">
                                    <label class="red-text" for="day">{{ isset($error)? $error->first('off') : '' }}</label>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Salary amount (pesos) </h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <input type="number" name="salary" placeholder="Amount" />
                                <label class="red-text" for="day">{{ isset($error)? $error->first('salary') : '' }}</label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Job ad description</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <textarea name="pitch"  placeholder="Write your job description here" style="height: 300px;" cols="20"></textarea>
                                <label class="red-text" for="day">{{ isset($error)? $error->first('pitch') : '' }}</label>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <h6 class="right-align">Expected duties</h6>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <?php
                                        $d = 1;
                                        $duties = Duties::where('jobtypeid', '=', $ad->jobtypeid)->get();
                                        ?>
                                        @foreach($duties as $duty)
                                            <input type="checkbox" class="filled-in" id="{{ $d }}" name="duty[]" value="{{ $duty->duties }}"/>
                                            <label for="{{ $d }}">{{ $duty->description }}</label>
                                            <br />
                                            <br />
                                            <?php $d++; ?>
                                        @endforeach
                                        <label class="red-text" for="location">{{ isset($error)? $error->first('duty') : '' }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <div class="row center">
                            <input type="submit" name="submit" value="Create and post ad" class="btn-large blue offset-2"/>
                            <a class="btn-large blue" href="{{ asset('/cancel-create') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    @parent
    <script>
        var input_count = 1;
        $(document).ready(function() {
            $('.add_desc').click(function(e) {
                e.preventDefault();
                if(input_count != 10) {
                    $('.job_desc').append('<tr><td><span class="orange-text">* </span></td><td> <input type="text" name="job_desc[]" placeholder="Write your job description here"/></td></tr>');
                    input_count ++;
                }
            });
        });
    </script>
@stop
