@extends('layouts.app')

@section('content')
@php
    use App\User;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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

                   <table class="table table-light table-striped">
                       <thead class="thead-light">
                           <tr>
                               <th>#</th>
                               <th>Date</th>
                               <th>Applicant Email</th>
                               <th>Application Type</th>
                               <th>HESLB?</th>
                               <th>College</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $fg = 1;
                           @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$fg}}</td>
                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                @php
                                    $rt = User::where('id',$item->applicant_id)->first();
                                @endphp
                                <td>{{$rt['email']}}</td>
                                <td style="text-transform: capitalize;">{{$item->loan_type}} Loan</td>
                                <td style="text-transform: uppercase;">{{$item->heslb}}</td>
                                <td style="text-transform: capitalize">{{$item->college}}</td>
                                <td>
                                    <a href="{{route('view_loan',[$item->id])}}"class=" btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @php
                                $fg++;
                            @endphp
                        @endforeach
                          
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
