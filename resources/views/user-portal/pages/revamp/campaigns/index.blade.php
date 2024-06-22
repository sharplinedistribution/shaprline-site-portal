@extends('layouts.portal_revamp_scaffold')
@push('title') Campaigns - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@push('button')
<div class="col-12 text-end mt-4">
    <a href="{{route('user.release.create')}}"><button class="btn btn-primary rounded">View All Campaigns</button></a>
</div>
@endpush
@section('content')

@endsection
