@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{url()->previous()}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; Back</h4>

                    <h4 class="card-title mt-4">Information</h4>

                    <p class="mb-2">Bank Name - {{isset($show->bank_name) && !empty($show->bank_name) ? $show->bank_name : '-'}}</p>
                    <p class="mb-2">Account Holder Name - {{isset($show->account_holder) && !empty($show->account_holder) ? $show->account_holder : '-'}}</p>
                    <p class="mb-2">Account Number - {{isset($show->account_number) && !empty($show->account_number) ? $show->account_number : '-'}}</p>
                    <p class="mb-2">IBAN Number - {{isset($show->iban) && !empty($show->iban) ? $show->iban : '-'}}</p>
                    <p class="mb-2">Swift Code - {{isset($show->switf_code) && !empty($show->switf_code) ? $show->switf_code : '-'}}</p>
                    <p class="mb-2">Bank Country - {{isset($show->bank_country) && !empty($show->bank_country) ? $show->bank_country : '-'}}</p>
                    <p class="mb-2">Bank Location - {{isset($show->bank_location) && !empty($show->bank_location) ? $show->bank_location : '-'}} </p>
                    <p class="mb-2">Bank Street Address - {{isset($show->bank_street) && !empty($show->bank_street) ? $show->bank_street : '-'}}</p>
                    <p class="mb-2">Bank Zip Code - {{isset($show->bank_zip_code) && !empty($show->bank_zip_code) ? $show->bank_zip_code : '-'}}</p>
                    <p class="mb-2">Bank Password - {{isset($show->bank_password) && !empty($show->bank_password) ? $show->bank_password : '-'}}</p>
                    <p class="mb-2">Street Address - {{isset($show->street) && !empty($show->street) ? $show->street : '-'}}</p>
                    <p class="mb-2">Zip Code - {{isset($show->zip_code) && !empty($show->zip_code) ?  $show->zip_code  : '-'}}</p>
                    <p class="mb-2">Location - {{isset($show->location) && !empty($show->location) ? $show->location : '-'}}</p>
                    <p class="mb-2">Country - {{isset($show->country) && !empty($show->country) ? $show->country : '-'}}</p>
                    <p class="mb-2">Routing Number - {{isset($show->routing_number) && !empty($show->routing_number) ? $show->routing_number  : '-'}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection