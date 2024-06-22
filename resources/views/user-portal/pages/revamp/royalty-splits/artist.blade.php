<div class="col-md-4 mt-2 border border-primary artist_remove" style="border-color:white !important; border-radius: 8px;" id="artist_17">
    <div class="row p-2">
       <div class="col-2">
          <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg" width="50">
       </div>
       <div class="col-6 text-left">
          <h5 style="color:white">{{isset($data['name']) ? $data['name'] : '-'}}</h5>
          <small style="color:white">{{isset($data['role']) ? ucwords($data['role']) : '-'}} </small>
       </div>
       <div class="col-4">
          <div style="float:right">
            @if(!empty($data['spotify_profile_link']))
                <a href="{{$data['spotify_profile_link']}}" target="_blank">
                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo.svg" class="gray" width="20" height="20">
                </a>
            @else
                <a href="javascript:;" >
                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo-gray.svg" class="gray" width="20" height="20">
                </a>
            @endif
            @if(!empty($data['apple_music_profile_link']))
                <a href="{{$data['apple_music_profile_link']}}" target="_blank">
                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo.svg" class="gray" width="20" height="20">
                </a>
            @else
                <a href="javascript:;" >
                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo-gray.svg" class="gray" width="20" height="20">
                </a>
            @endif
            </div>
       </div>
    </div>
 </div>
