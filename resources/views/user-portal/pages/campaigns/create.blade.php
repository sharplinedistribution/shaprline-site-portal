@extends('layouts.portal_revamp_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">


    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card p-4">
                <p>Thank you for signing up with Sharpline Distro to distribute & promote your music on The Press, Apple Music and Spotify. We promote every song & album released under Sharpline Distro for Free. We will need the following to start submitting your music to Media Outlets.
                </p>
                <p>Please fill out the form below and our team will start your marketing campaign on the single & album you will want us to promote</p>

            </div>
        </div>
        <div class="col-lg-2">
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
            <form action="{{route('user.campaigns.store')}}" id="form__campaign" method="POST">
                @csrf
                <div class="row">
                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName"
                                                placeholder="Last Name">
                                        </div>
                                    </div> -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="artistName">Artist Name</label>
                            <input type="text" class="form-control" name="artist_name" id="artistName" value="{{old('artist_name')}}" placeholder="Artist Name">
                            @error('artist_name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                            @error("email") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="releastTitle">Release Title</label>
                            <input type="text" class="form-control" name="release_title" id="releastTitle" value="{{old('release_title')}}" placeholder="Release Title">
                            @error("releas_title") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="spotifyLink">Spotify Link</label>
                            <input type="url" class="form-control" name="spotify_link" id="shopifyLink" value="{{old('spotify_link')}}" placeholder="Spotify Link">
                            @error("spotify_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="appleLink">Apple Music / iTunes Link</label>
                            <input type="url" class="form-control" name="itune_link" id="appleLink" value="{{old('itune_link')}}" placeholder="Apple Music / iTunes Link">
                            @error("itune_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="soundCLink">Soundcloud Link</label>
                            <input type="url" class="form-control" name="soundcloud_link" id="soundCLink" value="{{old('soundcloud_link')}}" placeholder="Soundcloud Link">
                            @error("soundcloud_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="musicVideoLink">Music Video Link (YouTube/Vevo)
                                (Optional)</label>
                            <input type="url" class="form-control" name="musicvideo_link" id="musicVideoLink" value="{{old('musicvideo_link')}}" placeholder="Music Video Link (YouTube/Vevo) (Optional)">
                            @error("musicvideo_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="fbLink">Facebook Link</label>
                            <input type="url" class="form-control" name="facebook_link" id="fbLink" value="{{old('facebook_link')}}" placeholder="Facebook Link">
                            @error("facebook_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> --}}

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="twLink">Twitter Link</label>
                            <input type="url" class="form-control" name="twitter_link" id="twLink" value="{{old('twitter_link')}}" placeholder="Twitter Link">
                            @error("twitter_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="igLink">Instagram Link</label>
                            <input type="url" class="form-control" name="instagram_link" id="igLink" value="{{old('instagram_link')}}" placeholder="Instagram Link">
                            @error("instagram_link") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="number" class="form-control" name="contact" id="contactNumber" value="{{old('contact')}}" placeholder="Contact Number">
                            @error("contact") <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="releaseDate">Release Date</label>
                            <input type="date" class="form-control" name="release_date" id="releaseDate" value="{{old('release_date')}}" placeholder="Instagram Link">
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
                                    <input type="checkbox" class="form-check-input" style="border:1px solid #fbda03 !important ;" name="is_single"> Single </label>
                                @error("is_single") <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-check">
                                <label class="form-check-label" style="color: #fff;">
                                    <input type="checkbox" class="form-check-input" style="border:1px solid #fbda03 !important ;" name="is_mixtape"> EP/Mixtape
                                </label>
                                @error("is_mixtape") <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-check" style="margin-left: 10px;">
                                <label class="form-check-label" style="color: #fff;">
                                    <input type="checkbox" class="form-check-input" style="border:1px solid #fbda03 !important ;" name="is_album"> Album </label>
                                @error("is_album") <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prevPress">Previous Press</label>
                            <textarea class="form-control" id="prevPress" name="previous_press" rows="6" spellcheck="false" placeholder="Previous Press">{{old('previous_press') }}</textarea>
                            @error("previous_press") <span class="text-danger">{{$message}}</span> @enderror

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="artBio">Artist Biography</label>
                            <textarea class="form-control" id="artBio" name="artist_biography" rows="6" spellcheck="false" placeholder="Artist Biography">{{old('artist_biography') }}</textarea>
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
<!-- inject:js -->
<script src="{{asset('web/js/off-canvas.js')}}"></script>
<script src="{{asset('web/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('web/js/misc.js')}}"></script>
<script src="{{asset('web/js/settings.js')}}"></script>
<script src="{{asset('web/js/todolist.js')}}"></script>
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('web/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('web/js/chart.js')}}"></script>
<script type="">
    $(document).ready(function () {
        alert("working");

    });
    $("#campaign_nav").removeClass("active");
    $("#support_nav").removeClass("active");



</script>

@endpushmaster
