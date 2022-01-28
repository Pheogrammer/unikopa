@extends('layouts.app')
    @section('title')
    Apply for Loan
    @endSection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Apply for Loan') }} ( {{$_GET['type']}} ) </div>

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

                    <form action="{{route('send_loan_application')}}" method="post" enctype="multipart/form-data"
                     onsubmit="return confirm('You are about to send a loan application, proceed?')">
                     @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="my-input">Loan Type</label>
                                    <input id="my-input" class="form-control" type="text" required value="{{$_GET['type']}}"  name="loan">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="my-input">College</label>
                                    <input id="my-input" class="form-control" type="text" required name="college">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="my-input">Year of Study</label>
                                    <input id="my-input" class="form-control" type="text" required name="year">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="my-input">Course</label>
                                    <input id="my-input" class="form-control" required type="text" name="course">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="my-input">Student Registration Number</label>
                                    <input id="my-input" class="form-control" required type="text" name="reg#">
                                </div>
                            </div>
                            <div class="col">
                                
                                <div class="form-group">
                                    <label for="my-input">HESLB benefiaciary?</label>
                                    Yes <input id="my-input" value="yes" checked type="radio" name="heslb">
                                    No <input id="my-input" value="no" type="radio" name="heslb">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="my-input">Phone Number</label>
                                    <input id="my-input" class="form-control" required type="number" min="0000000000" max="9999999999" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-1">
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
