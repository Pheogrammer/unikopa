@extends('layouts.app')
    @section('title')
    Loan Details
    @endSection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Loan Application Summary </div>

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

                    <table class="table table-light  table-striped">
                        <tbody>
                            <tr>
                                <td>Date of Application: {{ date('d F Y', strtotime($data->created_at)) }}</td>
                                <td>Type of Application: <b style="text-transform: capitalize">{{$data->loan_type}} Loan</b> </td>
                                <td>Application Status:</td>
                            </tr>
                           
                            <tr>
                                <td>Applicant Name : {{$data2->name}} </td>
                                <td>Email : {{$data2->email}} </td>
                                <td>Phone Number : {{$data->phone_number}} </td>
                            </tr>
                            <tr>
                                <td colspan="3">  </td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize">College : {{$data->college}} </td>
                                <td> Education Year: {{$data->education_year}} &nbsp;&nbsp; Registration# {{$data->registration_number}} </td>
                                <td>Course: {{$data->course}} </td>
                            </tr>
                            <tr>
                                <td>
                                    HESLB beneficiarry? <b style="text-transform: uppercase;">{{$data->heslb}}</b>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="
                            @if(auth()->user()->user_type == 0)
                            {{route('loan_applicant')}}
                            @else
                            {{ url('/home') }}
                            @endif
                            ">Ok</a>
                        </div>
                        @if((auth()->user()->user_type == 1)&&($data->status == 1))
                        <div class="col-md-2">
                            <form onsubmit="return confirm('You are about to Accept this loan application, proceed?')" method="POST" action="{{route('accept_request')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{$data->id}}" name="data" hidden>
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                        </div>
                        <div class="col">                            
                            <form method="POST" onsubmit="return confirm('You are about to reject this request, proceed?')" action="{{route('reject_request')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{$data->id}}" name="data" hidden>
                                <button type="submit"  class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
