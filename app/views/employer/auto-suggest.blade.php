

<div class="row">
    @if(count($ads) > 0)
        <div class="row">
            <h5>Job ad auto suggest</h5>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12 l12">
                    <?php
                    $count = 1;
                    $applications = Applications::where('jobtypeid', '=', $ad->jobtypeid)
                            ->Where('deleted_at' ,'=', NULL)
                            ->orWhere('regionid', '=', $ad->regionid)
                            ->orWhere('salaryid', '=', $ad->salaryid)
                            ->orWhere('yearexp', '=', $ad->yearexp)
                            ->orderBy('applicationid', 'DESC')
                            ->get();
                    ?>
                    <?php foreach($applications as $app) : ?>
                    <?php
                    $location = Regions::find($app->regionid);
                    $applicant = Applicants::find($app->appid);
                    $jobtype = JobTypes::find($app->jobtypeid);
                    ?>

                    <div class="col s12 m6 l4 hoverable ">
                        <a href="{{ asset('application/view/'. $app->applicationid) }}" class="grey-text">
                            <div class="card-panel" style="padding: 3px;">
                                <div class="row">
                                    <div class="profile-img col s12 m12 l4">
                                        <div class="center-align" style="padding-top: 10px;">

                                        </div>
                                    </div>
                                    <div class="col s12 m12 l6">
                                        <p>
                                        <table class="black-text info">
                                            <tr>
                                                <td><i class="material-icons">perm_identity</i></td>
                                                <td><span class="name">{{ $applicant->fname }}</span> </td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">room</i> </td>
                                                <td>{{ $location->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="material-icons">work</i> </td>
                                                <td>{{ $jobtype->description }}</td>
                                            </tr>
                                        </table>
                                        </p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                        <p>
                                            <a href="{{ asset('application/view/'. $app->applicationid) }}">View helper profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $count++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    @endif
</div>