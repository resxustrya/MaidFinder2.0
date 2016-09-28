
@extends('applicant.layout')

@section('css')

@stop

@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif
    <?php
        if(Session::has('jobtype')) {
            $jobtype = Session::get('jobtype');
        }
    ?>

    <div class="row">
        <div class="col s12 m12 l7 offset-l2">
            <div class="row"><h6>&nbsp;</h6></div>
            <h4>Create job availability</h4>
            <div class="divider"></div>
            <br />
            <div class="card-panel">
                <form action="{{ asset('/applicant/create/application')}}" method="POST">
                    <input type="hidden" name="jobtypeid" value="{{ $jobtype }}" />
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right-align">Preferred location</h6>
                        </div>
                        <div class="col s12 m12 l8">
                            <?php $location = Regions::all(); ?>
                            <select name="location" class="browser-default">
                                <option value="" selected>Select</option>
                                @foreach($location as $loc)
                                    <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
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
                            <select name="capacity" class="browser-default">
                                <option value="" disabled selected>Select</option>
                                @foreach($capacity as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach    
                            </select>
                            <label class="red-text" for="location">{{ isset($error)? $error->first('capacity') : '' }}</label>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right-align">Education level</h6>
                        </div>
                        <div class="col s12 m12 l8">
                            <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                            <select name="edlevel" class="browser-default">
                                <option value="" selected>Select</option>
                                @foreach($edlevel as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right-align">Year experienced</h6>
                        </div>
                        <div class="col s12 m12 l8">
                            <?php $exp = array('Less than one year', 'One year', 'Two years', 'Three years above'); ?>
                            <select name="yearexp" class="browser-default">
                                <option value="" selected>Select</option>
                                @foreach($exp as $key => $value)
                                    <option value="{{$key}}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="yearexp">{{ isset($error)? $error->first('yearexp') : '' }}</label>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right-align">Preferred dayoff's</h6>
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
                            <h6 class="right-align">Preferred salary amount (pesos) </h6>
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
                    <br />
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right-align">Performed duties</h6>
                        </div>
                        <div class="col s12 m12 l8">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <?php
                                    $d = 1;

                                    $duties = Duties::where('jobtypeid', '=', $jobtype)->get();
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
                        <input type="submit" name="submit" value="Create and post job" class="btn-large blue offset-2"/>
                        <a class="btn-large blue" href="{{ asset('/cancel-create') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
