
@extends('applicant.layout')

@section('css')

@stop

@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif

    <div class="row">
        <div class="col s12 m12 l7 offset-l2">
            <div class="row"><h6>&nbsp;</h6></div>
            <h4>Create job availability</h4>
            <div class="divider"></div>
            <br />
            <div class="card-panel">
                <form action="{{ asset('/create/job/')}}" method="POST">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <h6 class="right=align"></h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <h4>Create job availability</h4>
    </div>
    <div class="row">
        <div class="col s12 m12 l10">
            <div class="card-panel">
                <form action="{{ asset('/applicant/create/application') }}" method="POST">
                    <div class="row">
                        <p><strong class="title">Basic job info</strong></p>
                        <div class="col s12 m12 l4">
                            <label for="location">Preferred location</label>
                            <select name="location" class="browser-default">
                                <?php $location = Regions::all(); ?>
                                <option value="" selected disabled>Preffered location</option>
                                @foreach($location as $loc)
                                    <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="location">{{ isset($error)? $error->first('location') : '' }}</label>
                        </div>
                        <div class="col s12 m12 l4">
                            <label for="jobtype">Position</label>
                            <select name="jobtype" class="browser-default">
                                <?php $jobtype = JobTypes::all(); ?>
                                <option value="" selected disabled>Position</option>
                                @foreach($jobtype as $job)
                                    <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="jobtype">{{ isset($error)? $error->first('position') : '' }}</label>
                        </div>
                        <div class="col s12 m12 l4">
                            <label for="salary">Preferred salary</label>
                            
                                <input type="text" name="salary" />
                            <label class="red-text" for="salary">{{ isset($error)? $error->first('salary') : '' }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                            <label for="capacity">Capacity</label>
                            <select name="capacity" class="browser-default">
                                <option value="" selected disabled>Capacity</option>
                                @foreach($capacity as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                        </div>
                        <div class="col s12 m12 l4">
                            <label for="edlevel">Education level</label>
                            <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                            <select name="edlevel" class="browser-default">
                                <option value="" selected disabled>Eduction level</option>
                                @foreach($edlevel as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday'); ?>
                            <label for="dayof">Preferred day off</label>
                            <select name="dayof" class="browser-default">
                                <option value="" disabled selected >Day off</option>
                                @foreach($days as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <label class="red-text" for="dayof">{{ isset($error)? $error->first('dayof') : '' }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-panel">
                            <strong>Supply your job application with relevant details, experiences skills and other good information about so you can catch up employers eye and get a job.  </strong>
                        </div>
                        <div class="col s12 m12 l12">
                            <textarea name="pitch"  placeholder ="Tell the employer why you are best suited for this role. Highlight specific skills and how you can contribute." style="height: 150px;" cols="20"></textarea>
                            <label class="red-text" for="dayof">{{ isset($error)? $error->first('pitch') : '' }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="row">
                                <div class="col s12 m12 l3">
                                    <p><strong class="title">Perfurmed duties</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l2"></div>
                                <div class="col s12 m12 l6">
                                    <table border="0" class="other_duties">
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="test5" name="cooking" value="Cooking"/>
                                                <label for="test5">Cooking</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="test6" name="laundry" value="Laundry"/>
                                                <label for="test6">Laundry</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="test7" name="gardening" value="gardening"/>
                                                <label for="test7">Gardening</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="test8" name="grocery" value="Grocery"/>
                                                <label for="test8">Grocery</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="test9" name="cleaning" value="House Cleaning"/>
                                                <label for="test9">House cleaning</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="test10" name="tutoring" value="Tutoring"/>
                                                <label for="test10">Tutoring</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="test11" name="driving" value="Driving" />
                                                <label for="test11">Driving</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="test12" name="pet" value="Pet Care"/>
                                                <label for="test12">Pet Care</label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <h1></h1>
                                    <div class="col s12 m12 l12">
                                        <p class="center-align">
                                            <button class="btn-large waves-effect light-blue darken-2" type="submit" name="action">Create job application
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop