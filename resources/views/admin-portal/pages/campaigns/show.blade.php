@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2">
                        <a href="{{url()->previous()}}">
                            <i class="mdi mdi-keyboard-return"></i>
                        </a>&nbsp; Back
                    </h4>
                    <hr class="hr-releases mb-2">
                    <p class="mb-2">Username - {{isset($show->user->name) && !empty($show->user->name) ? $show->user->name : '-'}}</p>
                    <p class="mb-2">Name - {{isset($show->user->first_name) && !empty($show->user->first_name) ? $show->user->first_name : ' '}} {{isset($show->user->last_name) && !empty($show->user->last_name) ? $show->user->last_name : ''}}</p>
                    <p class="mb-2">Email - {{isset($show->email) && !empty($show->email) ? $show->email : '-'}}</p>
                    <hr class="hr-releases mt-2 mb-2">
                    <h4 class="card-title mt-4">Information</h4>
                    <p class="mb-2">Artist Name - {{isset($show->artist_name) && !empty($show->artist_name) ? $show->artist_name : '-'}}</p>
                    <p class="mb-2">Email - {{isset($show->email) && !empty($show->email) ? $show->email : '-'}}</p>
                    <p class="mb-2">Release Title - {{isset($show->release_title) && !empty($show->release_title) ? $show->release_title : '-'}}</p>
                    <p class="mb-2">Spotify Link - {{isset($show->spotify_link) && !empty($show->spotify_link) ? $show->spotify_link : '-'}}</p>
                    <p class="mb-2">Apple Music / iTunes Link - {{isset($show->itune_link) && !empty($show->itune_link) ? $show->itune_link : '-'}}</p>
                    <p class="mb-2">Soundcloud Link - {{isset($show->soundcloud_link) && !empty($show->soundcloud_link) ? $show->soundcloud_link : '-'}}</p>
                    <p class="mb-2">Music Video Link (YouTube/Vevo) (Optional) - {{isset($show->musicvideo_link ) && !empty($show->musicvideo_link) ? $show->musicvideo_link : '-'}} </p>
                    <p class="mb-2">Facebook Link - {{isset($show->facebook_link ) && !empty($show->facebook_link) ? $show->facebook_link : '-'}}</p>
                    <p class="mb-2">Twitter Link - {{isset($show->twitter_link ) && !empty($show->twitter_link) ? $show->twitter_link : '-'}}</p>
                    <p class="mb-2">Instagram Link - {{isset($show->instagram_link ) && !empty($show->instagram_link) ? $show->instagram_link : '-'}}</p>
                    <p class="mb-2">Contact Number - {{isset($show->contact ) && !empty($show->contact) ? $show->contact : '-'}}</p>
                    <p class="mb-2">Release Date - {{isset($show->release_date ) && !empty($show->release_date) ? $show->release_date : '-'}}</p>
                    <p class="mb-2">What Are You Promoting -
                        ( {{isset($show->is_single) && !empty($show->is_single) ? 'Single' : ''}}
                        {{isset($show->is_mixtape) && !empty($show->is_mixtape) ? 'Mixtape' : ''}}
                        {{isset($show->is_album) && !empty($show->is_album) ? 'Album' : ''}} )
                    </p>
                    <p class="mb-2">
                        Previous Press
                        <br> {{isset($show->previous_press) && !empty($show->previous_press) ? $show->previous_press : '-'}}
                    </p>
                    <p class="mb-2">Artist Biography <br> {{isset($show->artist_biography) && !empty($show->artist_biography) ? $show->artist_biography : '-'}} </p>
                    <hr class="hr-releases mt-2 mb-2">
                    <div>
                        @if($show->status == 1)
                        <a class="btn btn-success" href="{{route('admin.campaigns.statusChange' , $show->id)}}" title="Complete">Complete</a>

                        @else
                        <a class="btn btn-danger" href="{{route('admin.campaigns.statusChange' , $show->id)}}" title="Pending">Pending</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection