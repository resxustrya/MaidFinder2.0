

@extends('employer.layout')


@section('content')
    <div class="row">
        <span class="valign-wrapper">
            <h4>Your hired list</h4>
        </span>
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
                                        <a class="btn green recommend right-align" id="recomend">Recommend</a>
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
                               <span>Preffred location :</span>
                                <?php $loc = Regions::find($applications->regionid);?>
                               <strong class="tab2"> {{ $loc->location }} </strong>
                           </span>
                            <span class="valign-wrapper">
                               <i class="material-icons">label</i>
                               <span>Capacity :</span>
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <strong class="tab2">{{ $capacity[$applications->capacity] }}</strong>
                           </span>
                           <span class="valign-wrapper">
                               <i class="material-icons">label</i>
                               <span>Preffered salary :</span>
                                <?php $salary = Salaries::find($applications->salaryid);?>
                               <strong class="tab2">{{ $salary->amount_range }} - pesos</strong>
                           </span>
                                </div>
                            </div>
                            <br />
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <strong style="font-size: 1.2em;">Expected duties</strong>
                                    </div>
                                    <div class="row">
                                        <?php
                                            $app_skill = ApplicantSkills::find($applications->applicationid);
                                            if(isset($app_skill) and count($app_skill) > 0) {
                                                $duties = Duties::find($app_skill->dutyid);
                                            }
                                        ?>
                                        @if(isset($duties) and count($duties) > 0)
                                            @if($duties->cooking != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cooking }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->laundry != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->laundry }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->gardening != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->gardening }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->grocery != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->grocery }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->cleaning != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cleaning }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->tuturing != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->tuturing }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->driving != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->driving }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->pet != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->pet }}</strong>
                                                </div>
                                            @endif
                                            <p>

                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <br />
                            <div class="row">
                                @if($hire->accepted == 1)
                                    <div class="col s12 m12 l12">
                                        <span class="valign-wrapper center card-panel">
                                            <i class="material-icons">thumb_up</i>
                                            <strong class="tab1">Job request accepted</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <br />
                            <div class="row center">
                                <div class="valign-wrapper">
                                    @if($hire->status == 1)
                                        <a class="btn green" href="{{ asset('/employer/cancel/request/'.$hire->id) }}">Cancel Hire</a>
                                        <a class="btn green tab3" href="{{ asset('/employer/hire/delete/'.$hire->id) }}">Delete</a>
                                   @else
                                        <a class="btn green" href="{{ asset('/employer/resend/request/'.$hire->id) }}">Resend Hire</a>
                                        <a class="btn green tab3" href="{{ asset('/employer/hire/delete/'.$hire->id) }}">Delete</a>
                                   @endif
                                </div>
                            </div>
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
        <h6>Your hiredlist is empty.</h6>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12 l10">
                    <div class="card-panel">
                        <div class="valign-wrapper">
                            <i class="material-icons">new_releases</i>
                            <strong>Your don't have any job request for a moment. <a href="{{ asset('/helpers') }}">Browse for helpers now.</a> </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--modal -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="row">
            Recommend applicant to employer you know.
        </div>
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">textsms</i>
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">Autocomplete</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('.recommend').click(function(){
                $('#modal1').openModal();
            });
            $('#recomend').click(function() {
                var url = {{ "'". asset('/recomend/auto') . "'"}};
                $.get(url,function(response){
                    var res = JSON.parse(response);

                    $('input.autocomplete').autocomplete({

                    });
                });
            });
        });
    </script>
@stop


@section('css')

@stop
