@php  $artistIds = json_decode($release->artist_ids);  $artistRoles = json_decode($release->artist_role); $date = date('Y-m-d',strtotime($release->created_at)); @endphp
@if($artistIds > 0)
<div id="createAddArtistId">
    @forelse($artistIds as $i=>$artistID)
        <input type="hidden" id="artistIds_{{$artistID}}" value="{{$artistID}}" name="artist_id[]">
        @if(isset($artistRoles[$i]))
            <input type="hidden" id="artistRoles_{{$artistID}}" value="{{$artistRoles[$i]}}" name="artist_role[]">
        @endif
    @empty
    @endforelse
</div>
@endif
 <input type="hidden" id="hiddenArtistType" value="other">
 <input type="hidden" id="hiddenRole" value="">
<div class="">
    <label for="" class="">Artist</label>
</div>
<div class="" id="addMainPrimaryArtist" @if(count($artistIds) > 0) style="display: none;" @endif>
    <br>
    <button onclick="mainArtist($(this))" data-type="main" data-location="release" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Main Primary Artist</strong></button>
</div>
<div id="mainArtistDetail">
 @forelse($artistIds as $ii=>$rma)
    @php $rAelectedArtist = DB::table('artists')->where('artists.id' , $rma)->where('artists.user_id',auth()->user()->id)->first(['artists.name','artists.spotify_profile_link','artists.apple_music_profile_link']); @endphp
    @if($artistRoles[$ii] == 'main primary')
        <div id="artistContent_{{$rma}}">
        <div class="col-md-4 border border-primary artist_remove" style="border-color:#FFF301 !important; border-radius: 8px;" id="artist_{{$rma}}">
            <div class="row p-2">
                <div class="col-2">
                    <img src="{{asset('assets/portal-revamp/img/svg/profile-picture-placeholder.svg')}}" width="50">
                </div>
                <div class="col-6 text-left">
                    <h5 style="color:#FFF301">{{ $rAelectedArtist->name }}</h5>
                    <small style="color:#FFF301">{{ ucwords($artistRoles[$ii]) }} Artist</small>
                </div>
                <div class="col-4">
                    <div style="float:right">
                        @if(!empty($rAelectedArtist->spotify_profile_link))
                            <a href="javascript:;" onclick="editArtist({{ $rma }},'main')">
                                <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo.svg" class="gray" width="20" height="20">
                            </a>
                        @else
                            <a href="javascript:;" onclick="editArtist({{ $rma }},'main')" >
                                <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo-gray.svg" class="gray" width="20" height="20">
                            </a>
                        @endif
                        @if(!empty($rAelectedArtist->apple_music_profile_link))
                            <a href="javascript:;" onclick="editArtist({{ $rma }},'main')">
                                <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo.svg" class="gray" width="20" height="20">
                            </a>
                        @else
                            <a href="javascript:;" onclick="editArtist({{ $rma }},'main')" >
                                <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo-gray.svg" class="gray" width="20" height="20">
                            </a>
                        @endif
                        <a href="javascript:;" onclick="deleteArtist($(this),'main','{{ $rma }}','release')">
                        <img src="{{asset('assets/portal-revamp/img/svg/trash.svg')}}" width="20" height="40"></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endif
    @empty
    @endforelse
</div>
 <div id="otherArtistDetail" class="mt-4">
 @forelse($artistIds as $iii=>$roa)
    @php $oAelectedArtist = DB::table('artists')->where('artists.id' , $roa)->where('artists.user_id',auth()->user()->id)->first(['artists.name','artists.spotify_profile_link','artists.apple_music_profile_link']); @endphp
    @if($artistRoles[$iii] != 'main primary')
        <div id="artistContent_{{$roa}}">
            <div class="col-md-4 mt-2 border border-primary artist_remove" style="border-color:white !important; border-radius: 8px;" id="artist_{{$roa}}">
                <div class="row p-2">
                    <div class="col-2">
                        <img src="{{asset('assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg')}}" width="50">
                    </div>
                    <div class="col-6 text-left">
                        <h5 style="color:white">{{ $oAelectedArtist->name }}</h5>
                        <small style="color:white">{{ ucwords($artistRoles[$iii]) }} Artist</small>
                    </div>
                    <div class="col-4">
                        <div style="float:right">
                            @if(!empty($oAelectedArtist->spotify_profile_link))
                                <a href="javascript:;" onclick="editArtist({{ $roa }},'other')">
                                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo.svg" class="gray" width="20" height="20">
                                </a>
                            @else
                                <a href="javascript:;" onclick="editArtist({{ $roa }},'other')" >
                                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/spotify-logo-gray.svg" class="gray" width="20" height="20">
                                </a>
                            @endif
                            @if(!empty($oAelectedArtist->apple_music_profile_link))
                                <a href="javascript:;" onclick="editArtist({{ $roa }},'other')">
                                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo.svg" class="gray" width="20" height="20">
                                </a>
                            @else
                                <a href="javascript:;" onclick="editArtist({{ $roa }},'other')" >
                                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/apple-music-logo-gray.svg" class="gray" width="20" height="20">
                                </a>
                            @endif
                            <a href="javascript:;" onclick="deleteArtist($(this),'other','{{ $roa }}','release')">
                            <img src="{{asset('assets/portal-revamp/img/svg/trash.svg')}}" width="20" height="40"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @empty
    @endforelse
</div>
<div class="mb-2 mt-2" id="addOtherKeyArtist" @if(count($artistIds) == 0) style="display: none;" @endif>
    <button onclick="mainArtist($(this))" data-type="other" data-location="release" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Other Key Artist</strong></button>
</div>
