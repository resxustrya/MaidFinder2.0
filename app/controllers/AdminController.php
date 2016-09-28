<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/7/2016
 * Time: 6:33 PM
 */



class AdminController extends BaseController
{
    private $admin;
    private $url;
    public function __construct()
    {

        $this->beforeFilter(function () {
            $ok = false;
            if(Session::has('admin')) {
                $this->admin = Session::get('admin');
                $ok = true;
            }
            if($ok == false) {
                return Redirect::to('/admin/account/login');
            }
        });

    }
    public function dashboard() {
        return View::make('admin.home');
    }
    public function admin_staffs() {
        Session::put('url', 'staffs');
        if($this->admin->usertype == 'admin') {
            $admin_staffs = Admins::where('usertype', '=', 'adminstaff')->get();
            return View::make('admin.staffs')
                ->with('admin_staffs', $admin_staffs)
                ->with('admin', $this->admin);
        }
        return View::make('admin.staffs-err')->with('admin', $this->admin);
    }
    public function new_staff() {
        $admin = new Admins();
        $admin->username = Input::get('username');
        $admin->password = Input::get('password');
        $admin->fname = Input::get('fname');
        $admin->lname = Input::get('lname');
        $admin->usertype = Input::get('type');
        $admin->save();
        return Redirect::to('/admin/staffs')->with('new_staff', 'New staff was added.');
    }
    public function get_staff() {
        $id = Input::get('id');
        $admin = Admins::find($id);
        return $admin;
    }
    public function edit_staff() {
        $admin = Admins::find(Input::get('adminid'));
        $admin->username = Input::get('username');
        $admin->password = Input::get('password');
        $admin->fname = Input::get('fname');
        $admin->lname = Input::get('lname');
        $admin->usertype = Input::get('type');
        $admin->save();
        return Redirect::to('/admin/staffs')->with('update_staff', 'Staff was updated');
    }
    public function remove_staff() {
        $admin = Admins::find(Input::get('id'));
        if($admin and count($admin) > 0) {
            $admin->delete();
            return "ok";
        }
        return "false";
    }

    public function account_users() {
        Session::put('url', 'accounts');
        return View::make('admin.user-accounts');
    }
    public function applicants_pending() {
        Session::put('url', 'accounts');
        $accounts = Applicants::where('isVerified', '=', 0)->paginate(10);
        return View::make('admin.app-pending')
            ->with('applicants', $accounts)
            ->with('count', count($accounts));
    }
    public function applicant_profile_pending($id) {
        Session::flash('url', 'accounts');
        $app = Applicants::find($id);
        return View::make('admin.applicant-profile')->with('app', $app);
    }

    public function job_description() {
        Session::flash('url', 'job-desc');
        $jobtype = JobTypes::where('deleted_at')->paginate(5);
        return View::make('admin.job-desc')
            ->with('jobtype', $jobtype);
    }
    public function new_job_desc() {
        $job = new JobTypes();
        $job->description = Input::has('desc') ? Input::get('desc') : '';
        $job->save();
        return Redirect::to('/admin/job-description')
            ->with('message', 'New job description added');
    }
    public function edit_job() {

        $job = JobTypes::find(Input::get('id'));
        $job->description = Input::get('desc');
        $job->save();
        return Redirect::to('/admin/job-description')
            ->with('message', 'Job description updated');
    }
    public function remove_job() {
        $job = JobTypes::find(Input::get('id'));
        $job->delete();
        return "ok";
    }
    public function subscription() {
        Session::flash('url', 'emp-subs');
        $subscribe = Employers::where('subscribe', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return View::make('admin.subscription');
    }
    public function new_subscriber() {
        Session::flash('url', 'emp-subs');
        return View::make('admin.new-subscriber');
    }
    public function handle_new_subscriber() {
        Session::flash('url', 'emp-subs');
        $emp = Employers::where('email', '=', Input::get('email'))->first();

        return View::make('admin.new-subscriber')
            ->with('emp', $emp);

    }
    public function app_accounts() {
        $app = Applicants::where('isVerified', '=', 1)->paginate(10);

        return View::make('admin.app-accounts')
            ->with('applicants', $app)
            ->with('count', count($app));
    }
    public function verified($id) {
        $app = Applicants::find($id);
        return View::make('admin.verified')
            ->with('app', $app);
    }
  
    public function approve() {
        $emp = Employers::find(Input::get('empid'));
        if(isset($emp) and count($emp) > 0) {
            $emp->subscribe = true;
            $message = "MaidFinder PH : Thank you ". $emp->fname ." ". $emp->lname ." for trusting us.";
            $ok = $this->itexmo($emp->contactno, $message ,'LOURE663075_FSNZ8');
            $emp->save();
            return json_encode(array('status' => 'ok'));
        }
    }
    public function subscriber() {
        $emp = Employers::where('subscribe' ,'=', 1)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        return View::make('admin.subscriber')->with('emp', $emp);
    }
    public function verify() {
        $id = Input::get('appid');
        $app = Applicants::find($id);
        if($app) {
            $app->isVerified = true;
            $app->save();
            return json_encode(array('status' => 'ok'));
        }
        return json_encode(array('status', '0'));
    }

    public function send_message() {
        $input = Input::all();
        $ok = $this->itexmo('0'.$input['number'], $input['message'], 'LOURE663075_FSNZ8');
        return json_encode(array('status' => 'ok'));
    }
    public function employer_pending() {
        $emp = Employers::where('isVerified', '=' ,0)->paginate(10);
        return View::make('admin.emp-pending')->with('emp', $emp);
    }
    public function emp_accounts() {
        Session::flash('url', 'accounts');
        $emp = Employers::where('isVerified', '=', 1)->paginate(10);
        return View::make('admin.emp-verified')
                        ->with('employers', $emp)
                        ->with('count',count($emp));
    }
    public function emloyer_profile_pending($id) {
        Session::flash('url', 'accounts');
        $emp = Employers::find($id);
        return View::make('admin.employer-profile')->with('emp', $emp);
    }
    public function employer_verify() {
        $id = Input::get('empid');
        $emp = Employers::find($id);
        if(isset($emp)) {
            $emp->isVerified = true;
            $emp->save();
            return json_encode(array('status' => 'ok'));
        }
        return json_encode(array('status' => 'ok'));
    }
    public function employer_message() {
        $input = Input::all();
        $ok = $this->itexmo($input['number'], $input['message'],'LOURE663075_FSNZ8');
        return json_encode(array('status' => 'ok'));
    }
    public function emp_verified($id) {
        Session::flash('url', 'accounts');
        $emp = Employers::find($id);
        return View::make('admin.emp-profile')->with('emp', $emp);
    }
    public function remove_applicant() {
        $id = Input::get('appid');
        $app = Applicants::find($id);
        if(isset($app)) {
            $app->delete();
            return json_encode(array('status' => 'ok'));
        }
        return json_encode(array('status' => 0));
    }
    public function emp_remove() {
        $id = Input::get('empid');
        $emp = Employers::find($id);
        if(isset($emp)) {
            $emp->delete();
            return json_encode(array('status'=> 'ok'));
        }
        return json_encode(array('status' => 0));
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
