
@extends('applicant.layout')

@section('content')
    <div class="row">
        <h4>Your ad shortlist</h4>
    </div>
    @if(isset($shortlist) and count($shortlist) > 0)
        <div class="row">
            @foreach($shortlist as $list)
                <?php $ad = Ads::where('empid', '=', $list->empid)->first(); ?>
                @if(isset($ad) and count($ad) > 0)
                    <?php $emp = Employers::find($ad->empid); ?>
                        <div class="col s12 m12 l11" style="margin-top: 20px;">
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <?php $job = JobTypes::find($ad->jobtypeid); ?>
                                    <h5>{{ $emp->fname ." ".$emp->lname }}<span class="tab1">{{ $job->description }}</span> </h5>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <strong style="font-size: 1.2em;">Job description :</strong>
                                    <br />
                                    <span class="">{{ $ad->pitch }}</span>
                                </div>
                                <br />
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l6">

                               <span class="valign-wrapper">
                                   <i class="material-icons">location_on</i>
                                   <span>Preffred location :</span>
                                   <?php $loc = Regions::find($ad->regionid); ?>
                                   <strong class="tab2">{{ $loc->location }}</strong>
                               </span>
                                <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Capacity :</span>
                                    <?php $capacity = array('Full Time', 'Part Time'); ?>
                                    <strong class="tab2">{{ $capacity[$ad->capacity] }}</strong>
                               </span>
                               <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Salary :</span>
                                   <strong class="tab2">{{ $ad->salaryid }} - Pesos</strong>
                               </span>
                               <span class="valign-wrapper">
                                   <i class="material-icons">label</i>
                                   <span>Startdate :</span>
                                   <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                   <?php $startdate = explode('-', $ad->startdate); ?>
                                   <strong class="tab2">{{  $month[$startdate[1]].'/' . $startdate[2] .'/' . $startdate[0] }}</strong>
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
                                            <?php $duty = ExpDuties::where('adid' , '=', $ad->adid)->get(); ?>
                                            @if(isset($duty) and count($duty) > 0)
                                                <ul>
                                                    @foreach($duty as $d)
                                                        <li class="valign-wrapper">
                                                            <i class="material-icons">label</i>
                                                            <?php $a = Duties::find($d->duties); ?>
                                                            <span class="tab1"> {{ $a->description }}</span>
                                                        </li>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <br />
                                <div class="row">
                                    <div class="valign-wrapper">
                                        <span>Date posted - </span>
                                        <?php
                                        $date = date('Y-m-d',strtotime($ad->created_at));
                                        $date = explode("-" ,$date);

                                        $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");
                                        $month = str_replace('0', '', $date[1]);
                                        $month = $months[$month];
                                        $year = $date[0];
                                        $day = $date[2];
                                        ?>
                                        <strong class="tab1">{{ $month ."-" . $day ."-" .$year }}</strong>
                                    </div>
                                    <br />
                                    <div class="row center">
                                        <button class="btn green" onclick="apply_add({{ $ad->adid }}, {{ $emp->empid }},{{ $list->listid }});">Apply job</button>
                                        <a href="{{ asset('/applicant/shortlist/remove/'.$list->listid) }}" class="btn green">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @else
                    <div class="row">
                        <div class="col s12 m12 l10">
                            <div class="card-panel">
                                <div class="valign-wrapper">
                                    <i class="material-icons">info</i>
                                    <strong class="tab1">Sorry but the job is currently not available. The employer might removed the ad.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <ul class="pagination">
                <?php echo $shortlist->links() ;?>
            </ul>
        </div>
    @else
        <h6>Your shorlist is empty.</h6>
    @endif
    <!--MODAL -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <div class="message container-fluid">
                    <h5 class="center-align grey-text">Make a short story for your job application</h5>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="cols 12 m12 l20">
                            <form action="{{ asset('/applicant/shortlist/apply') }}" class="pitch" method="POST">
                                <input type="hidden" name="adid" value="" id="addid" />
                                <input type="hidden" name="empid" value="" id="empid" />
                                <input type="hidden" name="listid" value="" id="listid" />
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea pitch-msg" rows="20" name="pitch-msg"></textarea>
                                    <label for="textarea1" class="grey-text">Tell your employer about yourself and why should they hire you.</label>
                                </div>
                                <label for="textarea1" class="error red-text"></label>
                                <div class="row center-align">
                                    <div class="col s12 m12 l12">
                                        <input type="submit" class="btn green" name="submit" value="Submit application" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="btn yellow darken-1 modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            </div>
        </div>
@stop

@section('css')

@stop

@section('js')
    @parent
    <script>
        function apply_add(a, b,c) {
            $('#modal1').openModal();
            $('#addid').val(a);
            $('#empid').val(b);
            $('#listid').val(c);
        }
    </script>
@stop