@extends('layouts.user_scaffold')
@push('title')
My Release -
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="container-fluid d-flex justify-content-between align-items-center p-2">
            <h1 class="h1 mt-2">Welcome, <span class="user" style="color: #fbda03;">{{auth()->user()->name}}</span></h1>

        </div>
    </div>
    <!-- My Release / Products -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <th>My Release</th>
            </table>
        </div>
    </div>

    <div class="row">
        @forelse ($release as $item)
        <div class="col-lg-4">
            <div class="card card-product bg-dark" style="width: 18rem;" onclick="window.location.href='{{route('user.release.show', $item->id)}}'">
                <img src="{{asset(config('upload_path.album_artwork').$item->album_artwork)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <strong style="color:#fbda03;">{{strtoupper($item->album_title)}}</strong>
                    <p class="card-text">{{getFirstArtist($item->artist)}}</p>
                    @if($item->status == 1)
                    <p class="mb-0 text-success">Accepted - {{getDateFormat($item->approved_at)}}</p>
                    @elseif($item->status == 2)
                    <p class="mb-0 text-danger">Rejected - {{getDateFormat($item->approved_at)}}</p>
                    <small class="text-danger">{{$item->rejection_comments}}</small>
                    @else
                    <p class="mb-0 text-info">Pending</p>
                    @endif
                </div>
            </div>
        </div>
        @empty


            <div class="mt-5  ">
                <h2 style="color:yellow;">There is nothing to display at this moment</h2>
            </div>

        @endforelse

    </div>
    <!-- Music Plateforms -->
    <!-- partial -->
</div>
@endsection
@push('scripts')
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

@endpush
