@extends('layouts.portal_revamp_scaffold')
@push('title') {{$new_slug}} - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@section('content')

<div class="row mt-2 px-lg-4">
    <div class="col-md-12 mb-4">
        <h2 class="user-name mb-0">
            <span>{{$new_slug}}</span>
        </h2>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body px-0">
                <div class="card-header text-end bg-transparent border-0 p-3    ">
                    <div class="dropdown d-none">
                        <button class="btn btn-secondary bg-transparent border-0" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Last 15 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 45 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 60 Days</a></li>
                        </ul>
                    </div>
                </div>
                @if($slug == 'Streams By Number')
                    @component('user-portal.pages.revamp.components.streams-by-number')@endcomponent
                @elseif($slug == 'Streams By Country')
                    @component('user-portal.pages.revamp.components.streams-by-country')@endcomponent
                @elseif($slug == 'Streams By Revenue')
                    @component('user-portal.pages.revamp.components.top-stores-by-revenue')@endcomponent
                @elseif($slug == 'Top Performing Releases')
                    @component('user-portal.pages.revamp.components.top-performing-release')@endcomponent
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
