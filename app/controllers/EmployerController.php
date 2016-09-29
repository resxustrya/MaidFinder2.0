


<?php

class EmployerController extends BaseController {

    private $emp;
    public function __construct() {


        $this->beforeFilter(function () {
            if (!Session::has('employer')) {
                return Redirect::to('user-login');
            }
        });
        if(Session::has('employer')) {
            $this->emp = Employers::find(Session::get('employer')->empid);
        }
    }

    public function employer_home() {
        $ads = Ads::where('empid', '=', $this->emp->empid)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(1);
        $applications = DB::table('application')
                       ->join('ad', function($join){
                           $join->on('application.jobtypeid', '=','ad.jobtypeid')
                                   ->where('ad.empid', '=', $this->emp->empid);
                       })->paginate('12');
      return View::make('employer.home')
                    ->with('emp', $this->emp)
                    ->with('ads',$ads)
                    ->with('applications', $applications);
    }
    public function employer_profile() {
        Session::flash('url',5);
        $location = Regions::where('regionid', '=',$this->emp->regionid)->first();
        $ads = Ads::where('empid', '=', $this->emp->empid)->first();

        return View::make('employer.profile')
                        ->with('emp',$this->emp)
                        ->with('location', $location)
                        ->with('ads', $ads);
    }
    public function update_profile() {
        Session::flash('url', 5);
        $region = Regions::all();
      return View::make('employer.update')
                    ->with('emp', $this->emp)
                    ->with('location', $region);
    }
    public function change_picture() {
        $emp = Employers::find($this->emp->empid);

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->emp->email.$filename);
            $emp->profilepic = $this->emp->email.$filename;
            $emp->save();

            return Redirect::to('/employer/profile')->with('message', 'Profile picture changed.');
        }
    }
    public function handle_update() {
        Session::flash('url', 5);
        $emp = Employers::find($this->emp->empid);
        $emp->fname = Input::get('fname');
        $emp->lname = Input::get('lname');
        $emp->address = Input::get('address');
        $emp->bdate = Input::get('year')."-".Input::get('month')."-".Input::get('day');
        $emp->gender = Input::get('gender');
        $emp->religion = Input::get('religion');
        $emp->civilstatus = Input::get('civilstatus');
        $emp->nationality = Input::get('nationality');
        $emp->regionid = Input::get('location');

        $emp->save();

        return Redirect::to('employer/profile')
                        ->with('message', 'Profile updated.');
    }
    public function job_ads() {
        Session::flash('url',4);

        $ads = Ads::where('empid', '=', $this->emp->empid)
                    ->orderBy('created_at','DESC')
                    ->paginate(1);
        if(isset($ads) and count($ads) >0) {
            return View::make('employer.ads')
                        ->with('emp', $this->emp)
                        ->with('ads', $ads);
        }
        return Redirect::to('employer/ad/helper/type');
    }
    public function jobtype() {
        Session::flash('url',4 );
        $jobtype = JobTypes::all();
        return View::make('employer.jobtype')
                    ->with('emp', $this->emp)
                    ->with('jobtype', $jobtype);
    }
    public function handle_jobtype() {
        Session::flash('url', 4);
        $type = Input::get('jobtype');
        $location = Regions::all();
        return View::make('employer.create-ad')
                    ->with('emp', $this->emp)
                    ->with('jobtype', $type)
                    ->with('location', $location)
                    ->with('salary', Salaries::all());
    }
   
    public function new_ads() {

        $temp = array (
            'position' => Input::get('position'),
            'location' => Input::get('location'),
            'capacity' => Input::get('yearexp'),
            'edlevel' => Input::get('edlevel'),
            'yearexp' => Input::get('yearexp'),
            'gender' => Input::get('gender'),
            'year' => Input::get('year'),
            'month' => Input::get('month'),
            'day' => Input::get('day'),
            'off' => Input::get('off'),
            'salary' => Input::get('salary'),
            'pitch' => Input::get('pitch'),
            'duty' => Input::get('duty')
        );

        $rules = array(
           'position' => 'required',
           'location' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'yearexp' => 'required',
            'gender' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'off' => 'required',
            'salary' => 'required',
            'pitch' => 'required',
            'duty' => 'required'
        );
        $messages = array(
            'position.required' => 'Select position',
            'location.required' => 'Select location',
            'capacity.required' => 'Select capacity',
            'yearexp.required' => 'Select year experience',
            'edlevel.required' => 'Select education level',
            'gender.required' => 'Select gender',
            'year.required' => 'Select a year',
            'month.required' => 'Select a month',
            'day.required' => 'Select a day',
            'off.required' => 'Select dayoff\'s',
            'salary.required' => 'Enter a salary',
            'pitch.required' => 'Enter your job description',
            'duty.required' => 'Select at least one duty'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
           $messages = $validator->messages();
            return Redirect::to('/employer/create/ad')
                            ->with('error', $messages)
                            ->with('jobtype', Input::get('position'))
                            ->with('message','Your ad is not created');
        }

        $ads = new Ads();
        $ads->empid = $this->emp->empid;
        $ads->startdate = Input::get('year') .'-' . Input::get('month') .'-' .Input::get('day');
        $ads->jobtypeid = Input::get('position');
        $ads->regionid = Input::get('location');
        $ads->capacity = Input::get('capacity');
        $ads->pitch = Input::get('pitch');
        $ads->gender = Input::get('gender');
        $ads->dayof = implode(',' ,Input::get('off'));
        $ads->gender = Input::get('gender');
        $ads->yearexp = Input::get('yearexp');
        $ads->edlevel = Input::get('edlevel');
        $ads->salaryid = Input::get('salary');
        $ads->save();

        if(Input::has('duty')) {
            foreach(Input::get('duty') as $d) {
                $duty = new ExpDuties();
                $duty->adid = $ads->adid;
                $duty->duties = $d;
                $duty->save();
            }
        }

        return Redirect::to('employer/ads')
                        ->with('message','New job ad created');

    }
    public function delete($id) {
        Session::flash('url', 4);
        $ad = Ads::find($id);
        $ad->delete();
        return Redirect::to('/employer/ads')
                        ->with('message','Job ad was deleted.');
    }
    public function update_ads($id) {
        Session::flash('url', 4);
        $ad = Ads::where('adid','=', $id)->first();
        return View::make('employer.update-ad')
                    ->with('emp', $this->emp)
                    ->with('ad', $ad);
    }
    public function handle_ad_update() {
        Session::flash('url', 4);
        $input = Input::all();

        $ads = Ads::find(Input::get('adid'));
        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'yearexp' => Input::get('yearexp'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'month' => Input::get('month'),
            'pitch' => Input::get('pitch'),
            'day' => Input::get('day'),
            'year' => Input::get('year')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'yearexp' => 'required',
            'dayof' => 'required',
            'month' => 'required',
            'year' => 'required',
            'day' => 'required',
            'pitch' => 'required'

        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'yearexp.required' => 'Chose experience',
            'month.required' => 'Chose a month',
            'year.required' => 'Chose a year',
            'day.required' => 'Chose a day',
            'pitch.required' => 'Cant be blank'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
           $messages = $validator->messages();
            return Redirect::to('/employer/ad/edit/'.$ads->adid)
                            ->with('error', $messages)
                            ->with('input', $input)
                            ->with('message','Your ad was not updated');
        }

        $ads->regionid = Input::get('location');
        $ads->startdate = Input::get('year') .'-' . Input::get('month') .'-' .Input::get('day');
        $ads->capacity = Input::get('capacity');
        $ads->salaryid =Input::get('salary');
        $ads->gender = Input::get('gender');
        $ads->yearexp = Input::get('yearexp');
        $ads->dayof = Input::get('dayof');
        $ads->edlevel = Input::get('edlevel');
        $ads->jobtypeid = Input::get('jobtype');
        $ads->pitch = Input::get('pitch');
        $ads->save();




        return Redirect::to('employer/ads')
                        ->with('update_ad','Your job ad is updated.');

    }
    public function list_hired() {
        Session::flash('url', 7);
        $hirelist = HireLists::where('empid', '=', $this->emp->empid)
                            ->where('accepted','=', 1)
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);
        return View::make('employer.list-hired')
                        ->with('emp', $this->emp)
                        ->with('hirelist', $hirelist);
    }
    public function helpers() {
        $application = Applications::paginate(20);
        if(! $this->emp->subscribe) {
            return View::make('helpers.helpers')
                            ->with('emp', $this->emp)
                            ->with('application', $application)
                            ->with('locations', Regions::all())
                            ->with('jobtypes', JobTypes::all())
                            ->with('salary', Salaries::all());
        }
        return View::make('helpers.subscribed.helpers')
                        ->with('emp', $this->emp)
                        ->with('application', $application)
                        ->with('locations', Regions::all())
                        ->with('jobtypes', JobTypes::all())
                        ->with('salary', Salaries::all());
    }
    public function applicant_ad_profile($id) {

        $application = Applications::find($id);
        $applicant = Applicants::find($application->appid);
        $location = Regions::find($application->regionid);
        $jobtype = JobTypes::find($application->jobtypeid);
        $app_skill = ApplicantSkills::where('appid', '=', $application->appid)->first();
        $duties = Duties::find($app_skill->dutyid);

        return View::make('helpers.subscribed.applicant-application')
                        ->with('emp', $this->emp)
                        ->with('application', $application)
                        ->with('jobtype', $jobtype->description)
                        ->with('location', $location)
                        ->with('duties', $duties)
                        ->with('applicant', $applicant);

    }
    public function message_inbox() {
        return View::make('employer.message-inbox')->with('emp', $this->emp);
    }
    public function remove_request($id) {
        $a = ApplyAds::find($id);
        $a->delete();
        return Redirect::to('/employer/job/request')->with('message','Job request removed.');
    }
    public function job_request() {
        Session::flash('url', 3);
        $apply_ad = ApplyAds::where('empid', '=', $this->emp->empid)->get();

        return View::make('employer.job-request')
                    ->with('apply_ad',$apply_ad)
                    ->with('emp', $this->emp);
    }

    public function shortlist() {
        Session::flash('url',2);
        $shortlist = EmpShortLists::where('empid', '=', $this->emp->empid)->paginate(10);
        return View::make('employer.shortlist')
                        ->with('emp',$this->emp)
                        ->with('shortlist',$shortlist);
    }
    public function shortlist_hire($id) {

        $hirelist = new HireLists();
        $hirelist->empid = $this->emp->empid;
        $hirelist->appid = $id;
        $hirelist->status = 1;
        $hirelist->accepted = 1;
        $hirelist->message = "";
        $hirelist->save();

        $shortlist = EmpShortLists::where('appid', '=', $id);
        $shortlist->delete();
        return Redirect::to('/employer/hired/list')->with('message', 'Applicant successfully hired');
    }
    public function remove_shortlist($id) {
        $list = EmpShortLists::find($id);
        $list->delete();
        return Redirect::to('/employer/applicant/shortlist')->with('message','Successfully removed from shortlist');
    }
    public function add_shortlist() {
        $list = EmpShortlists::where('empid', '=', Input::get('empid'))
                                ->where('appid', '=', Input::get('appid'))
                                ->first();
        if(isset($list) and count($list) > 0) {
            return json_encode(array('status' => 'ok'));
        } else {
            $emplist = new EmpShortLists();
            $emplist->empid = Input::get('empid');
            $emplist->appid = Input::get('appid');
            $emplist->save();
        }

        return json_encode(array('status' => 'ok'));
    }
    public function hire_applicant($id) {
        

        $hirelist = new HireLists();
        $hirelist->empid = $this->emp->empid;
        $hirelist->appid = $id;
        $hirelist->status = 1;
        $hirelist->accepted = 1;
        $hirelist->message = "";
        $hirelist->save();

        $apply_ad = ApplyAds::where('appid', '=', $id)->first();
        $apply_ad->delete();
        return Redirect::to('/employer/hired/list')
                        ->with('message', 'Applicant succesfully hired.');

    }
    public function hired_list() {
        Session::flash('url', 1);
       $hirelist = HireLists::where('empid', '=', $this->emp->empid)
                            ->where('status', '=', 1)
                            ->paginate(5);
        return View::make('employer.hired-list')
                        ->with('emp',$this->emp)
                        ->with('hirelist', $hirelist);
    }
    public function remove_hirelist($id) {
        $list = HireLists::find($id);   
        $list->delete();
        return Redirect::to('/employer/hired/list')->with('message', 'Successfully removed');
    }
    public function cancel_job_request($id) {
        $hirelist = HireLists::find($id);
        $hirelist->status = 0;
        $hirelist->accepted = 0;
        $hirelist->save();
        return Redirect::to('/employer/hired/list')
                        ->with('message', 'Job request canceled');
    }
    public function hire_delete($id) {
        $list = HireLists::find($id);
        $list->delete();
        return Redirect::to('/employer/hired/list')->with('message', 'Successfuly removed');
    }
    public function resend_job_request($id) {
        $hirelist = HireLists::find($id);
        $hirelist->status = 1;
        $hirelist->save();
        return Redirect::to('/employer/hired/list')
                        ->with('message', 'Job ad request sent');
    }
    public function send_message() {
        $msg = new ApplicantMessages();
        $msg->appid = Input::get('applicationid');
        $msg->empid = Input::get('empid');
        $msg->message = Input::get('message');
        $msg->save();
        $status = array('status' => 200);
        return json_encode($status);
    }
    public function subscription() {
        return View::make('subs.subscription')
                    ->with('emp', $this->emp);
    }
    public function recommendations() {
        Session::flash('url',6);
        $recommendations = Recommedations::where('empid', '=', $this->emp->empid)->paginate(10);
        return View::make('employer.recommendation')
                    ->with('emp', $this->emp)
                    ->with('recommedations', $recommendations);
    }
    public function create_rate() {
    
      $rate = Input::all();
      $sum = 0;
      $sum += $rate['r1'];
        $sum += $rate['r2'];
        $sum += $rate['r3'];
        $sum += $rate['r4'];
        $sum += $rate['r5'];

        $sum = ($sum / 25 ) * 5;
        $rating = new AppRatings();
        $rating->empid = $this->emp->empid;
        $rating->appid = $rate['appid'];
        $rating->partialrating = $sum;
        $rating->feedback = $rate['feedback'];
        $rating->save();
        Session::put('appid', $rate['appid']);
        Session::put('jobtypeid', $rate['jobtypeid']);
        return Redirect::to('/employer/recommend/page')
                        ->with('message', 'Applicant successfully evaluated');
        
    }
    public function recomend() {
        $jobtypeid = Session::has('jobtypeid') ? Session::get('jobtypeid') : null;
        $appid = Session::has('appid') ? Session::get('appid') : null;
        $ads = Ads::where('jobtypeid', '=', $jobtypeid)->get();
        if(isset($ads) and count($ads) > 0) {
             return View::make('employer.recommendation')
                    ->with('emp', $this->emp)
                    ->with('ads', $ads)
                    ->with('appid', $appid);
        }
        return View::make('employer.recommendation')
                    ->with('emp', $this->emp)
                    ->with('ads', Ads::paginate(20))
                    ->with('appid', $appid);
    }
    public function recommend_to() {
        $input = Input::all();
        $recomend = Recommendations::where('recommendto', '=', $input['recomendto'])
                                    ->where('recommendby', '=', $input['recomendby'])
                                    ->where('appid', '=', $input['appid'])->first();
        if(isset($recomend) and count($recomend)) {
            return json_encode(array('status' => true));
        }
        $newreco = new Recommendations();
        $newreco->recommendto = $input['recomendto'];
        $newreco->recommendby = $input['recomendby'];
        $newreco->appid = $input['appid'];
        $newreco->save();
        return json_encode(array('status' => 'ok'));
    }
    public function reco_view() {
        Session::flash('url', 6);
        $reco = Recommendations::where('recommendto','=', $this->emp->empid)->paginate(10);
        return View::make('employer.reco_view')
                        ->with('emp', $this->emp)
                        ->with('reco', $reco);
    }
    public function reco_profile($id) {
        $applicant = Applicants::where('appid', '=', $id)->first();
        $application = Applications::where('appid', '=', $id)->first();
        return View::make('employer.reco_profile')
                    ->with('emp', $this->emp)
                    ->with('application',$application)
                    ->with('applicant', $applicant);
    }
    public function employer_logout() {

      Session::forget('employer');
      Session::flush();
      return Redirect::to('/');
    }
    public function notify() {
        $result = $this->itexmo('09169751322', 'MaidFinderPH : Hi Kelly, we recieve the remitance for your subscription.','LOURE663075_FSNZ8');
        if($result == "0") {
            return "Message sent";
        }
        return "Message not sent";
    }
    private function itexmo($number,$message,$apicode){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }

}
