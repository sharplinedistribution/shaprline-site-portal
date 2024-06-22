@extends('layouts.portal_revamp_scaffold')
@push('styles')
<style>

    .cover
    {
        border: 2px solid #e2e2e2;
        /* margin-left: 50px; */
        margin-top: 20px;
    }

    .profile-pic {
        width: 200px;
        max-height: 200px;
        display: inline-block;
    }


    .circle {
        left: 33px;
        border-radius: 100% !important;
        overflow: hidden;
        width: 120px;
        height: 120px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        position: relative;
        top: -65px;
    }


    img {
            max-width: 100%;
            height: auto;
        }
        .p-image {
        position: absolute;
        top: 160px;
        right: 238px;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }


    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .titleNBadge{
        position: relative;
        top: -45px;
        left: 30px;
    }
    hr {
            height: 2px;
            background-color:#F7EC02;
            border: none;
        }

         .btn.disabled, .btn:disabled, fieldset:disabled .btn {
        color: black;
        background-color: var(--primary);
        border-color: var(--primary);
    }
</style>
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        <div  style="background: #F7EC02; padding: 5rem;">
            &nbsp;
        </div>
        <div class="circle">
            @if(isset($artist->avatar))
            <img class="profile-pic" src="{{ asset(config('upload_path.artist_avatar').$artist->avatar) }}">
            @else
            <img class="profile-pic" src="{{ asset('assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg') }}">
            @endif
        </div>
        <div class="titleNBadge">
            <span class="badge bg-default" style="background: #F7EC02; color:black;">ARTIST ID: {{ ($artist->id + 10000) }}</span>
                <h1 style="color:#F7EC02">{{ $artist->name }}</h1>
                @if(!empty($artist->spotify_profile_link))
                    <a href="{{ $artist->spotify_profile_link }}" target="_blank">
                        <img src="{{ asset('assets/portal-revamp/img/svg/spotify-logo.svg') }}" class="gray" width="20" height="20">
                    </a>
                @else
                    <a href="javascript:;" >
                        <img src="{{ asset('assets/portal-revamp/img/svg/spotify-logo-gray.svg') }}" class="gray" width="20" height="20">
                    </a>
                @endif
                @if(!empty($artist->apple_music_profile_link))
                    <a href="{{ $artist->apple_music_profile_link }}" target="_blank">
                        <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-logo.svg') }}" class="gray" width="20" height="20">
                    </a>
                @else
                    <a href="javascript:;" >
                        <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-logo-gray.svg') }}" class="gray" width="20" height="20">
                    </a>
                @endif
            </div>

            <div class="row px-lg-4 mt-4">
                @if(!empty($artist->spotify_profile_link))
                    <div class="col-md-4">
                        <div class="p-5  mr-2 ml-2" style="background: #2BCF57; height:280px;">
                            @php $aID = explode('/',$artist->spotify_profile_link);  $artistID = end($aID); @endphp

                            <h6>Artist Player ID <small style="float:right; font-size:10px;" >{{ Str::limit($artistID,'10','...') }}</small></h6>

                            <img src="{{ asset('assets/portal-revamp/img/svg/spotify-white.svg') }}">
                            <a href="{{ $artist->spotify_profile_link }}" class="text-dark" target="_blank"><h6 class="mt-3">Artist ID for Spotify ></h6></a>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="p-5  mr-2 ml-2" style="background: #a6a9a7; height:280px;">
                            <h6>Artist Player ID <small style="float:right; font-size:10px;" >-</small></h6>
                            <img src="{{ asset('assets/portal-revamp/img/svg/spotify-white.svg') }}">
                            <a href="javascript:;"   class="text-dark"><h6 class="mt-3">Connect ></h6></a>
                        </div>

                    </div>
                @endif
                @if(!empty($artist->apple_music_profile_link))
                    <div class="col-md-4">
                        <div class="p-5 bg-primary" style="background-image: linear-gradient(-45deg, #35C3F3 0%, #8b9fe8 20%, #e681d8 39%, #ffa9a4 76%, #FED2CE 100%); height:280px;">
                            @php $aID = explode('/',$artist->apple_music_profile_link);  $artistID = end($aID); @endphp
                            <h6 >Artist Player ID<small style="float:right; font-size:10px;" >{{ Str::limit($artistID,'10','...') }}</small></h6>
                            <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-white.svg') }}" height="300px">
                            <a href="{{ $artist->apple_music_profile_link }}" target="_blank" class="text-dark"><h6 class="mt-4">Artist ID for Apple Music ></h6></a>

                        </div>
                    </div>
                @else
                    <div class="col-md-4">

                        <div class="p-5 " style="background: #a6a9a7; height:280px;">
                            <h6>Artist Player ID <small style="float:right; font-size:10px;" >-</small></h6>
                            <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-white.svg') }}" height="300px">
                            <a href="javascript:;"    class="text-dark"><h6 class="mt-4">Connect ></h6></a>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="musicLinksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-body bg-dark">
            <form action="{{route('user.rightsHolders.updateProfileLink',$id)}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" id="musicLabel" class="text-white"></label>
                        <input type="hidden" name="musicType" id="musicType" required>
                        <input type="url" class="form-control" name="musicLink" id="musicLink" required>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-md-12" >
                        <div style="float:right">
                            <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModal($(this))">Cancel</button>&nbsp;
                            <button type="submit" class="btn btn-primary" >Add Profile Link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function musicLinks(elm,type){
        $("#musicLabel").html(type+' Profile Link');
        $("#musicType").val(type);
        $("#musicLinksModal").modal('show');
    }
</script>
@endpush
