@extends('layouts.portal_revamp_scaffold')
@push('title') Edit Campaign - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@push('button')
<div class="col-12 text-end mt-4">
    <a href="{{route('user.campaigns.index')}}"><button class="btn btn-primary rounded">View All Campaigns</button></a>
</div>
@endpush
@push('buttonContent')
<div class="col-12 text-center mt-3">
    <h2 class="page-title">Edit Marketing Campaign</h2>
</div>

@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        <form action="{{route('user.campaigns.update' , $edit->id)}}" id="form__campaign" method="POST">
            @csrf
            @method("PUT")
            <div class="auth-form">
                <div class="card">
                    <div class="card-body py-4 px-lg-4 px-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Artist Name</label>
                                    <input type="text" placeholder="Artist Name" class="form-control custom-control" id="artist_name" name="artist_name" value="{{!empty($edit->artist_name) ? $edit->artist_name  : ''}}">
                                    @error('artist_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" placeholder="Email" class="form-control custom-control" id="email" name="email" value="{{!empty($edit->email) ? $edit->email  : ''}}">
                                    @error("email") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Release Title</label>
                                    <input type="text" placeholder="Release Title" class="form-control custom-control" id="release_title" name="release_title" value="{{!empty($edit->release_title) ? $edit->release_title  : ''}}">
                                    @error("release_title") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Spotify Link</label>
                                    <input type="url" placeholder="Spotify Link" class="form-control custom-control" id="spotify_link" name="spotify_link" value="{{!empty($edit->spotify_link) ? $edit->spotify_link  : ''}}">
                                     @error("spotify_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Apple Music / iTunes Link</label>
                                    <input type="text" placeholder="Apple Music / iTunes Link" class="form-control custom-control" id="itune_link" name="itune_link" value="{{!empty($edit->itune_link) ? $edit->itune_link  : ''}}">
                                    @error("itune_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Soundcloud Link</label>
                                    <input type="text" placeholder="Soundcloud Link" class="form-control custom-control" id="soundcloud_link" name="soundcloud_link" value="{{!empty($edit->soundcloud_link) ? $edit->soundcloud_link  : ''}}">
                                    @error("soundcloud_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Music Video Link (YouTube/Vevo) (Optional)</label>
                                    <input type="text" placeholder="Music Video Link (YouTube/Vevo) (Optional)" class="form-control custom-control" id="musicvideo_link" name="musicvideo_link" value="{{!empty($edit->musicvideo_link) ? $edit->musicvideo_link  : ''}}">
                                    @error("musicvideo_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Facebook Link</label>
                                    <input type="text" placeholder="Facebook Link" class="form-control custom-control" id="facebook_link" name="facebook_link" value="{{!empty($edit->facebook_link) ? $edit->facebook_link  : ''}}">
                                    @error("facebook_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Twitter Link</label>
                                    <input type="text" placeholder="Twitter Link" class="form-control custom-control" id="twitter_link" name="twitter_link" value="{{!empty($edit->twitter_link) ? $edit->twitter_link  : ''}}">
                                    @error("twitter_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Instagram Link</label>
                                    <input type="text" placeholder="Instagram Link" class="form-control custom-control" id="instagram_link" name="instagram_link" value="{{!empty($edit->instagram_link) ? $edit->instagram_link  : ''}}">
                                     @error("instagram_link") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Contact Number</label>
                                    <input type="number" placeholder="Contact Number" class="form-control custom-control" id="contact" name="contact" value="{{!empty($edit->contact) ? $edit->contact  : ''}}">
                                     @error("contact") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3 position-relative input-icon">
                                    <label for="" class="form-label">Release Date</label>
                                    <input type="date" placeholder="Email" class="form-control custom-control" id="release_date" name="release_date" value="{{!empty($edit->release_date) ? $edit->release_date  : ''}}">
                                    <i class="cal"><img src="./assets/img/calender.png" alt=""></i>
                                    @error("release_date") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-lg-4 mb-3">
                                <h2 class="section-heading">What Are You Promoting</h2>
                            </div>
                           
                            <div class="mb-lg-4 mb-3">
                                <span class="check-tab position-relative cursor-pointer">Single <input class="opacity-0 position-absolute" type="radio"   name="is_single" id="single" @if($edit->is_single) checked @endif></span>
                                @error("is_single") <span class="text-danger">{{$message}}</span> @enderror
                                <span class="check-tab position-relative cursor-pointer">EP/Mixtape <input class="opacity-0 position-absolute" type="radio"  name="is_mixtape" id="mixtape" @if($edit->is_mixtape) checked @endif></span>
                                @error("is_mixtape") <span class="text-danger">{{$message}}</span> @enderror
                                <span class="check-tab position-relative cursor-pointer">Album <input class="opacity-0 position-absolute" type="radio"  name="is_album" id="album" @if($edit->is_album) checked @endif></span>
                                @error("is_album") <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Tell Us About The Release(Single, Album etc)</label>
                                    <textarea class="form-control custom-control h-auto" rows="4" name="previous_press"  id="previous_press">{{!empty($edit->previous_press) ? $edit->previous_press : ''}}</textarea>
                                    @error("previous_press") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Artist Biography</label>
                                    <textarea  class="form-control custom-control h-auto" rows="4" id="artist_biography" name="artist_biography">{{!empty($edit->artist_biography) ? $edit->artist_biography : ''}}</textarea>
                                    @error("artist_biography") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
@endsection
