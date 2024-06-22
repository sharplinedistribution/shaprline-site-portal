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
                <h4 class="alert-heading">Create Release is Blocked</h4>
                <p>{{  auth()->user()->block_reason }}</p>
            </div>

         </div>

        </div>
    </div>
</div>
@endsection
