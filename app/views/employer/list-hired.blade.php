
@extends('employer.layout')

@section('content')
    <div class="row">
        <h4>Hired applicant</h4>
    </div>
    @if($hirelist and count($hirelist))
        <div class="container-fluid">
            <div class="row" style="margin-top: 10px;">
                <div class="col s12 m12 l11">
                    @foreach($hirelist as $hire)
                        <?php $applicant = Applicants::find($hire->appid); ?>
                        <?php $applications = Applications::where('appid','=', $applicant->appid)->first(); ?>
                        @if($applications and count($applications) > 0)
                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                        <div class="valign-wrapper">
                                            <i class="material-icons">person_pin</i>
                                            <h5><span class="tab1">{{ $applicant->fname ." ". $applicant->lname }}</span> </h5>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l6">
                                        <h6 class="right-align">
                                            <button class="btn green" onclick="recommend({{$applicant->appid }},{{ $applications->jobtypeid }});">Recommend</button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <i class="material-icons">work</i>
                                        <?php $jobtype = JobTypes::find($applications->jobtypeid); ?>
                                        <strong class="tab1">Position : </strong>
                                        <strong class="tab2"> {{ $jobtype->description }}</strong>
                                    </div>
                                    <div class="valign-wrapper">
                                        <i class="material-icons">phone</i>
                                        <strong class="tab1">Mobile no.</strong>
                                        <strong class="tab1">{{ $applicant->contactno }}</strong>
                                    </div>
                                </div>
                                <br />
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="col s12 m12 l6">
                           <span class="valign-wrapper">
                               <i class="material-icons">location_on</i>
                               <span>Address :</span>
                               <?php $loc = Regions::find($applicant->regionid);?>
                               <strong class="tab2">({{ $loc->location }}) - {{ $applicant->address }} </strong>
                           </span>
                                    </div>
                                </div>
                                <br />

                                <div class="divider"></div>
                                <br />
                            </div>
                        @else
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <i class="material-icons">new_releases</i>
                                    <span class="tab2">{{ $applicant->fname  }} job application is currently not available. <strong class="tab2"><a href="{{ asset('/employer/remove/hirelist/'.$hire->id) }}">Remove</a></strong></span>
                                </div>
                            </div>
                        @endif
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="row">
                <ul class="pagination">
                    <?php echo $hirelist->links(); ?>
                </ul>
            </div>
        </div>
    @else
        <h5>No hired applicant yet.</h5>
    @endif
    <div id="rating_form" class="modal">
        <div class="modal-content">
            <div class="row center">
                <h5>Evaluate applicant for recommendations</h5>
            </div>
           <form action="{{ asset('/employer/applicant/rating') }}" method="POST">
               <input type="hidden" name="appid" value="" id="appid"/>
               <input type="hidden" name="jobtypeid" value="" id="jobtypeid" />
                <div class="row">
                    <table>
                        <tr>
                            <th></th>
                            <th>Exellent</th>
                            <th>Good</th>
                            <th>Satisfactory</th>
                            <th>Sometimes Unsatisfactory</th>
                            <th>Unsatisfactory</th>
                        </tr>
                        <tr>
                            <td>Reliable and punctual</td>
                            <td>
                                <input name="r1" type="radio" id="test1" value="5"/>
                                <label for="test1"></label>
                            </td>
                            <td>
                                <input name="r1" type="radio" id="test2" value="4"/>
                                <label for="test2"></label>
                            </td><td>
                                <input name="r1" type="radio" id="test3" value="3" />
                                <label for="test3"></label>
                            </td><td>
                                <input name="r1" type="radio" id="test4" value="2" />
                                <label for="test4"></label>
                            </td><td>
                                <input name="r1" type="radio" id="test5" value="1" />
                                <label for="test5"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Good work ethics</td>
                            <td>
                                <input name="r2" type="radio" id="test6" value="5"/>
                                <label for="test6"></label>
                            </td>
                            <td>
                                <input name="r2" type="radio" id="test7"  value="4"/>
                                <label for="test7"></label>
                            </td><td>
                                <input name="r2" type="radio" id="test8" value="3"/>
                                <label for="test8"></label>
                            </td><td>
                                <input name="r2" type="radio" id="test9" value="2"/>
                                <label for="test9"></label>
                            </td><td>
                                <input name="r2" type="radio" id="test10" value="1"/>
                                <label for="test10"></label>
                            </td>
                        </tr>
                         <tr>
                            <td>Flexibility</td>
                            <td>
                                <input name="r3" type="radio" id="test11" value="5"/>
                                <label for="test11"></label>
                            </td>
                            <td>
                                <input name="r3" type="radio" id="test12" value="4"/>
                                <label for="test12"></label>
                            </td><td>
                                <input name="r3" type="radio" id="test13" value="3"/>
                                <label for="test13"></label>
                            </td><td>
                                <input name="r3" type="radio" id="test14" value="2"/>
                                <label for="test14"></label>
                            </td><td>
                                <input name="r3" type="radio" id="test15" value="1"/>
                                <label for="test15"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Reliable and punctual</td>
                            <td>
                                <input name="r4" type="radio" id="test16" value="5"/>
                                <label for="test16"></label>
                            </td>
                            <td>
                                <input name="r4" type="radio" id="test17" value="4"/>
                                <label for="test17"></label>
                            </td><td>
                                <input name="r4" type="radio" id="test18" value="3"/>
                                <label for="test18"></label>
                            </td><td>
                                <input name="r4" type="radio" id="test19" value="2"/>
                                <label for="test19"></label>
                            </td><td>
                                <input name="r4" type="radio" id="test20" value="1"/>
                                <label for="test20"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Courteous</td>
                            <td>
                                <input name="r5" type="radio" id="test21" value="5"/>
                                <label for="test21"></label>
                            </td>
                            <td>
                                <input name="r5" type="radio" id="test22" value="4"/>
                                <label for="test22"></label>
                            </td><td>
                                <input name="r5" type="radio" id="test23" value="3"/>
                                <label for="test23"></label>
                            </td><td>
                                <input name="r5" type="radio" id="test24" value="2"/>
                                <label for="test24"></label>
                            </td><td>
                                <input name="r5" type="radio" id="test25" value="1"/>
                                <label for="test25"></label>
                            </td>
                        </tr>
                    </table>
                </div>
               <div class="row">
                   <div class="input-field col s12">
                       <textarea id="feedback" class="materialize-textarea" name="feedback"></textarea>
                       <label for="feedback">Write your feedback about this applicant</label>
                   </div>
               </div>
               <div class="row">
                   <input type="submit" class="btn blue" value="Submit evaluations" />
               </div>
           </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="btn yellow modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
        </div>
    </div>

@stop

@section('js')
    @parent
    <script>
        function recommend(a,b){
            alert(a + "," + b);
            $('#rating_form').width('100%').openModal();
            $('#appid').val(a);
            $('#jobtypeid').val(b);
        }
    </script>
@stop

@section('css')
    @parent
@stop