@extends('layouts.web_scaffold')
@push('title')
Account Ban -
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
                <h4 class="alert-heading">Your Account has been banned.</h4>
                <p>Dear Partner, Your Sharpline Distro account has been deactivated because you have violated our Terms & Conditions as well as our Anti-Fraud Policy. Please contact us at <a href="mailto:support@sharplinedistribution.com" style="color:black">support@sharplinedistribution.com</a> to get more information on your Account Ban</p>
            </div>

         </div>

        </div>
    </div>
</div>
@endsection
