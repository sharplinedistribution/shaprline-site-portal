<div id="artistContent_{{ $artist->id }}">
<div class="col-md-4 mt-2 border border-primary artist_remove" style="border-color:white !important; border-radius: 8px;" id="artist_{{$artist->id}}">
    <div class="row p-2">
        <div class="col-2">
            @if(!empty($artist->avatar))
                <img src="{{asset(config('upload_path.artist_avatar').$artist->avatar)}}" width="50">
            @else
                <img src="{{asset('assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg')}}" width="50">
            @endif
        </div>
        <div class="col-6 text-left">
            <h5 style="color:white">{{ $artist->name }}</h5>
            <small style="color:white">{{  ucwords($role) }} Artist</small>
        </div>
        <div class="col-4" >
            <div style="float:right">
                @if(!empty($artist->spotify_profile_link))
                    <a href="javascript:;" onClick="editArtist({{ $artist->id }},'other')">
                        <img src="{{ asset('assets/portal-revamp/img/svg/spotify-logo.svg') }}" class="gray" width="20" height="20">
                    </a>
                @else
                    <a href="javascript:;" onClick="editArtist({{ $artist->id }},'other')">
                        <img src="{{ asset('assets/portal-revamp/img/svg/spotify-logo-gray.svg') }}" class="gray" width="20" height="20">
                    </a>
                @endif
                @if(!empty($artist->apple_music_profile_link))
                    <a href="javascript:;" onClick="editArtist({{ $artist->id }},'other')">
                        <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-logo.svg') }}" class="gray" width="20" height="20">
                    </a>
                @else
                    <a href="javascript:;" onClick="editArtist({{ $artist->id }},'other')">
                        <img src="{{ asset('assets/portal-revamp/img/svg/apple-music-logo-gray.svg') }}" class="gray" width="20" height="20">
                    </a>
                @endif
                <a href="javascript:;" onClick="deleteArtist($(this),'other','{{$artist->id}}','{{ $location }}')">
                    <img src="{{ asset('assets/portal-revamp/img/svg/trash.svg') }}" width="20" height="40"></a>
            </div>
        </div>
    </div>
</div>
</div>
