@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3>Hi, <span style="color: #fbda03;">{{Auth::user()->name}}</span></h3>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-lg" href="{{route('user.campaigns.index')}}" style="background-color:#fbda03; color: #333;;">View All Campaigns</a>
        </div>
        <div class="col-lg-12">
            <h2 class="text-center" style="color: #fbda03;">{{$title}}</h2>
        </div>
    </div>
    <div class="section__campaignForm mt-5">
        <div class="mb-3">
            @if($errors->any())
            @foreach($errors->all() as $value)
            <span class="text-danger" style="font-size:15px;"> {{$value}} </span><br>
            @endforeach

            @endif
        </div>
        <div class="container-fluid">
            <form action="{{route('user.campaigns.update' , $edit->id)}}" id="form__campaign" method="POST">
                @csrf
                @method("PUT")
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="artistName">Artist Name</label>
                            <input type="text" class="form-control" name="artist_name" id="artistName" value="{{!empty($edit->artist_name) ? $edit->artist_name  : ''}}" placeholder="Artist Name">
                            @error('artist_name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{!empty($edit->email) ? $edit->email  : ''}}" placeholder="Email">
                            @error("email") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="releastTitle">Release Title</label>
                            <input type="text" class="form-control" name="release_title" id="releastTitle" value="{{!empty($edit->release_title) ? $edit->release_title  : ''}}" placeholder="Release Title">
                            @error("releas_title") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="spotifyLink">Spotify Link</label>
                            <input type="url" class="form-control" name="spotify_link" id="shopifyLink" value="{{!empty($edit->spotify_link) ? $edit->spotify_link  : ''}}" placeholder="Spotify Link">
                            @error("spotify_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="appleLink">Apple Music / iTunes Link</label>
                            <input type="url" class="form-control" name="itune_link" id="appleLink" value="{{!empty($edit->itune_link) ? $edit->itune_link  : ''}}" placeholder="Apple Music / iTunes Link">
                            @error("itune_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="soundCLink">Soundcloud Link</label>
                            <input type="url" class="form-control" name="soundcloud_link" id="soundCLink" value="{{!empty($edit->soundcloud_link) ? $edit->soundcloud_link  : ''}}" placeholder="Soundcloud Link">
                            @error("soundcloud_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="musicVideoLink">Music Video Link (YouTube/Vevo)
                                (Optional)</label>
                            <input type="url" class="form-control" name="musicvideo_link" id="musicVideoLink" value="{{!empty($edit->musicvideo_link) ? $edit->musicvideo_link  : ''}}" placeholder="Music Video Link (YouTube/Vevo) (Optional)">
                            @error("musicvideo_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="fbLink">Facebook Link</label>
                            <input type="url" class="form-control" name="facebook_link" id="fbLink" value="{{!empty($edit->facebook_link) ? $edit->facebook_link  : ''}}" placeholder="Facebook Link">
                            @error("facebook_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="twLink">Twitter Link</label>
                            <input type="url" class="form-control" name="twitter_link" id="twLink" value="{{!empty($edit->twitter_link) ? $edit->twitter_link  : ''}}" placeholder="Twitter Link">
                            @error("twitter_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="igLink">Instagram Link</label>
                            <input type="url" class="form-control" name="instagram_link" id="igLink" value="{{!empty($edit->instagram_link) ? $edit->instagram_link  : ''}}" placeholder="Instagram Link">
                            @error("instagram_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="number" class="form-control" name="contact" id="contactNumber" value="{{!empty($edit->contact) ? $edit->contact  : ''}}" placeholder="Contact Number">
                            @error("contact") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="releaseDate">Release Date</label>
                            <input type="date" class="form-control" name="release_date" id="releaseDate" value="{{!empty($edit->release_date) ? $edit->release_date  : ''}}" placeholder="Instagram Link">
                            @error("release_date") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h3 style="color: #fbda03;">What Are You Promoting</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group d-flex">
                            <div class="form-check" style="margin-right:10px ;">
                                <label class="form-check-label" style="color: #fff;">
                                    <input type="checkbox" class="form-check-input" @if($edit->is_single == 1) checked @endif style="border:1px solid #fbda03 !important ;" name="is_single"> Single </label>
                                @error("is_single") <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-check">
                                <label class="form-check-label" style="color: #fff;">
                                    <input type="checkbox" class="form-check-input" @if($edit->is_mixtape == 1) checked @endif style="border:1px solid #fbda03 !important ;" name="is_mixtape"> EP/Mixtape
                                </label>
                                @error("is_mixtape") <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-check" style="margin-left: 10px;">
                                <label class="form-check-label" style="color: #fff;">
                                    <input type="checkbox" class="form-check-input" @if($edit->is_album == 1) checked @endif style="border:1px solid #fbda03 !important ;" name="is_album"> Album </label>
                                @error("is_album") <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prevPress">Previous Press</label>
                            <textarea class="form-control" id="prevPress" name="previous_press" rows="6" spellcheck="false" placeholder="Previous Press">{{!empty($edit->previous_press) ? $edit->previous_press  : ''}}</textarea>
                            @error("previous_press") <span class="text-danger">{{$message}}</span> @enderror

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="artBio">Artist Biography</label>
                            <textarea class="form-control" id="artBio" name="artist_biography" rows="6" spellcheck="false" placeholder="Artist Biography">{{!empty($edit->artist_biography) ? $edit->artist_biography  : ''}}</textarea>
                            @error("artist_biography") <span class="text-danger">{{$message}}</span> @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg" style="background-color:#fbda03; color: #333;;">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <!-- Music Plateforms -->



    <!-- partial -->
</div>


@endsection
@push("scripts")


<script src="{{asset('web/js/off-canvas.js')}}"></script>
<script src="{{asset('web/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('web/js/misc.js')}}"></script>
<script src="{{asset('web/js/settings.js')}}"></script>
<script src="{{asset('web/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('web/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('web/js/chart.js')}}"></script>
<script type="">
 
   
    

</script>

@endpushmaster