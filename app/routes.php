<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    if(Session::has('applicant')) {
        return Redirect::to('applicant/home');
    }
    if(Session::has('employer')) {
        return Redirect::to('employer/home');
    }
    $location = Regions::all();
    return View::make('home.home')->with('location', $location);
});

Route::get('user-login', function() {
    if(Session::has('employer')) {
        return Redirect::to('employer/home');
    }
    if(Session::has('applicant')) {
        return Redirect::to('applicant/home');
    }
    return View::make('home.login');
});
Route::post('user-login', 'AccountController@handleLogin');

/*
 *
 * REGISTRATION ROUTES
 *
 */
Route::get('/about-us' ,function() {
    return View::make('home.about');
});
Route::get('user-register', function () {
   return View::make('home.register');
});

Route::post('user-register', 'AccountController@account_type');
Route::get('employer', 'AccountController@employer_account');
Route::get('/account/type', 'AccountController@account_type');
Route::post('/account/type', 'AccountController@handle_type');
Route::get('/create/profile', 'AccountController@create_profile');
Route::post('/create/profile', 'AccountController@handle_profile');
Route::get('/upload/photo', 'AccountController@upload');
Route::post('/upload/photo', 'AccountController@handle_upload');
Route::get('/account/logout', 'AccountController@logout');

 /*
 * EMPLOYER ACCOUNTS ROUTES
 *
 */

Route::get('/employer/home', 'EmployerController@employer_home');
Route::get('/employer/profile', 'EmployerController@employer_profile');
Route::get('/employer/logout','EmployerController@employer_logout');
Route::get('/employer/update', 'EmployerController@update_profile');
Route::post('/employer/update', 'EmployerController@handle_update');
Route::post('/employer/update/picture','EmployerController@change_picture');
Route::get('/employer/ads', 'EmployerController@job_ads');
Route::post('/create/ad','EmployerController@new_ads');
Route::get('/employer/ad/edit/{id}', 'EmployerController@update_ads');
Route::get('/employer/ad/delete/{id}','EmployerController@delete');
Route::post('/employer/ad/edit','EmployerController@handle_ad_update');
Route::post('/update/ad', 'EmployerController@handle_ad_update');
Route::get('/employer/message/inbox', 'EmployerController@message_inbox');
Route::get('/employer/job/request', 'EmployerController@job_request');
Route::get('/employer/hired/list','EmployerController@hired_list');
Route::post('/employer/add/shortlist', 'EmployerController@add_shortlist');
Route::get('/employer/applicant/shortlist','EmployerController@shortlist');
Route::post('/employer/applicant/send/message', 'EmployerController@send_message');
Route::get('/employer/applicant/message/view/{id}', 'EmployerController@view_messages');
Route::post('/employer/hire', 'EmployerController@hire');
Route::get('/employer/cancel/request/{id}', 'EmployerController@cancel_job_request');
Route::get('/employer/resend/request/{id}' ,'EmployerController@resend_job_request');
Route::get('/employer/remove/request/{id}', 'EmployerController@remove_request');
Route::get('/employer/shortlist/remove/{id}', 'EmployerController@remove_shortlist');
Route::get('/employer/remove/hirelist/{id}', 'EmployerController@remove_hirelist');
Route::get('/employer/hire/delete/{id}', 'EmployerController@hire_delete');
Route::get('/employer/hired/list', 'EmployerController@list_hired');
Route::post('/employer/applicant/rating', 'EmployerController@create_rate');
Route::get('/employer/recommend/{jobid}/{appid}', 'EmployerController@recomend');
Route::get('/recommned/{to}/{appid}/{by}', 'EmployerController@recomend_to');
Route::get('employer/recommend','EmployerController@reco_view');
Route::get('/employer/recomend/profile/{id}', 'EmployerController@reco_profile');
Route::get('/employer/ad/helper/type', 'EmployerController@jobtype');
Route::get('/employer/create/ad', 'EmployerController@handle_jobtype');
Route::get('/cancel-create', function() {
    return Redirect::to('/employer/ad/helper/type');
});


/*
 *
 *
 *  APPLICANT ACCOUNTS ROUTES
 *
 *
 */
Route::get('/applicant/home', 'ApplicantController@applicant_home');
Route::get('/applicant/profile','ApplicantController@profile_application');
Route::get('/applicant/applications/list', 'ApplicantController@applications_list');
Route::get('/applicant/logout', 'ApplicantController@applicant_logout');
Route::get('/applicant/profile/edit/', 'ApplicantController@update_profile');
Route::post('/applicant/profile/edit', 'ApplicantController@handle_update');
Route::post('/applicant/update/picture', 'ApplicantController@change_picture');
Route::get('/applicant/skills', 'ApplicantController@applicant_skill');
Route::get('/applicant/messagebox','ApplicantController@message');
Route::get('/applicant/create/application', 'ApplicantController@create_application');
Route::post('/applicant/create/application', 'ApplicantController@handle_application');
Route::get('/applicant/job/application/edit/{id}', 'ApplicantController@application_update');
Route::post('/applicant/job/application/edit', 'ApplicantController@handle_application_update');
Route::get('/applicant/job/application/delete/{id}', 'ApplicantController@application_delete');
Route::get('/employer/job/ads', 'ApplicantController@employer_ads');
Route::get('/employer/ad/profile/{id}', 'ApplicantController@emp_ad_profile');
Route::post('/applicant/shortlist/add', 'ApplicantController@add_shortlist');
Route::get('/applicant/shortlist','ApplicantController@shortlist');
Route::get('/applicant/shortlist/view/{id}','ApplicantController@view_shortlist');
Route::post('/applicant/apply/ad', 'ApplicantController@apply_ad');
Route::get('/applicant/applications/list', 'ApplicantController@applications_list');
Route::get('/applicant/employer/job/request', 'ApplicantController@job_request');
Route::get('/applicant/accept/request/{id}', 'ApplicantController@accept_job_request');
Route::get('/applicant/cancel/request/{id}' ,'ApplicantController@cancel_job_request');
Route::get('/applicant/job/preference', 'ApplicantController@job_application');
Route::post('/applicant/nbi/upload/', 'ApplicantController@nbi');
Route::get('/applicant/shortlist/remove/{id}', 'ApplicantController@remove_shortlist');
Route::get('/hired/job', 'ApplicantController@hired_job');
Route::get('/applicant/job/type/', 'ApplicantController@jobtype');
Route::get('/applicant/crate/job', 'ApplicantController@create_job');


/*
 *
 * HELPER ADS ROUTES
 *
 */


Route::get('/helpers', 'HelperController@helpers');
Route::get('application/view/{id}','HelperController@application_view');
Route::get('/search/profiles', 'HelperController@search');
Route::get('/search/ads', 'ApplicantController@search_ads');
Route::get('/recomend/auto', function() {
    $emp = DB::table('employer')->select('fname', 'lname')->get();
    return $emp;
});

/*
 *
 * ADMIN ROUTES
 */

Route::group(array('prefix' => 'admin'), function() {

    Route::get('/account/login','AdminAccountController@admin_login');
    Route::post('/account/login', 'AdminAccountController@handle_admin_login');
    Route::get('/home', 'AdminController@dashboard');
    Route::get('/logout', 'AdminAccountController@logout');
    Route::get('/staffs', 'AdminController@admin_staffs');
    Route::post('/staff/new', 'AdminController@new_staff');
    Route::post('/get/staff', 'AdminController@get_staff');
    Route::post('/edit/staff', 'AdminController@edit_staff');
    Route::post('/delete/staff', 'AdminController@remove_staff');
    Route::get('/account/users', 'AdminController@account_users');
    Route::get('/applicant/accounts-pending', 'AdminController@applicants_pending');
    Route::get('/applicant/accounts-pending/view/{id}', 'AdminController@applicant_profile_pending');
    Route::get('/job-description', 'AdminController@job_description');
    Route::post('/new/job/desc', 'AdminController@new_job_desc');
    Route::post('/job/desc/edit', 'AdminController@edit_job');
    Route::post('/remove/job', 'AdminController@remove_job');
    Route::get('/employer/subscription', 'AdminController@subscription');
    Route::get('/subscriber/add', 'AdminController@new_subscriber');
    Route::post('/subscriber/add', 'AdminController@handle_new_subscriber');
    Route::post('/subscriber/approve', 'AdminController@approve');
    Route::get('/applicant/accounts', 'AdminController@app_accounts');
    Route::post('/applicant/message', 'AdminController@send_message');
    Route::post('/applicant/verify', 'AdminController@verify');
    Route::post('/applicant/remove', 'AdminController@remove_applicant');
    Route::get('/applicant/verified/{id}', 'AdminController@verified');
    Route::get('/employer/accounts-pending', 'AdminController@employer_pending');
    Route::get('/employer/accounts/pending/{id}', 'AdminController@emloyer_profile_pending');
    Route::post('/employer/verify', 'AdminController@employer_verify');
    Route::post('/employer/message', 'AdminController@employer_message');
    Route::get('/employer/accounts', 'AdminController@emp_accounts');
    Route::get('/employer/verified/{id}','AdminController@emp_verified');
    Route::post('/employer/remove', 'AdminController@emp_remove');
    Route::get('/subscriber','AdminController@subscriber');
    Route::get('/subscriber/find', 'AdminAccountController@subscriber_find');
});

/*
 *
 * TEST ROUTES
 *
 *
 */

Route::get('/match', function() {
     $match = DB::table('ad')
                ->join('application', function($join){
                    $join->on('ad.jobtypeid', '=', 'application.jobtypeid')
                            ->where('application.appid', '=', 3);
                })->get();
     return $match;
});
/*
 *
 *SUBSCRIPTIONS
 *
 */

Route::get('/subscription','EmployerController@subscription');



Route::get('/notify', 'EmployerController@notify');

Route::get('/join', function() {
      $match = DB::table('ad')
            ->join('application', function($join){
                $join->on('ad.jobtypeid', '=','application.jobtypeid')
                    ->where('application.appid', '=', 2);
            })->get();
      return $match;
});

/*
 *
 * AJAX ROUTES
 */

Route::post('/employer/add/hirelist', function() {
    $isSave = HireLists::where('applicationid', '=', Input::get('applicationid'))->first();

    if(is_null($isSave)) {
        $hirelist = new HireLists();
        $hirelist->applicationid = Input::get('applicationid');
        $hirelist->empid = Input::get('empid');
        $hirelist->status = false;
        $hirelist->save();
        return "ok";
    }
    return "0";
});

Route::get('/text', 'EmployerController@notify');
Route::get('/clear', function() {
  Session::flush();
  return Redirect::to('/');
});


Route::get('/email', function() {

    $message = "You subscription is now ready";
    $headers = "From : lourencerextraya@outlook.com";
    $ok = mail("rexustraya@gmail.com", "Testing", $message, $headers);
    if($ok) {
        return "Email sent to rexustraya@gmail.com";
    }
    return "Failed to sent email";
});

///ANDROID API ROUTES


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
    if(Session::has('applicant')) {
        return Redirect::to('applicant/home');
    }
    if(Session::has('employer')) {
        return Redirect::to('employer/home');
    }
    $location = Regions::all();
    return View::make('home.home')->with('location', $location);
});

Route::get('user-login', function() {
    if(Session::has('employer')) {
        return Redirect::to('employer/home');
    }
    if(Session::has('applicant')) {
        return Redirect::to('applicant/home');
    }
    return View::make('home.login');
});
Route::post('user-login', 'AccountController@handleLogin');

/*
 *
 * REGISTRATION ROUTES
 *


Route::get('user-register', function () {
    return View::make('home.register');
});

Route::post('user-register', 'AccountController@account_type');
Route::get('employer', 'AccountController@employer_account');
Route::get('/account/type', 'AccountController@account_type');
Route::post('/account/type', 'AccountController@handle_type');
Route::get('/create/profile', 'AccountController@create_profile');
Route::post('/create/profile', 'AccountController@handle_profile');
Route::get('/upload/photo', 'AccountController@upload');
Route::post('/upload/photo', 'AccountController@handle_upload');
Route::get('/account/logout', 'AccountController@logout');


Route::get('/employer/home', 'EmployerController@employer_home');
Route::get('/employer/profile', 'EmployerController@employer_profile');
Route::get('/employer/logout','EmployerController@employer_logout');
Route::get('/employer/update', 'EmployerController@update_profile');
Route::post('/employer/update', 'EmployerController@handle_update');
Route::post('/employer/update/picture','EmployerController@change_picture');
Route::get('/employer/ads', 'EmployerController@job_ads');
Route::get('/create/ad', 'EmployerController@create_ads');
Route::post('/create/ad','EmployerController@new_ads');
Route::get('/employer/ad/edit/{id}', 'EmployerController@update_ads');
Route::get('/employer/ad/delete/{id}','EmployerController@delete');
Route::post('/employer/ad/edit','EmployerController@handle_ad_update');
Route::post('/update/ad', 'EmployerController@handle_ad_update');
Route::get('/employer/message/inbox', 'EmployerController@message_inbox');
Route::get('/employer/job/request', 'EmployerController@job_request');
Route::get('/employer/hired/list','EmployerController@hired_list');
Route::post('/employer/add/shortlist', 'EmployerController@add_shortlist');
Route::get('/employer/applicant/shortlist','EmployerController@shortlist');
Route::post('/employer/applicant/send/message', 'EmployerController@send_message');
Route::get('/employer/applicant/message/view/{id}', 'EmployerController@view_messages');
Route::post('/employer/hire', 'EmployerController@hire');
Route::get('/employer/cancel/request/{id}', 'EmployerController@cancel_job_request');
Route::get('/employer/resend/request/{id}' ,'EmployerController@resend_job_request');
Route::get('/employer/recommend', 'EmployerController@recommendations');

/*
 *
 *
 *  APPLICANT ACCOUNTS ROUTES
 *
 *
 *
Route::get('/applicant/home', 'ApplicantController@applicant_home');
Route::get('/applicant/profile','ApplicantController@profile_application');
Route::get('/applicant/applications/list', 'ApplicantController@applications_list');
Route::get('/applicant/logout', 'ApplicantController@applicant_logout');
Route::get('/applicant/profile/edit/', 'ApplicantController@update_profile');
Route::post('/applicant/profile/edit', 'ApplicantController@handle_update');
Route::post('/applicant/update/picture', 'ApplicantController@change_picture');
Route::get('/applicant/skills', 'ApplicantController@applicant_skill');
Route::get('/applicant/messagebox','ApplicantController@message');
Route::get('/applicant/create/application', 'ApplicantController@create_application');
Route::post('/applicant/create/application', 'ApplicantController@handle_application');
Route::get('/applicant/job/application/edit/{id}', 'ApplicantController@application_update');
Route::post('/applicant/job/application/edit', 'ApplicantController@handle_application_update');
Route::get('/applicant/job/application/delete/{id}', 'ApplicantController@application_delete');
Route::get('/employer/job/ads', 'ApplicantController@employer_ads');
Route::get('/employer/ad/profile/{id}', 'ApplicantController@emp_ad_profile');
Route::post('/applicant/shortlist/add', 'ApplicantController@add_shortlist');
Route::get('/applicant/shortlist','ApplicantController@shortlist');
Route::get('/applicant/shortlist/view/{id}','ApplicantController@view_shortlist');
Route::post('/applicant/apply/ad', 'ApplicantController@apply_ad');
Route::get('/applicant/applications/list', 'ApplicantController@applications_list');
Route::get('/applicant/employer/job/request', 'ApplicantController@job_request');
Route::get('/applicant/accept/request/{id}', 'ApplicantController@accept_job_request');
Route::get('/applicant/cancel/request/{id}' ,'ApplicantController@cancel_job_request');
Route::get('/applicant/job/preference', 'ApplicantController@job_application');
Route::post('/applicant/nbi/upload/', 'ApplicantController@nbi');


/*
 *
 * HELPER ADS ROUTES
 *
 


Route::get('/helpers', 'HelperController@helpers');
Route::get('application/view/{id}','HelperController@application_view');
Route::get('/search/profiles', 'HelperController@search');
Route::get('/search/ads', 'ApplicantController@search_ads');

/*
 *
 * ADMIN ROUTES
 *
Route::group(array('prefix' => 'admin'), function() {

    Route::get('/account/login','AdminAccountController@admin_login');
    Route::post('/account/login', 'AdminAccountController@handle_admin_login');
    Route::get('/home', 'AdminController@dashboard');
    Route::get('/logout', 'AdminAccountController@logout');
    Route::get('/staffs', 'AdminController@admin_staffs');
    Route::post('/staff/new', 'AdminController@new_staff');
    Route::post('/get/staff', 'AdminController@get_staff');
    Route::post('/edit/staff', 'AdminController@edit_staff');
    Route::post('/delete/staff', 'AdminController@remove_staff');
    Route::get('/account/users', 'AdminController@account_users');
    Route::get('/applicant/accounts-pending', 'AdminController@applicants_pending');
    Route::get('/applicant/accounts-pending/view/{id}', 'AdminController@applicant_profile_pending');
    Route::get('/job-description', 'AdminController@job_description');
    Route::post('/new/job/desc', 'AdminController@new_job_desc');
    Route::post('/job/desc/edit', 'AdminController@edit_job');
    Route::post('/remove/job', 'AdminController@remove_job');
    Route::get('/employer/subscription', 'AdminController@subscription');
    Route::get('/subscriber/add', 'AdminController@new_subscriber');
    Route::post('/subscriber/add', 'AdminController@handle_new_subscriber');
    Route::post('/subscriber/approve', 'AdminController@approve');
    Route::get('/applicant/accounts', 'AdminController@app_accounts');
    Route::post('/applicant/message', 'AdminController@send_message');
    Route::post('/applicant/verify', 'AdminController@verify');
    Route::post('/applicant/remove', 'AdminController@remove_applicant');
    Route::get('/applicant/verified/{id}', 'AdminController@verified');
    Route::get('/employer/accounts-pending', 'AdminController@employer_pending');
    Route::get('/employer/accounts/pending/{id}', 'AdminController@emloyer_profile_pending');
    Route::post('/employer/verify', 'AdminController@employer_verify');
    Route::post('/employer/message', 'AdminController@employer_message');
    Route::get('/employer/accounts', 'AdminController@emp_accounts');
    Route::get('/employer/verified/{id}','AdminController@emp_verified');
    Route::post('/employer/remove', 'AdminController@emp_remove');

});

Route::get('/subscription','EmployerController@subscription');


Route::get('/notify', 'EmployerController@notify');

Route::get('/join', function() {
    $subscription = DB::table('plan')
        ->join('subscription', function($join){
            $join->on('plan.planid', '=', 'subscription.planid')
                ->where('subscription.empid', '=', 4);
        })->first();
    if($subscription == null) {
        return "Yes";
    } else {
        return "No";
    }
});

/*
 *
 * AJAX ROUTES
 

Route::post('/employer/add/hirelist', function() {
    $isSave = HireLists::where('applicationid', '=', Input::get('applicationid'))->first();

    if(is_null($isSave)) {
        $hirelist = new HireLists();
        $hirelist->applicationid = Input::get('applicationid');
        $hirelist->empid = Input::get('empid');
        $hirelist->status = false;
        $hirelist->save();
        return "ok";
    }
    return "0";
});

Route::get('/text', 'EmployerController@notify');
Route::get('/clear', function() {
    Session::flush();
    return Redirect::to('/');
});


Route::get('/email', function() {

    $message = "You subscription is now ready";
    $headers = "From : lourencerextraya@outlook.com";
    $ok = mail("rexustraya@gmail.com", "Testing", $message, $headers);
    if($ok) {
        return "Email sent to rexustraya@gmail.com";
    }
    return "Failed to sent email";
});
*/
///ANDROID API ROUTES

function connect(){
    return new PDO("mysql:host=localhost;dbname=maidfinder","root","");
}

function app_feedback_add($appid,$empid,$ratingPartial,$feedback){
    $db=connect();
    $sql="INSERT INTO app_feedback(appid,empid,ratingPartial,feedback) values(?,?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid,$empid,$ratingPartial,$feedback));
    $db=null;
}

function app_feedback_view($appid){
    $db=connect();
    $sql="SELECT * FROM app_feedback,employer where app_feedback.appid = ? and app_feedback.empid = employer.empid order by feedbackid asc";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_feedback_update($feedback,$feedbackid){
    $db = connect();
    $sql = "UPDATE app_feedback set feedback=? where feedbackid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($feedback,$feedbackid));
    $db = null;
}

function app_feedback_delete($feedbackid){
    $db=connect();
    $sql = "DELETE FROM app_feedback where feedbackid = ?";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($feedbackid));
    $db = null;
}

function upload($file,$id,$stat){
    $db=connect();
    $sql="update employer set profilepic=? where empid=? and stat=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($file,$id,$stat));
    $db=null;
}

function searchImage($id){
    $db=connect();
    $sql="select * from employer where empid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

function loginApplicant($email,$password){
    $db=connect();
    $sql="select * from applicant where email=? and password=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($email,$password));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

function adsPost(){
    $db=connect();
    $sql="select * from ad";
    $pdo=$db->prepare($sql);
    $pdo->execute(array());
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

Route::get('api/applicant/login', function() {
    $app = Applicants::where('email', '=', Input::get('email'))
        ->where('password', '=', Input::get('password'))
        ->get();

    if(count($app) > 0) {
        return $app;
    } else {
        return "No applicant";
    }
});

Route::get('api/employer/login', function() {
    $employer =  Employers::where('email', '=', Input::get('email'))
        ->where('password','=', Input::get('password'))
        ->get();

    if( count($employer) > 0) {
        return json_encode($employer);
    }
});

Route::get('api/applicant/update', function() {
    $fname=Input::get('fname');
    $lname=Input::get('lname');
    $id=Input::get('id');
    $stat=Input::get('stat');

    if($stat=="applicant"){
        $app = Applicants::find($id);
        $app->fname = $fname;
        $app->lname = $lname;
        $app->save();
    } elseif($stat=="employer") {
        $emp = Employers::find($id);
        $emp->fname = $fname;
        $emp->lname = $lname;
        $emp->save();
    }
    return "";
});

Route::get('api/applicant/delete/{id}', function($id) {
    $app = Applicants::find($id);
    $job->delete();
    return $id ." is deleted";
});

Route::get('api/applicant/create', function() {
    $job = new Jobs();
    $job->description = Input::get('description');
    $job->startdate = Input::get('startdate');
    $job->save();
    return ["New record created"];
});

Route::get('api/applicant/search/{id}', function($id) {
    $app = Applicants::where('appid','=',$id)
        ->get();

    return $app;
});

Route::get('api/employer/search/{id}', function($id) {
    $emp = Employers::where('empid','=',$id)
        ->get();

    return $emp;
});

/*Route::post('api/upload' ,function() {

        $id=Input::get("id");
        $file_path = basename($_FILES['uploaded_file']['name']);
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],"public/uploads/profile/".$file_path);
        upload($file_path,$id,"employer");

        $id = Input::get("id");
        $emp=Employers::find($id);
        $emp->fname = Input::get("fname");
        $emp->lname = Input::get("lname");
        $emp->gender = Input::get("gender");
        $emp->address = Input::get("address");
        $emp->province = Input::get("province");
        $emp->nationality = Input::get("nationality");
        $emp->pitch = Input::get("say");
        $emp->save();

        $image=searchImage($id);
        return $image['profilepic'];
    }
});*/

Route::post('api/employer/upload/{id}', function($id) {
    $file_path = basename($_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],"public/uploads/profile/".$file_path);

    $app = Employers::find($id);
    $app->profilepic=$file_path;
    $app->save();

    return "Successfully Updated";
});

Route::post('api/applicant/upload/{id}', function($id) {
    $file_path = basename($_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],"public/uploads/profile/".$file_path);

    $app = Applicants::find($id);
    $app->profilepic=$file_path;
    $app->save();

    return "Successfully Updated";
});

Route::post('api/applicant/nbi/{id}', function($id) {
    $file_path = basename($_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],"public/uploads/profile/".$file_path);

    $app = Applicants::find($id);
    $app->nbi=$file_path;
    $app->save();
});

Route::post('api/applicant/update/{id}', function($id) {
    $app = Applicants::find($id);
    $app->fname = Input::get("fname");
    $app->lname = Input::get("lname");
    $app->gender = Input::get("gender");
    $app->address = Input::get("address");
    $app->province = Input::get("province");
    $app->nationality = Input::get("nationality");
    $app->pitch = Input::get("say");
    $app->save();

    return "Successfully Updated";
});

function searchJob(){
    $db=connect();
    $sql="SELECT * FROM application,applicant,jobtype,salary,region where application.appid=applicant.appid and application.deleted_at is null and application.jobtypeid=jobtype.jobtypeid and application.salaryid=salary.salaryid and application.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute();
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function searchAds(){
    $db=connect();
    $sql="SELECT * FROM ad,employer,jobtype,salary,region where ad.empid=employer.empid and ad.deleted_at is null and ad.jobtypeid=jobtype.jobtypeid and ad.salaryid=salary.salaryid and ad.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute();
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function ads_view($empid){
    $db=connect();
    $sql="SELECT * FROM ad,employer,jobtype,salary,region where ad.empid=? and ad.empid=employer.empid and ad.deleted_at is null and ad.jobtypeid=jobtype.jobtypeid and ad.salaryid=salary.salaryid and ad.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function job_view($appid){
    $db=connect();
    $sql="SELECT * FROM application,applicant,jobtype,salary,region where application.appid=? and application.appid=applicant.appid and application.deleted_at is null and application.jobtypeid=jobtype.jobtypeid and application.salaryid=salary.salaryid and application.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function emp_shortlist($empid){
    $db=connect();
    $sql="SELECT * FROM emp_shortlist,applicant where emp_shortlist.empid=? and emp_shortlist.deleted_at is null and emp_shortlist.appid=applicant.appid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_shortlist($appid){
    $db=connect();
    $sql="SELECT * FROM app_shortlist,employer where app_shortlist.appid=? and app_shortlist.deleted_at is null and app_shortlist.empid=employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function apply_pending_search($empid){
    $db=connect();
    $sql="SELECT * FROM apply_ad,applicant where apply_ad.empid=? and apply_ad.deleted_at is null and apply_ad.appid=applicant.appid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function hire_pending_search($appid){
    $db=connect();
    $sql="SELECT * FROM hirelist,employer where hirelist.appid=? and hirelist.deleted_at is null and hirelist.empid=employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function emp_shortlist_add($empid,$jobid,$appid){
    $db=connect();
    $sql="INSERT INTO emp_shortlist(empid,jobid,appid) values(?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid,$jobid,$appid));
    $db=null;
}

function app_shortlist_add($empid,$adsid,$appid){
    $db=connect();
    $sql="INSERT INTO app_shortlist(empid,adsid,appid) values(?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid,$adsid,$appid));
    $db=null;
}

function emp_hire_add($empid,$jobid,$appid){
    $db=connect();
    $sql="INSERT INTO emp_hire(empid,jobid,appid) values(?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid,$jobid,$appid));
    $db=null;
}

function app_apply_add($empid,$adsid,$appid){
    $db=connect();
    $sql="INSERT INTO app_apply(empid,adsid,appid) values(?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid,$adsid,$appid));
    $db=null;
}

function request_add($empid,$appid,$pitch){
    $db=connect();
    $sql="INSERT INTO request(empid,appid,pitch) values(?,?,?)";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid,$appid,$pitch));
    $db=null;
}

function emp_hirelist($empid){
    $db=connect();
    $sql="SELECT * FROM hirelist,applicant where hirelist.empid=? and hirelist.deleted_at is null and hirelist.accepted=1 and hirelist.appid=applicant.appid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_applylist($appid){
    $db=connect();
    $sql="SELECT * FROM app_apply,ad,employer where app_apply.appid=? and app_apply.adsid = ad.adid and app_apply.empid = employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function applylistAll($appid){
    $db=connect();
    $sql="SELECT * FROM hirelist,employer where hirelist.appid=? and hirelist.deleted_at is null and hirelist.accepted=1 and hirelist.empid=employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_hire_pending($appid){
    $db=connect();
    $sql="SELECT * FROM emp_request,job,employer where emp_request.appid=? and emp_request.jobid = job.jobid and emp_request.empid = employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function request_hire($empid){
    $db=connect();
    $sql="SELECT * FROM hirelist,applicant where hirelist.empid=1 and hirelist.deleted_at is null and hirelist.accepted
=0 and hirelist.appid=applicant.appid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function emp_request($empid){
    $db=connect();
    $sql="SELECT * FROM emp_request,job,applicant where emp_request.empid=? and emp_request.jobid = job.jobid and emp_request.appid = applicant.appid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_request($appid){
    $db=connect();
    $sql="SELECT * FROM emp_request,ad,employer where emp_request.appid=? and emp_request.adsid = ad.adid and emp_request.empid = employer.empid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function emp_shortlist_delete($shortlistid){
    $db=connect();
    $sql="DELETE FROM emp_shortlist where shortlistid = ?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($shortlistid));
    $db=null;
}

function app_shortlist_delete($shortlistid){
    $db=connect();
    $sql="DELETE FROM app_shortlist where shortlistid = ?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($shortlistid));
    $db=null;
}

function emp_hire_delete($hireid){
    $db=connect();
    $sql="DELETE FROM emp_hire where hireid = ?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($hireid));
    $db=null;
}

function app_apply_delete($applyid){
    $db=connect();
    $sql="DELETE FROM app_apply where applyid = ?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($applyid));
    $db=null;
}

function emp_request_delete($requestid){
    $db=connect();
    $sql="DELETE FROM emp_request where requestid = ?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($requestid));
    $db=null;
}

function search_position($position){
    $db=connect();
    $sql="SELECT * FROM application,applicant,jobtype,salary,region where application.jobtypeid=? and application.appid=applicant.appid and application.deleted_at is null and application.jobtypeid=jobtype.jobtypeid and application.salaryid=salary.salaryid and application.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($position));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function search_position_ads($position){
    $db=connect();
    $sql="SELECT * FROM ad,employer,jobtype,salary,region where ad.jobtypeid=? and ad.empid=employer.empid and ad.deleted_at is null and ad.jobtypeid=jobtype.jobtypeid and ad.salaryid=salary.salaryid and ad.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($position));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function emp_suggest($empid){
    $db=connect();
    $sql="SELECT * FROM ad,application,applicant,jobtype,salary,region where ad.empid=? and ad.jobtypeid=application.jobtypeid and application.appid=applicant.appid and application.deleted_at is null and application.jobtypeid=jobtype.jobtypeid and application.salaryid=salary.salaryid and application.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($empid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function app_suggest($appid){
    $db=connect();
    $sql="SELECT * FROM application,ad,employer,jobtype,salary,region where application.appid=? and application.jobtypeid=ad.jobtypeid and ad.empid=employer.empid and ad.deleted_at is null and ad.jobtypeid=jobtype.jobtypeid and ad.salaryid=salary.salaryid and ad.regionid=region.regionid";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($appid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

Route::get('api/auto_suggest/search/{empid}', function($empid) {
    if( emp_suggest($empid) ){
        return json_encode( emp_suggest($empid) );
    } else {
        return null;
    }
});

Route::get('app/auto_suggest/search/{appid}', function($appid) {
    if( app_suggest($appid) ){
        return json_encode( app_suggest($appid) );
    } else {
        return null;
    }
});

Route::get('api/job/search1', function() {

    if( search_position(Input::get("position") ))
        return json_encode(search_position(Input::get("position") ));
    else
        return null;
});

Route::get('api/ads/search1', function() {
    /*$position=JobTypes::where('description','=',Input::get("position") )->first()->jobtypeid;*/
    if( search_position_ads(Input::get("position") ))
        return json_encode(search_position_ads(Input::get("position") ));
    else
        return null;
});

Route::post('api/request/add', function() {
    request_add(Input::get('empid'),Input::get('appid'),Input::get('pitch'));
    emp_shortlist_delete(Input::get('shortlistid'));

    return "Sending Request";
});

Route::post('api/emp_request/delete/{requestid}', function($requestid) {
    emp_request_delete($requestid);
    return "Request Canceled";
});

Route::post('api/hirelist/add', function() {
    $hire = new HireLists();
    $hire->empid = Input::get("empid");
    $hire->appid = Input::get("appid");
    $hire->message = Input::get("message");
    $hire->status = 1;
    $hire->accepted = 0;
    $hire->save();
    if( Input::get("option") == "shortlist" )
    {
        $shortlist = EmpShortlist::find( Input::get('shortlistid') );
        $shortlist->delete();
    }
    elseif( Input::get('option') == "apply_pending" ){
        $applypending = ApplyAds::find( Input::get('applypendingid') );
        $applypending->delete();
    }
    return "Successfully send request";
});

Route::post('api/apply/add', function() {
    $apply = new ApplyAds();
    $apply->empid = Input::get("empid");
    $apply->appid = Input::get("appid");
    $apply->message = Input::get("message");
    $apply->save();
    $shortlist = AppShortlist::find( Input::get('shortlistid') );
    $shortlist->delete();
    return "Successfully send request";
});

Route::post('api/app_shortlist/delete', function() {
    $shortlist = AppShortlist::find( Input::get('shortlistid') );
    $shortlist->delete();
    return "Successfully remove shortlist";
});

Route::post('api/hirelist/delete', function() {
    $hirelist = HireLists::find( Input::get('hireid') );
    $hirelist->delete();
    return "Hire Cancel";
});

Route::post('api/emp_shortlist/delete', function() {
    $shortlist = EmpShortlist::find( Input::get('shortlistid') );
    $shortlist->delete();
    return "Successfully remove shortlist";
});

Route::post('api/apply_pending/delete', function() {
    $applypending = ApplyAds::find( Input::get('applypendingid') );
    $applypending->delete();
    return "Pending decline";
});

Route::post('api/hire_pending/delete', function() {
    $applypending = HireLists::find( Input::get('hirependingid') );
    $applypending->delete();
    return "Pending decline";
});

Route::post('api/apply_pending/add', function() {
    $hire=HireLists::find(Input::get('applypendingid'));
    $hire->accepted=1;
    $hire->save();
    return "Successfully hire";
});

Route::post('api/hire_pending/add', function() {
    $hire=HireLists::find(Input::get('hirependingid'));
    $hire->accepted=1;
    $hire->save();
    return "Successfully hire";
});

Route::get('api/apply_pending/search/{empid}',function($empid){
    if(apply_pending_search($empid)){
        return json_encode(apply_pending_search($empid));
    } else
        return null;
});

Route::get('api/request_hire/search/{empid}',function($empid){
    if(request_hire($empid)){
        return json_encode(request_hire($empid));
    } else
        return null;
});

Route::get('api/hire_pending/search/{appid}',function($appid){
    if(hire_pending_search($appid)){
        return json_encode(hire_pending_search($appid));
    } else
        return null;
});

Route::post('api/emp_shortlist/add', function() {

    if( !isset(EmpShortlist::where('empid','=',Input::get('empid'))->where('appid','=',Input::get('appid'))->first()->appid) ){
        $shortlist = new EmpShortlist();
        $shortlist->empid = Input::get("empid");
        $shortlist->appid = Input::get("appid");
        $shortlist->save();
        return "Successfully added shortlist";
    } else {
        $error->error=Input::get('error');
    }

});

Route::post('api/app_shortlist/add', function() {

    if( !isset( AppShortlist::where('empid','=',Input::get('empid'))->where('appid','=',Input::get('appid'))->first()->empid) ){
        $shortlist = new AppShortlist();
        $shortlist->empid = Input::get("empid");
        $shortlist->appid = Input::get("appid");
        $shortlist->save();
        return "Successfully added shortlist";
    } else {
        $error->error=Input::get('error');
    }

});


Route::get('api/emp_shortlist/search/{empid}', function($empid) {
    if( emp_shortlist($empid) )
        return json_encode(emp_shortlist($empid));
    else
        return null;
});

Route::get('api/app_shortlist/search/{appid}', function($appid) {
    if( app_shortlist($appid) )
        return json_encode(app_shortlist($appid));
    else
        return null;
});

Route::get('app/emp_request/pending/{appid}', function($appid) {
    if( app_hire_pending($appid) )
        return json_encode( app_hire_pending($appid) );
    else
        return null;
});


/*Route::get('api/employer/request/{empid}', function($empid) {
    if( emp_request($empid) )
        return json_encode(emp_request($empid));
    else
        return null;
});

Route::get('api/applicant/request/{appid}', function($appid) {
    if( app_request($appid) )
        return json_encode(app_request($appid));
    else
        return null;
});*/

Route::get('api/emp_hirelist/search/{empid}', function($empid) {
    if( emp_hirelist($empid) )
        return json_encode(emp_hirelist($empid));
    else
        return null;
});

Route::get('api/app_applylist/search/{appid}', function($appid) {
    if( app_applylist($appid) )
        return json_encode(app_applylist($appid));
    else
        return null;
});

Route::get('api/applylist/all/{appid}', function($appid) {
    if( applylistAll($appid) )
        return json_encode(applylistAll($appid));
    else
        return null;
});

Route::get('api/app_shorlist/search/{appid}', function($appid) {
    if( app_shorlist($appid) )
        return json_encode(app_shorlist($appid));
    else
        return null;
});

Route::post('api/emp_hirelist/delete/{hireid}', function($hireid) {
    emp_hire_delete($hireid);
    return "Hire Canceled";
});

Route::post('api/app_applylist/delete/{applyid}', function($applyid) {
    app_apply_delete($applyid);
    return "Apply Canceled";
});


Route::get('api/emp_shortlist/search', function() {
    return json_encode(emp_shortlist());
});

Route::get('api/job/search', function() {
    if( searchJob() )
        return json_encode(searchJob());
    else
        return null;
});

Route::get('api/ads/search', function() {
    return json_encode(searchAds());
});

Route::get('api/availability/view', function() {
    return Jobs::all();
});

Route::get('api/info', function() {
    $jobinfo = DB::table('employer')
        ->join('ad', function($join){
            $join->on('ad.empid', '=', 'employer.empid')
                ->where('ad.adid','=', 2);
        })->get();

    return $jobinfo;
});

/////JOB
Route::post('api/job/create', function() {
    $job = new Applications();
    $job->appid = Input::get("appid");
    $job->regionid = Input::get("regionid");

    $job->capacity = Input::get("capacity");
    $job->salaryid = Input::get("salaryid");
    $job->pitch = Input::get("pitch");
    $job->dayof = Input::get("dayof");
    $job->yearexp = Input::get("yearexp");
    $job->edlevel = Input::get("edlevel");
    $job->jobtypeid = Input::get("jobtypeid");
    $job->save();

    return "New Job Availability Created";
});

Route::get('api/job/view/{appid}', function($appid) {
    if( job_view($appid) ){
        return json_encode( job_view($appid) );
    } else
        return null;
});
Route::post('api/job/update/{id}', function($id) {
    $ads = Applications::find($id);

    $ads->regionid = Regions::where('location','=',Input::get("regionid") )->first()->regionid;

    if(Input::get("capacity") == "Full Time"){
        $ads->capacity = 0;
    } else {
        $ads->capacity = 1;
    }

    $ads->salaryid = Salaries::where('amount_range','=',Input::get("salaryid") )->first()->salaryid;;

    $ads->pitch = Input::get("pitch");


    $dayoffArray = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    for($a = 0; $a<7; $a++){
        if(Input::get("dayof") == $dayoffArray[$a]){
            $ads->dayof = $a;
            break;
        }
    }

    $yearexpArray = array("Less than one year","One year","Two years","Three years above");
    for($b=0; $b<4; $b++){
        if(Input::get("yearexp") == $yearexpArray[$b]){
            $ads->yearexp = $b;
            break;
        }
    }

    $edlevelArray = array("Elementary","High School","College Graduate");
    for($c=0; $c<3; $c++){
        if(Input::get("edlevel") == $edlevelArray[$c]){
            $ads->edlevel = $c;
            break;
        }
    }

    $ads->jobtypeid = JobTypes::where('description','=',Input::get("jobtypeid") )->first()->jobtypeid;
    $ads->save();
});

Route::post('api/job/delete/{id}', function($id) {
    $job = Jobs::find($id);
    $job->delete();
    return "Successfully deleted..";
});

///ADS
Route::post('api/ads/create', function() {
    $ads = new Ads();
    $ads->empid = Input::get("empid");
    $ads->regionid = Input::get("regionid");

    $ads->startdate = Input::get("startdate");
    $ads->capacity = Input::get("capacity");
    $ads->salaryid = Input::get("salaryid");
    $ads->pitch = Input::get("pitch");
    $ads->dayof = Input::get("dayof");
    $ads->gender = Input::get("gender");
    $ads->yearexp = Input::get("yearexp");
    $ads->edlevel = Input::get("edlevel");
    $ads->jobtypeid = Input::get("jobtypeid");
    $ads->save();

    return "Sucessfully added ads";
});

Route::post('api/ads/update/{id}', function($id) {
    $ads = Ads::find($id);

    $ads->regionid = Regions::where('location','=',Input::get("regionid") )->first()->regionid;

    $ads->startdate = Input::get("startdate");

    if(Input::get("capacity") == "Full Time"){
        $ads->capacity = 0;
    } else {
        $ads->capacity = 1;
    }

    $ads->salaryid = Salaries::where('amount_range','=',Input::get("salaryid") )->first()->salaryid;;

    $ads->pitch = Input::get("pitch");


    
    $dayoffArray = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    
    for($a = 0; $a<7; $a++){
        if(Input::get("dayof") == $dayoffArray[$a]){
            $ads->dayof = $a;
            break;
        }
    }

    $ads->gender = Input::get("gender");

    $yearexpArray = array("Less than one year","One year","Two years","Three years above");
    for($b=0; $b<4; $b++){
        if(Input::get("yearexp") == $yearexpArray[$b]){
            $ads->yearexp = $b;
            break;
        }
    }

    $edlevelArray = array("Elementary","High School","College Graduate");
    for($c=0; $c<3; $c++){
        if(Input::get("edlevel") == $edlevelArray[$c]){
            $ads->edlevel = $c;
            break;
        }
    }

    $ads->jobtypeid = JobTypes::where('description','=',Input::get("jobtypeid") )->first()->jobtypeid;
    $ads->save();
});

Route::get('api/ads/view/{empid}', function($empid) {
    if( ads_view($empid) ){
        return json_encode( ads_view($empid) );
    } else
        return null;
});

Route::post('api/ads/delete/{id}', function($id) {
    $ads = Ads::find($id);
    $ads->delete();
    return "Successfully deleted..";
});

Route::get('api/jobtype/view', function() {
    return JobTypes::all();
});

Route::get('api/region/view', function() {
    return Regions::all();
});

Route::get('api/nationality/view', function() {
    return Nationalities::all();
});

Route::get('api/religion/view', function() {
    return Religions::all();
});

Route::post('api/app_feedback/add',function() {
    $appid = Input::get('appid');
    $empid = Input::get('empid');
    $ratingPartial = Input::get('ratingPartial');
    $feedback = Input::get('feedback');
    app_feedback_add($appid,$empid,$ratingPartial,$feedback);
});

Route::get('api/app_feedback/view/{appid}',function($appid){
    if( app_feedback_view($appid) )
        return json_encode( app_feedback_view($appid) );
    else
        return null;
});

Route::post('api/app_feedback/update',function(){
    app_feedback_update( Input::get('feedback'),Input::get('feedbackid') );
});

Route::post('api/app_feedback/delete',function(){
    app_feedback_delete( Input::get('feedbackid') );
});

Route::get('api/applicant/all', function() {
    return Applicants::all();
});

Route::get('api/salary/all', function() {
    return Salaries::all();
});
