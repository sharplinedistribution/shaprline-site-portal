@extends('layouts.portal_revamp_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@push('styles')
<style>
.alert {
    width: 100% !important;
}
</style>
@endpush
@section('content')
<style>
    .pricingTable .pricing-content {list-style: disc !important;padding: 50px;}.pricingTable .pricing-content li:before {content : none !important;font-size:18px !important;}.package {-webkit-box-shadow: 0 0 30px 0 rgb(0 0 0 / 7%);box-shadow: 0 0 30px 0 rgb(0 0 0 / 7%);border: 1px solid #252525;}.package h4 {background-color: #252525;padding: 25px;font-size: 22px;}.font-oswald {font-family: 'Oswald', sans-serif;}.text-white {--bs-text-opacity: 1;color: rgba(var(--bs-white-rgb),var(--bs-text-opacity))!important;}.package span {font-size: 18px;font-weight: 300;}.text-capitalize {text-transform: capitalize!important;}.list-unstyled {padding-left: 0;list-style: none;}.btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {color: var(--bs-btn-active-color);background-color: var(--bs-btn-active-bg);border-color: var(--bs-btn-active-border-color);}.package p {font-size: 36px;}.main-page p {font-size: 15px;}.btn-primary {background-color: #fbda03;color: #000 !important;border-radius: 0;border: 1px solid #fbda03;font-weight: 600;padding: 16px 37px;font-size: 14px;margin-bottom: 10px;}
</style>
<div class="content-wrapper">
   <div class="container">
   <div class="row">
      <div class="col-md-12">
         @if(Session::has("errorr"))
            <div class="alert alert-danger text-center" style="width:100% !important">{{Session::get('errorr')}}</div>
         @endif

      </div>
   </div>
      <div class="text-center mb-5">
         <h2 class="h2 text-white">Choose Your Plan</h2>
         <p class="text-white">We've got you covered for every step of your artist journey</p>
      </div>
      <div class="row mt-5">
       @if(isset($packages) && !empty($packages))
         @foreach($packages as $index=>$value)
         <div class="col-md-4 mb-md-0 mb-4">
            <div class="package text-center text-white">
               <h4 class="text-white font-oswald">For {{isset($value->name ) && !empty($value->name) ? $value->name : '-'}}</h4>
               <p class="package-price font-oswald text-white my-5">${{$value->price}} </p>
               <span class="text-capitalize">per year</span>
               <ul class="list-unstyled mt-5">
                @if(isset($value->details) && !empty($value->details) && $value->details->count()>0)
                  @foreach($value->details as $i=>$v)
                  <li>⧫ {{$v->feature}}</li>
                  @endforeach
                @endif
               </ul>
               <a href="{{route('user.accounts.paymentplan', strtolower($value->name))}}" class="btn btn-primary text-capitalize mt-3 mb-5">Pick {{isset($value->name ) && !empty($value->name) ? $value->name : '-'}} Plan</a>
            </div>
         </div>
         @endforeach
        @endif
      </div>
   </div>
   <!-- partial -->
</div>
@endsection
