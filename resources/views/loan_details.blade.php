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
                            <a class="btn btn-primary" href="{{route('loan_applicant')}}">Ok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
