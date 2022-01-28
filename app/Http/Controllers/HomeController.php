<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loanapplication;
use App\User;

use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\File\File;
use phpDocumentor\Reflection\Types\Null_;
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
        if(auth()->user()->user_type == 0)
        {
            return redirect()->route('loan_applicant');
        }
        $data_adm = loanapplication::orderBy('id','desc')->get();
        return view('home',['data'=>$data_adm]);
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

        // mail start

    //     $toEmail = auth()->user()->email;
    //     $sender = 'uniKopa';
    //     $userName = 'Notifications';

    //     $data = array('name'=>auth()->user()->name, "body" => "Your loan application via UniKopa has been received, you will receive updates about the processing. ",

    //  "footer"=>"",
    //  "footer1"=>" The request is under investigation. " ,
    //  "footer3"=>" UniKopa Team ",
    //  "footer2"=>""
    //             );

    //    Mail::send('email', $data, function($message) use ($toEmail,$sender,$userName) {

    //    $message->to($toEmail,$userName)
    //         ->subject('Unikopa Loan Update.');
    //    $message->from('pheogrammer@gmail.com',$sender);
    //    });

        // mail end

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
    public function view_loan($id)
    {
        $data = loanapplication::where('id',$id)->get();
        $data1 = loanapplication::where('id',$id)->first();
        

        if(count($data)>0)
        {
            $data2 = User::where('id',$data1['applicant_id'])->first();
            return view('loan_details',['data'=>$data1,'data2'=>$data2]);
        }
    }

    public function accept_request(Request $request)
    {
        $data = loanapplication::where('id',$request['data'])->get();
        $data1 = loanapplication::where('id',$request['data'])->first();

        if(count($data)>0)
        {
            $data1->status = 2;
            $data1->save();
            return redirect()->back()->with(['message'=>'Application Approved Successfully!']);
        }
 return redirect()->back();
    }

    public function reject_request(Request $request)
    {
        $data = loanapplication::where('id',$request['data'])->get();
        $data1 = loanapplication::where('id',$request['data'])->first();

        if(count($data)>0)
        {
            $data1->status = 0;
            $data1->save();
            return redirect()->back()->with(['message'=>'Application Rejected Successfully!']);
        }
 return redirect()->back();
    }
}
