@extends('layouts.revamp_scaffold')
@push('title')
    Pricing
@endpush
@section('content')
<section class="packages mt-md-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="font-oswald text-white">Choose Your Plan</h1>
                <h5 class="font-oswald text-white mt-3">We’ve got you covered for every step of your artist journey.</h5>
            </div>
        </div>

        <div class="row mt-5">
            @include('frontend.partials.revamp.packages')
        </div>
    </div>
</section>

@endsection
