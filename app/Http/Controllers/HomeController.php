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
            if($checker1['status'] == '0')
            {

            }
            if($checker1['status']=='1')
            {

            }
            if($checker1['sttaus']=='2')
            {

            }

            return view('apply_for_loan');
        }

        return view('home');
    }
}
