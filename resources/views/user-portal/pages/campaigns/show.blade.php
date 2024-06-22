@extends('layouts.portal_revamp_scaffold')
@push('title')
{{isset($title) && !empty($title) ? $title : ''}} -
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{url()->previous()}}"><i class="	fa-solid fa-arrow-left"  style="color: var(--primary);"></i></a>&nbsp; Back</h4>

                    <h4 class="card-title mt-4">Information</h4>

                    <p class="mb-2">Artist Name - {{isset($show->artist_name) && !empty($show->artist_name) ? $show->artist_name : '-'}}</p>
                    <hr>
                    <p class="mb-2">Email - {{isset($show->email) && !empty($show->email) ? $show->email : '-'}}</p>
                    <hr>
                    <p class="mb-2">Release Title - {{isset($show->release_title) && !empty($show->release_title) ? $show->release_title : '-'}}</p>
                    <hr>
                    <p class="mb-2">Spotify Link - {{isset($show->spotify_link) && !empty($show->spotify_link) ? $show->spotify_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Apple Music / iTunes Link - {{isset($show->itune_link) && !empty($show->itune_link) ? $show->itune_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Soundcloud Link - {{isset($show->soundcloud_link) && !empty($show->soundcloud_link) ? $show->soundcloud_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Music Video Link (YouTube/Vevo) (Optional) - {{isset($show->musicvideo_link) && !empty($show->musicvideo_link) ? $show->musicvideo_link : '-'}} </p>
                    <hr>
                    <p class="mb-2">Facebook Link - {{isset($show->facebook_link) && !empty($show->facebook_link) ? $show->facebook_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Twitter Link - {{isset($show->twitter_link) && !empty($show->twitter_link) ? $show->twitter_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Instagram Link - {{isset($show->soundcloud_link) && !empty($show->soundcloud_link) ? $show->soundcloud_link : '-'}}</p>
                    <hr>
                    <p class="mb-2">Contact Number - {{isset($show->contact) && !empty($show->contact) ? $show->contact : '-'}}</p>
                    <hr>
                    <p class="mb-2">Release Date - {{isset($show->release_date) && !empty($show->release_date) ? date('d/m/Y' , strtotime($show->release_date)) : '-'}}</p>
                    <hr>
                    <p class="mb-2">What Are You Promoting -
                        ( {{isset($show->is_single) && !empty($show->is_single) ? 'Single' : ''}}
                        {{isset($show->is_mixtape) && !empty($show->is_mixtape) ? 'Mixtape' : ''}}
                        {{isset($show->is_album) && !empty($show->is_album) ? 'Album' : ''}} )
                    </p>
                    <hr>
                    <p class="mb-2">
                        Previous Press
                        <br> {{isset($show->previous_press) && !empty($show->previous_press) ? $show->previous_press : '-'}}
                    </p>
                    <hr>
                    <p class="mb-2">Artist Biography <br> {{isset($show->artist_biography) && !empty($show->artist_biography) ? $show->artist_biography : '-'}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
