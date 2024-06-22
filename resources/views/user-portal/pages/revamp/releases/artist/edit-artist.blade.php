<form  method="post" id="editArtist" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="editArtistID" value="{{$artist->id}}">
    <div class="row">
        <div class="col-md-12">
            <h6 class="text-white">Edit Artist</h6>
        </div>
    </div>
    <center>
    <div class="row">
        <div class="small-12 medium-2 large-2 columns ">
        <div class="circle">
            @if(isset($artist->avatar))
                <img class="profile-pic" src="{{ asset(config('upload_path.artist_avatar').$artist->avatar) }}">
            @else
                <img class="profile-pic" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">
            @endif

        </div>
        <div class="p-image">
            <input id="editArtistAvatar" class="file-upload-artist" type="file" accept="image/*" name="editAvatar"/>
        </div>
    </div>
    </div>
    </center>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label for="" class="text-white">Official Artist/Brand Name</label>
            <input type="text" name="editName" id="editArtistName"  class="form-control" placeholder="Offical name" required value="{{ $artist->name }}">
            <small style="color:rgb(147, 143, 143);">The artist name must be written exactly as you want it to appear on music services suchas Spotify, Apple Music, etc</small>
        </div>
        <div class="col-md-12 mt-3" >
            <label for="" class="form-label text-white">Is there Artist on Spotify? (required when distributing to Spotify)</label>
            <div class="form-check ">
                <input class="form-check-input me-3 spotify_profile_link2" name="spotify_profile_link2" type="radio" value="1" @if(!empty($artist->spotify_profile_link)) checked @endif id="flexRadioDefault102"  onChange="spotifyProfileLink2($(this))">
                <label class="form-check-label" for="flexRadioDefault102">
                <span class="custom-label text-white">Yes</span>

                </label>
            </div>

            <div class="form-check ">
                <input class="form-check-input me-3 spotify_profile_link2" name="spotify_profile_link2" type="radio" id="flexRadioDefault101" value="0"  @if(empty($artist->spotify_profile_link)) checked @endif  onChange="spotifyProfileLink2($(this))">
                <label class="form-check-label" for="flexRadioDefault101">
                <span class="custom-label text-white">No, create a new Spotify profile for this artist</span>

                </label>
            </div>
            <div class="spotifyProfileLink" @if(!empty($artist->spotify_profile_link)) @else  style="display:none" @endif  >
                <input type="url" name="edit_spotify_link" id="spotify_link" class="form-control" placeholder="Artist Spotify Profile Link" value="{{ $artist->spotify_profile_link }}">
            </div>
        </div>

        <div class="col-md-12 mt-3" >
            <label for="" class="form-label text-white">Is there Artist on Apple Music? (required when distributing to Apple Music)</label>
            <div class="form-check ">
                <input class="form-check-input me-3 apple_music_profile_link2" name="apple_music_profile_link2"  type="radio" value="1" @if(!empty($artist->apple_music_profile_link)) checked @endif  id="flexRadioDefault202"   onChange="appleMusicProfileLink2($(this))">
                <label class="form-check-label" for="flexRadioDefault202">
                <span class="custom-label text-white">Yes</span>
                </label>
            </div>
            <div class="form-check ">
                <input class="form-check-input me-3 apple_music_profile_link2" name="apple_music_profile_link2" type="radio" id="flexRadioDefault201" value="0"  @if(empty($artist->apple_music_profile_link)) checked @endif onChange="appleMusicProfileLink2($(this))">
                <label class="form-check-label" for="flexRadioDefault201">
                <span class="custom-label text-white">No, create a new Apple Music profile for this artist</span>

                </label>
            </div>
            <div class="appleMusicProfileLink" @if(!empty($artist->apple_music_profile_link)) @else  style="display:none" @endif>
                <input type="url" name="edit_apple_music_link" id="apple_music_link" class="form-control" placeholder="Artist Apple Music Profile Link" value="{{$artist->apple_music_profile_link}}">
            </div>
        </div>
    </div>

    <div class="row mt-3 ">
        <div class="col-md-12" >
            <div style="float:right">
                <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModal($(this))">Cancel</button>&nbsp;
                <button type="button" onClick="updateArtist($(this))" class="btn btn-primary" data-type="{{ $type }}" >Edit Artist</button>
            </div>
        </div>
    </div>
</form>
