<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

/**
 * Description of ApplicantController
 *
 * @author Hp
 */
class ApplicantController extends BaseController {

    private $app;
    public function __construct() {

        $this->beforeFilter(function () {
            if (!Session::has('applicant')) {
                return Redirect::to('user-login');
            }
        });

        if(Session::has('applicant')) {
            $this->app = Applicants::find(Session::get('applicant')->appid);
        }
    }

    public function applicant_home() {
        $application = Applications::where('appid', '=', $this->app->appid)
                                    ->orderBy('created_at' ,'DESC')
                                    ->paginate(1);
        $match = DB::table('ad')
            ->join('application', function($join){
                $join->on('ad.jobtypeid', '=','application.jobtypeid')
                    ->where('application.appid', '=', $this->app->appid);
            })->paginate('6');
        return View::make('applicant.home')
                        ->with('app', $this->app)
                        ->with('ads', $match)
                        ->with('application', $application);
    }
    public function applicant_profile() {
        Session::flash('url',1);
        return View::make('applicant.profile')
                    ->with('app', $this->app)
                    ->with('location', Regions::find($this->app->regionid));
    }
    public function update_profile() {
        Session::flash('url', 1);
      return View::make('applicant.update')
                        ->with('app', $this->app)
                        ->with('location', Regions::all());
    }
    
    public function handle_update() {
       Session::flash('url',1);
      $app = Applicants::find(Session::get('applicant')->appid);

        $app->fname = Input::get('fname');
        $app->lname = Input::get('lname');
        $app->address = Input::get('address');
        $app->birth = Input::get('year')."-".Input::get('month')."-".Input::get('day');
        $app->gender = Input::get('gender');
        $app->religion = Input::get('religion');
        $app->civilstatus = Input::get('civilstatus');
        $app->contactno = Input::get('contactno');
        $app->nationality = Input::get('nationality');
        $app->pitch = Input::get('pitch');
        $app->regionid = Input::get('location');

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->app->email.$filename);
            $app->profilepic = $this->app->email.$filename;
        }
        $app->save();
        return Redirect::to('applicant/profile')
                        ->with('message','Profile updated.');
    }

    public function change_picture() {
        Session::flash('url', 1);    
        $app = Applicants::find($this->app->appid);

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->app->email.$filename);
            $app->profilepic = $this->app->email.$filename;
            $app->save();

            return Redirect::to('/applicant/profile')->with('message','Profile picture changed.');
        }
    }
    public function job_application() {
      Session::flash('url',2);
      $application = Applications::where('appid', '=', $this->app->appid)
                                ->orderBy('created_at', 'DESC')
                                ->paginate(2);
      return View::make('applicant.job-application')
                  ->with('app', $this->app)
                  ->with('application', $application);
    }
    public function profile_application() {
        Session::flash('url',1);
        $application = Applications::where('appid','=', $this->app->appid)->first();
        return View::make('applicant.profile')
            ->with('app', $this->app)
            ->with('application', $application)
            ->with('location', Regions::find($this->app->regionid));
    }
    public function application_update($id) {
        Session::flash('url',2);
        $application = Applications::find($id);
        $skills = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $duties = Duties::find($skills->dutyid);
        return View::make('applicant.application-update')
                    ->with('app', $this->app)
                    ->with('location', Regions::all())
                    ->with('jobtype', JobTypes::all())
                    ->with('application', $application)
                    ->with('skills', $skills)
                    ->with('salary', Salaries::all())
                    ->with('duties', $duties);
    }
    public function application_delete($id) {
        Session::flash('url',2);
        $application = Applications::find($id);
        $application->delete();
        return Redirect::to('/applicant/profile')->with('message', 'Job application deleted');
    }
    public function handle_application_update() {
        Session::flash('url',2);    
        $application = Applications::find(Input::get('applicationid'));

        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'pitch' => Input::get('pitch')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'dayof' => 'required',
            'pitch' => 'required'
        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'pitch.required' => 'Pitch must not be empty'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/applicant/job/application/edit/'. Input::get('applicationid'))
                ->with('error', $messages)
                ->with('message','Your job application is not created');
        }


        $application->regionid = Input::get('location');
        $application->capacity = Input::get('capacity');
        $application->salaryid =Input::get('salary');
        $application->dayof = Input::get('dayof');
        $application->edlevel = Input::get('edlevel');
        $application->jobtypeid = Input::get('jobtype');
        $application->pitch = Input::get('pitch');
        $application->save();

        $app_skill = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $duties = Duties::find($app_skill->dutyid);

        $duties->cooking = Input::has('cooking') ? Input::get('cooking') : null;
        $duties->laundry = Input::has('laundry') ? Input::get('laundry') : null;
        $duties->gardening = Input::has('gardening') ?Input::get('gardening') : null;
        $duties->grocery = Input::has('grocery') ? Input::get('grocery') : null;
        $duties->cleaning = Input::has('cleaning') ? Input::get('cleaning') : null;
        $duties->tuturing = Input::has('tutoring') ? Input::get('tutoring') : null;
        $duties->driving = Input::has('driving') ? Input::get('driving') : null;
        $duties->pet = Input::has('pet') ? Input::get('pet') : null;
        $duties->other = Input::has('other') ? Input::get('other') : null;
        $duties->save();


        return Redirect::to('applicant/profile')
                        ->with('message', 'Job application updated');
    }
    public function jobtype() {
        Session::flash('url',2);
        return View::make('applicant.jobtype')
                        ->with('app', $this->app);
    }
    public function create_job() {
    
        $type = Input::get('jobtype');
        return View::make('applicant.create-application')
                        ->with('app', $this->app)
                        ->with('jobtype', $type);
    }
    public function handle_application() {

        $temp = array (
            'location' => Input::get('location'),
            'edlevel' => Input::get('edlevel'),
            'yearexp' => Input::get('yearexp'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'pitch' => Input::get('pitch'),
            'off' => Input::get('off'),
            'duty' => Input::get('duty')
        );

        $rules = array(
            'location' => 'required',
            'edlevel' => 'required',
            'yearexp' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'pitch' => 'required',
            'off' => 'required',
            'duty' => 'required'
        );
        $messages = array(
            'location.required' => 'Select a location',
            'edlevel.required' => 'Select education level',
            'yearexp.required' => 'Select year experience',
            'salary.required' => 'Enter your preferred salary',
            'capacity.required' => 'Select employment type',
            'pitch.required' => 'Enter your job description',
            'off.required' => 'Chose your preferred dayoff',
            'duty.required' => 'Chose your performed duties'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/applicant/crate/job')
                ->with('error', $messages)
                ->with('jobtype', Input::get('jobtypeid'))
                ->with('message','Your job application is not created');
        }

        $application = new Applications();
        $application->appid = $this->app->appid;
        $application->salaryid = Input::get('salary');
        $application->jobtypeid = Input::get('jobtypeid');
        $application->capacity = Input::get('capacity');
        $application->dayof = implode(',', Input::get('off'));
        $application->yearexp = Input::get('yearexp');
        $application->edlevel = Input::get('edlevel');
        $application->regionid = Input::get('location');
        $application->pitch = Input::get('pitch');
        $application->save();

        foreach(Input::get('duty') as $duty) {
            $d = new AppDuties();
            $d->applicationid = $application->applicationid;
            $d->duties = $duty;
            $d->save();
        }

        return Redirect::to('/applicant/applications/list')
                        ->with('message', 'Job application created. Your job application is now published into the employers helpers matching.');
    }
    public function employer_ads() {
        
        $match = DB::table('ad')
            ->join('application', function($join){
                $join->on('ad.jobtypeid', '=', 'application.jobtypeid')
                    ->where('application.appid', '=', 3);
            })->paginate(2);

        return View::make('ads.ads')
                    ->with('ads', $match)
                    ->with('app', $this->app)
                    ->with('ad_count', count($match));
    }

    public function search_ads() {

        if(Session::has('input_search') and !Input::has('search')) {
            $input = Session::get('input_search');
            $ads = Ads::where('deleted_at' ,'=', NULL)
                ->where('jobtypeid', '=',  $input['jobtype'] )
                ->where('regionid', '=', $input['location'] )
                ->where('capacity', '=', $input['capacity'])
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
            return View::make('ads.ads')
                ->with('app', $this->app)
                ->with('ads', $ads)
                ->with('ad_count', count($ads));
        }
        $input = Input::all();
        Session::put('input_search', $input);
        $ads = Ads::where('deleted_at' ,'=', NULL)
            ->where('jobtypeid', 'LIKE', "%". $input['jobtype'] ."%")
            ->where('regionid', 'LIKE', "%" . $input['location'] ."%")
            ->orderBy('created_at', 'DESC')
            ->paginate(2);
        return View::make('ads.ads')
            ->with('app', $this->app)
            ->with('ads', $ads)
            ->with('ad_count', count($ads));
    }

    public function emp_ad_profile($id) {
        $application = Applications::where('appid', '=', $this->app->appid)->get();
        if(isset($application) and count($application) > 0) {
            $ad = Ads::find($id);
            $profile = Employers::find($ad->empid);
            $location = Regions::find($ad->regionid);
            $jobtype = JobTypes::find($ad->jobtypeid);
            $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
            $edlevel = array("Elementary", "High School", "College graduate");
            $duties = Duties::where('adid', '=', $ad->adid)->first();
            $salary = Salaries::find($ad->salaryid);
            $bdate = explode('-', $profile->bdate);
            $age = date('Y') - $bdate[0];
            $job_desc = AdDesc::where('adid', '=', $ad->adid)->get();
            return View::make('ads.employer-ads-profile')
                ->with('app', $this->app)
                ->with('emp', $profile)
                ->with('location', $location)
                ->with('ads',$ad)
                ->with('age', $age)
                ->with('salary', $salary)
                ->with('jobtype', $jobtype)
                ->with('dayof', $dayof[$ad['dayof']])
                ->with('edlevel' ,$edlevel[$ad['edlevel']])
                ->with('duties', $duties)
                ->with('job_desc', $job_desc);
        }
        return Redirect::to('/applicant/create/application')
                            ->with('message', 'You haven\'t created your job availability yet.');

    }
    public function apply_ad() {
       
        $apply = new ApplyAds();
        $apply->adid = Input::get('adid');
        $apply->message = Input::get('pitch-message');
        $apply->empid = Input::get('empid');
        $apply->appid = $this->app->appid;
        $apply->save();

        return "ok";
    }
    public function message() {
        return View::make('applicant.message')
                    ->with('app', $this->app);
    }
    public function add_shortlist() {
      Session::flash('url', 5);  
      $list = AppShortList::where('appid', '=', Input::get('appid'))
                            ->where('empid', '=', Input::get('empid'))
                            ->first();
      if(isset($list) and count($list) > 0) {
          return json_encode(array('status' => 'ok'));
      } else {
        $shortlist = new AppShortList();
        $shortlist->appid = Input::get('appid');
        $shortlist->empid = Input::get('empid');
        $shortlist->save();
      }

      return json_encode(array('status' => 'ok'));
    }
    public function hired_job() {
        Session::flash('url',4);
        $hirelist =   $hirelist = HireLists::where('appid', '=', $this->app->appid)
                                    ->where('accepted', '=', 1)
                                    ->paginate(5);

        return View::make('applicant.hired-job')
                        ->with('app', $this->app)
                        ->with('hirelist' ,$hirelist);
    }
    public function remove_shortlist($id) {
        Session::flash('url',5);
        $list = AppShortList::find($id);
        $list->delete();
        return Redirect::to('/applicant/shortlist')->with('message', "Ad shortlist removed");
    }
    public function shortlist() {
        Session::flash('url',5);
        $shortlist = AppShortList::where('appid', '=', $this->app->appid)
                                ->orderBy('created_at' ,'DESC')
                                ->paginate(1);
        return View::make('applicant.shortlist')
                    ->with('app', $this->app)
                    ->with('shortlist', $shortlist);
    }
    public function job_request() {
        Session::flash('url',6);
        $hirelist = HireLists::where('appid', '=', $this->app->appid)
                                ->where('accepted', '=', 0)
                                ->paginate(5);
        return View::make('applicant.job-request')
                        ->with('app', $this->app)
                        ->with('hirelist',$hirelist);
    }
    public function accept_job_request($id) {
        Session::flash('url',6);
        $hirelist = HireLists::find($id);
        $hirelist->accepted = 1;
        $hirelist->save();
        return Redirect::to('/hired/job')
                        ->with('message','Job request accepted');
    }
    public function cancel_job_request($id) {
        Session::flash('url',6);
        $hirelist = HireLists::find($id);
        $hirelist->accepted = 0;
        $hirelist->save();
        return Redirect::to('/applicant/employer/job/request')
                        ->with('message','Job request canceled');

    }
    public function nbi() {
        Session::flash('url',1);
        if(Input::hasFile('nbi')) {
            $user = Applicants::find(Input::get('appid'));
            $filename = \Illuminate\Support\Facades\Input::file('nbi')->getClientOriginalName();
            $path = base_path() . '/public/uploads/nbi/';
            Input::file('nbi')->move($path, $user->email . $filename);
            $user->nbi = $user->email . $filename;
            $user->save();
            return Redirect::to('/applicant/profile');
        }
    }
    public function applications_list() {
        Session::flash('url',3);
        $apply_ad = ApplyAds::where('appid', '=', $this->app->appid)->get();
        return View::make('applicant.apply_ads')
                    ->with('apply_ad', $apply_ad)
                    ->with('app',$this->app);
    }
    public function applicant_logout() {
        session_start();
        session_destroy();
       Session::forget('applicant');
       Session::flush();
       return Redirect::to('/');
    }
}
