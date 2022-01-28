@extends('layouts.app')
    @section('title')
    Apply for Loan
    @endSection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                   <div class="row">
                       <div class="col">
                        Loan Application History
                       </div>
                       <div class="col">
                           <a href="{{route('apply_for_loan')}}" class="btn btn-primary">Apply another loan</a>
                       </div>
                   </div>
                  </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('message') }}</li>
                            </ul>
                        </div>
                    @endif

                    @foreach ($data as $item)
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2" >
                                        @if ($item->loan_type == 'pesa')
                                            <img src="{{asset('pesaUnikopa.png')}}" width="30%" alt="" srcset="">
                                        @elseif($item->loan_type == 'laptop')
                                            <img src="{{asset('laptopUnikopa.png')}}" width="30%" alt=""  srcset="">
                                        @else
                                            <img src="{{asset('unikopaSimu.png')}}" width="30%" alt=""  srcset="">
                                        @endif
                                    </div>
                                    <div class="col">
                                        <h4>Applied for {{$item->loan_type}} Loan</h4>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        Application Date : {{ date('d F Y', strtotime($item->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        Status : 
                                                        @if ($item->status =='1')
                                                            <span class="badge badge-success">Pending</span>
                                                        @elseif($item->status =='2')
                                                        <span class="badge badge-info">Processed</span>
                                                        @elseif($item->status =='0')
                                                        <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <a href="{{route('view_loan',[$item->id])}}"class=" btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </div>
                                </div>
                            </div>
                        </div> <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
