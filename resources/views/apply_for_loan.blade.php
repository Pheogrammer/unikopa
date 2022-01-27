@extends('layouts.app')
    @section('title')
    Apply for Loan
    @endSection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Apply for Loan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="post">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
