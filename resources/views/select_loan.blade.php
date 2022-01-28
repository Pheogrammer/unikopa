@extends('layouts.app')
    @section('title')
    Select Loan Type
    @endSection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Select Loan') }}</div>

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
                        
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Kopa Pesa <i class="fa fa-money" aria-hidden="true"></i> </h5>
                                    <p class="card-text">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div>
                                                    <img src="{{asset('pesaUnikopa.png')}}" width="30%" alt="" srcset="">
                                                </div>
                                            </div>
                                            <div class="col">
                                                UniKopa understands that there are times scholars just need to borrow cash. A Kopa Pesa's free interest loan may be the borrowing solution to get you the funds you need. 
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{route('apply_for_loan')}}" method="get">
                                                    <input type="text" value="pesa" name="type" hidden>
                                                    <button type="submit" class="btn btn-primary">Apply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                         <br>
                         <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kopa Laptop <i class="fa fa-laptop" aria-hidden="true"></i> </h5>
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <img src="{{asset('laptopUnikopa.png')}}" width="30%" alt="" srcset="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            Get the Laptop of your dream through Unikopa, only by starting with small amount of payment as your down payment.    
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{route('apply_for_loan')}}" method="get">
                                                <input type="text" value="laptop" name="type" hidden>
                                                <button type="submit" class="btn btn-primary">Apply</button>
                                            </form>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                     <br>
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kopa Simu <i class="fa fa-phone" aria-hidden="true"></i> </h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div>
                                            <img src="{{asset('unikopaSimu.png')}}" width="30%" alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        Get the smartphone of your dream through Unikopa only by starting with small amount of payment as your down payment.    
                                    </div>
                                    <div class="col-md-2">
                                        <form action="{{route('apply_for_loan')}}" method="get">
                                            <input type="text" value="phone" name="type" hidden>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
