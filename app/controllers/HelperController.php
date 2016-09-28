<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/17/2016
 * Time: 11:54 PM
 */
class HelperController extends BaseController {

    private $emp;
	public function __construct() {
            
        $this->beforeFilter(function () {
            if (!Session::has('employer')) {
                return Redirect::to('user-login');
            }
        });    
        if(Session::has('employer')) {
            $this->emp = Employers::find(Session::get('employer')->empid);
        }else {
            return Redirect::to('/user-login');
        }
    }
    public function helpers() {

        $match = DB::table('application')
                    ->join('ad', function($join){
                        $join->on('application.jobtypeid', '=','ad.jobtypeid')
                            ->where('ad.empid', '=', $this->emp->empid);
                    })->paginate('6');

        return View::make('helpers.helpers')
                        ->with('emp',$this->emp)
                        ->with('application', $match);

    }

    public function application_view($id) {
        $application = Applications::find($id);
        $applicant = Applicants::find($application->appid);
        $location = Regions::find($application->regionid);
        $jobtype = JobTypes::find($application->jobtypeid);
        $app_skill = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $salary = Salaries::find($application->salaryid);
        $duties = Duties::find($app_skill->dutyid);
        $subscribe = Subscriptions::where('empid', '=', $this->emp->empid)->first();
        return View::make('helpers.subscribed.applicant-application')
            ->with('emp', $this->emp)
            ->with('application', $application)
            ->with('jobtype', $jobtype->description)
            ->with('location', $location)
            ->with('duties', $duties)
            ->with('applicant', $applicant)
            ->with('salary', $salary)
            ->with('subscribe', $subscribe);
    }

    public function search() {

      if(Session::has('input_search') and !Input::has('search')) {
          $input = Session::get('input_search');
          $application = Applications::where('deleted_at' ,'=', NULL)
              ->where('jobtypeid', 'LIKE', "%". $input['jobtypeid'] ."%")
              ->where('regionid', 'LIKE', "%" . $input['location'] ."%")
              ->orderBy('created_at', 'DESC')
              ->paginate(20);
          return View::make('helpers.helpers')
              ->with('emp', $this->emp)
              ->with('application', $application);
      }
      $input = Input::all();
      Session::put('input_search', $input);
      $application = Applications::where('deleted_at' ,'=', NULL)
          ->where('jobtypeid', 'LIKE', "%". $input['jobtypeid'] ."%")
          ->where('regionid', 'LIKE', "%" . $input['location'] ."%")
          ->orderBy('created_at', 'DESC')
          ->paginate(20);
      return View::make('helpers.helpers')
          ->with('emp', $this->emp)
          ->with('application', $application);

    }

}
