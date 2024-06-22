<div id="track_{{ $count }}">
    <div class="card-body py-4 px-lg-4 px-2" >
        <div class="mb-lg-4 mb-3">
            <input type="hidden" name="track_id" value="{{ $track->id }}">
            <label for="track_title" class="form-label">Track Title</label>
            <input type="text" name="track_title" placeholder="Track Title " class="form-control custom-control track_title" required value="{{$track->title}}">
        </div>
        <div class="mb-lg-4 mb-3">
            <label for="track_version" class="form-label">Track Version</label>
            <input type="text" name="track_version" placeholder="Track Version " class="form-control custom-control track_version" required value="{{$track->track_version}}">
        </div>
        <div class="mb-lg-4 mb-3">
            <label for="isrc" class="form-label">ISRC CODE</label>
            <input type="text" id="isrc" name="track_isrc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control" value="{{ $track->isrc_code }}">
        </div>
        {{-- @forelse(json_decode($track->artist) as $index=>$a)
            @if($index == 0)
                <div class="">
                    <label for="artist" class="form-label">Artist</label>
                    <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center ">
                        <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">
                        {!! Form::select('artist_track_type[]', artist(), isset($a->type) ? $a->type : null, ['id' => 'exampleFormControlSelect2', 'class' => 'form-control custom-control']) !!}
                        <i class="fa-solid fa-chevron-down select-icon"></i>
                    </div>
                    <div class="mb-lg-4 mb-3 w-100">
                        <input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control" value="{{ isset($a->name) ? $a->name : null }}">
                    </div>
                    <div class="mb-lg-4 mb-3 w-100">
                            <input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control" value="{{ isset($a->spotify) ? $a->spotify : null }}">
                        </div>
                    <div class="mb-lg-4 mb-3 w-100">
                            <input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control" value="{{ isset($a->apple) ? $a->apple : null }}">
                        </div>
                    <div class="mb-lg-4 mb-3">
                            <a href="javascript:;" id="artistTrack" class="addInput" onClick="addInput($(this),2)" data-id="{{ count(json_decode($track->artist)) - 1 }}">
                                <span class="increament"><i class="fa fa-plus"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            @else
            <div class="">
                <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center artist_track_{{ $count }}">
                    <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">
                    {!! Form::select('artist_track_type[]', artist(), isset($a->type) ? $a->type : null, ['id' => 'exampleFormControlSelect2', 'class' => 'form-control custom-control']) !!}
                    <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
                <div class="mb-lg-4 mb-3 w-100 artist_track_{{ $count }}">
                    <input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control" value="{{ isset($a->name) ? $a->name : null }}">
                </div>
                <div class="mb-lg-4 mb-3 w-100 artist_track_{{ $count }}">
                        <input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control" value="{{ isset($a->spotify) ? $a->spotify : null }}">
                    </div>
                <div class="mb-lg-4 mb-3 w-100 artist_track_{{ $count }}">
                    <input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control" value="{{ isset($a->apple) ? $a->apple : null }}">
                </div>
                <div class="mb-lg-4 mb-3 artist_track_{{ $count }}">
                    <a href="javascript:;" style="text-decoration: none !important" class="removeInput" onclick="removeInput($(this))" data-id="{{ $count }}" data-type="artistTrack">
                        <span class="increament bg-danger">
                            <i class="fa fa-times"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
            @endif
        @empty
        @endforelse --}}
        @if(count(json_decode($track->artist)) > 0)
            @forelse (json_decode($track->artist) as $item)
                @php
                    $data['name'] = asset($item->name) ? $item->name : null;
                    $data['role'] = asset($item->type) ? $item->type : null;
                    $data['spotify_profile_link'] = isset($item->spotify) ? $item->spotify : null;
                    $data['apple_music_profile_link'] = isset($item->apple) ? $item->apple : null;
                    $html = view('user-portal.pages.revamp.royalty-splits.artist',compact('data'));
                @endphp
                {!! $html !!}
            @empty

            @endforelse
        @endif
        <div id="createAddArtistIdTrack">
            @include('user-portal.pages.release.edit-artist')
        </div>
        <div class="trackArtist">
        </div>
    </div>
    <div class="card-body border-top">
        <div class="form-check ">
            <input class="form-check-input me-3" name="track_contains_1"type="radio" id="flexRadioDefault1" value="Contain Vocals" @if($track->contains_1 == 'Contain Vocals') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
            <span class="custom-label">Contain Vocals</span>
            <br>
            My Song contains lyrics and vocals
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" name="track_contains_1"type="radio" value="Instrumental"  id="flexRadioDefault2" @if($track->contains_1 == 'Instrumental') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
            <span class="custom-label">Instrumental</span>
            <br>
            My Song contains no lyrics and vocals
            </label>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="form-check">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault21" value="Clean" @if($track->contains_2 == 'Clean') checked @endif>
            <label class="form-check-label" for="flexRadioDefault21">
            <span class="custom-label">Clean</span>
            <br>
            My Song doesn't contain any profanity (Includes title & artwork)
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault22"  value="Explicit" @if($track->contains_2 == 'Explicit') checked @endif>
            <label class="form-check-label" for="flexRadioDefault22">
            <span class="custom-label">Explicit</span>
            <br>
            My Song contain any profanity (Includes title & artwork)
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault23" value="Radio Edit" @if($track->contains_2 == 'Radio Edit') checked @endif>
            <label class="form-check-label" for="flexRadioDefault23">
            <span class="custom-label">Radio Edit</span>
            <br>
            The track is clean/censored, but have a explict version.
            </label>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="mb-lg-4 mb-3 input-icon position-relative">
            <label for="" class="form-label">Language</label>
            <input type="text" id="track_language" name="track_language" placeholder="Language" required class="form-control custom-control" value="{{ $track->language }}">
        </div>
        @forelse(json_decode($track->songwriter) as $index=>$a)
            @if($index == 0)
                <div class="">
                    <label for="" class="form-label">Song Writers</label>
                    <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center">
                        <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">
                            {!! Form::select('songwriters_type[]', songwriter(), isset($a->type) ? $a->type : null, ['class' => 'form-control custom-control tracksongwriter_type', 'required']) !!}
                            <i class="fa-solid fa-chevron-down select-icon"></i>
                        </div>
                        <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                            <div class="mb-lg-4 mb-3 w-100">

                                <input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name" value="{{ isset($a->name) ? $a->name : null  }}">
                            </div>
                            <div class="mb-lg-4 mb-3">
                                <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="{{ count(json_decode($track->songwriter)) - 1 }}">
                                    <span class="increament"> <i class="fa fa-plus"></i> </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="songwriters_track_{{ $index }}">
                    <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center songwriters_track_{{ $index }}">
                        <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc songwriters_track_{{ $index }}">
                            {!! Form::select('songwriters_type[]', songwriter(), isset($a->type) ? $a->type : null, ['class' => 'form-control custom-control tracksongwriter_type', 'required']) !!}
                            <i class="fa-solid fa-chevron-down select-icon"></i>
                        </div>
                        <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                            <div class="mb-lg-4 mb-3 w-100 songwriters_track_{{ $index }}">

                                <input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name" value="{{ isset($a->name) ? $a->name : null }}">
                            </div>
                            <div class="mb-lg-4 mb-3 songwriters_track_{{ $index }}"><a href="javascritpt:;" style="text-decoration:none !important" class="removeInput" onclick="removeInput($(this))" data-id="{{$index}}" data-type="songWriter"><span class="increament bg-danger"> <i class="fa fa-times"></i> </span></a></div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="">
                <label for="" class="form-label">Song Writers</label>
                <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center">
                    <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">
                        {!! Form::select('songwriters_type[]', songwriter(), null, ['class' => 'form-control custom-control tracksongwriter_type', 'required']) !!}
                        <i class="fa-solid fa-chevron-down select-icon"></i>
                    </div>
                    <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                        <div class="mb-lg-4 mb-3 w-100">

                            <input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name" value="">
                        </div>
                        <div class="mb-lg-4 mb-3">
                            <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="0">
                                <span class="increament"> <i class="fa fa-plus"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

        <div class="d-md-flex justify-content-between gap-3">
            <div class="mb-lg-4 mb-3 w-50    position-relative input-icon">
               <label for="" class="form-label">&#8471; Copyright</label>
               <select name="track_p_copyright_year" id="track_p_copyright_year"   class="form-control custom-control">
                <option value="">Select Year</option>
                  @forelse (copyrightYear() as $copyright)
                        <option value="{{$copyright}}" @if($copyright == $track->p_copyright_year) selected @endif>{{$copyright}}</option>
                  @empty
                  @endforelse
               </select>
               <i class="fa-solid fa-chevron-down select-icon"></i>
            </div>
            <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
               <label for="" class="form-label">&nbsp;</label>
               <input type="text" name="track_p_copyright_name" id="p_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control" value="{{$track->p_copyright_name}}" >
            </div>
        </div>

        <div class=" songWriterContent" style="">
        </div>

        <div class="trackContent">
        </div>
    </div>
</div>
