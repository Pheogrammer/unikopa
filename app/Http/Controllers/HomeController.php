<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loanapplication;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checker = loanapplication::where('applicant_id',auth()->user()->id)->get();
        $checker1 = loanapplication::where('applicant_id',auth()->user()->id)->orderBy('id','Desc')->first();

        if(count($checker)<1){
            

            return view('select_loan');
        }
        if($checker1['status'] == '0')
        {

        }
        if($checker1['status']=='1')
        {

        }
        if($checker1['sttaus']=='2')
        {

        }
        if(auth()->user()->type == 0)
        {
            return redirect()->route('loan_applicant');
        }
        return view('home');
    }
    public function apply_for_loan()
    {
        if((isset($_GET['type']))&&(($_GET['type']=='pesa')||($_GET['type']=='laptop')||($_GET['type']=='phone')))
        {
            
                return view('apply_for_loan',['type'=>$_GET['type']]);
            
        }
        return view('select_loan');
    }
    public function send_loan_application(Request $request)
    {
        $request->validate([
            "college" => "required",
            'year'=>'required',
            'course'=>'required',
            'reg#'=>'required',
            'heslb'=>'required',

        ]);

        $process = new loanapplication();
        $process->applicant_id = auth()->user()->id;
        $process->loan_type = $request['loan'];
        $process->college = $request['college'];
        $process->registration_number = $request['reg#'];
        $process->education_year = $request['year'];
        $process->course = $request['course'];
        $process->heslb = $request['heslb'];
        $process->phone_number = $request['phone'];
        $process->status = 1;
        $process->save();

        return redirect()->route('loan_applicant')->with(['message'=>'Your Loan was sent successfully, you will receive instructions through your email']);
    }

    public function loan_applicant()
    {
        $data = loanapplication::where('applicant_id',auth()->user()->id)->orderBy('id','desc')->get();
        $data1 = loanapplication::where('applicant_id',auth()->user()->id)->orderBy('id','desc')->first();

        if(count($data)>0)
        {
            return view('loan_applicant',['data'=>$data]);
        }

    }
}
