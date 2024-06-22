@extends('layouts.web_scaffold')
@push('title')
Verification -
@endpush
@push('styles')
<style>
    .alert-warning {
        color: black;
        background-color: #FBDA03;
        border-color: #FBDA03;
    }
</style>
@endpush
@section('content')

<div class="container login-container">
    <div class="container">
       
        <div class="row">
        
         <div class="col-md-12 mb-md-0 mb-4">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Welcome to Sharpline Distro!</h4>
                <p>We've just sent a confirmation email to {{auth()->user()->email}}. Please click the link in that email to verify your email address & get started. Check your spam or promotions folder incase you don't receive it in your inbox</p>
            </div>

            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Success!</h4>
                <p>Your 30-day free trial has started and you can now release unlimited music.</p>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                        <small class="text-white">Click this button if you have not received yet.</small><br>
                        <a href="{{route('resendVerification',['email' => auth()->user()->email])}}" class="btn btn-sm btn-cst bg-yellow mt-2">Re-send</a><br>
                        @if(Session::has('success'))
                        <small class="text-success">{{Session::get('success')}}</small>
                        @endif
                </div>  
            </div>
         </div>
     
        </div>
    </div>
</div>
@endsection
