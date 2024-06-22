<div id="track_{{ $count }}">
    <div class="card-body py-4 px-lg-4 px-2" >
        <div class="mb-lg-4 mb-3">
            <label for="track_title" class="form-label">Title Track</label>
            <input type="text" name="track_title" placeholder="Title Track" class="form-control custom-control track_title"  value="">
        </div>
        <div class="mb-lg-4 mb-3">
            <label for="track_version" class="form-label">Title Version</label>
            <input type="text" name="track_version" placeholder="Track Version" class="form-control custom-control track_version"  value="">
        </div>
        <div class="mb-lg-4 mb-3">
            <label for="isrc" class="form-label">ISRC CODE</label>
            <input type="text" id="isrc" name="track_isrc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control" >
        </div>
        <div id="createAddArtistIdTrack"></div>
        <div class="trackArtist"></div>
        <div class="">
            <label for="" class="">Artist</label>
        </div>
        <div class="" id="addMainPrimaryArtistTrack">
            <br>
            <button onclick="mainArtist($(this))" data-type="main" data-location="track" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Main Primary Artist</strong></button>
        </div>
        <div id="mainArtistDetailTrack">
        </div>
        <div id="otherArtistDetailTrack" class="mt-4">
        </div>
        <div class="mb-2 mt-2" id="addOtherKeyArtistTrack" style="display: none">
            <button onclick="mainArtist($(this))" data-type="other" data-location="track" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Other Key Artist</strong></button>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="form-check ">
            <input class="form-check-input me-3" name="track_contains_1"type="radio" id="flexRadioDefault1" value="Contain Vocals" >
            <label class="form-check-label" for="flexRadioDefault1">
            <span class="custom-label">Contain Vocals</span>
            <br>
            My Song contains lyrics and vocals
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" name="track_contains_1"type="radio" value="Instrumental"  id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
            <span class="custom-label">Instrumental</span>
            <br>
            My Song contains no lyrics and vocals
            </label>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="form-check">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault21" >
            <label class="form-check-label" for="flexRadioDefault21">
            <span class="custom-label">Clean</span>
            <br>
            My Song doesn't contain any profanity (Includes title & artwork)
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault22" checked value="Explicit" checked >
            <label class="form-check-label" for="flexRadioDefault22">
            <span class="custom-label">Explicit</span>
            <br>
            My Song contain any profanity (Includes title & artwork)
            </label>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault23" value="Radio Edit" >
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
            <input type="text" id="track_language" name="track_language" placeholder="Language"  class="form-control custom-control" >
        </div>
        <div class="">
            <label for="" class="form-label">Song Writers</label>
            <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center">
                <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">
                    {!! Form::select('songwriters_type[]', songwriter(),  null, ['class' => 'form-control custom-control tracksongwriter_type']) !!}
                    <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
                <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                    <div class="mb-lg-4 mb-3 w-100">

                        <input type="text" name="songwriters_name[]"  placeholder="Name" class="form-control custom-control tracksongwriter_name" >
                    </div>
                    <div class="mb-lg-4 mb-3">
                        <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="{{ $count }}">
                            <span class="increament"> <i class="fa fa-plus"></i> </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-flex justify-content-between gap-3">
            <div class="mb-lg-4 mb-3 w-50    position-relative input-icon">
               <label for="" class="form-label">&#8471; Copyright</label>
               <select name="track_p_copyright_year" id="track_p_copyright_year"   class="form-control custom-control">
                <option value="">Select Year</option>
                  @forelse (copyrightYear() as $copyright)
                        <option value="{{$copyright}}" >{{$copyright}}</option>
                  @empty
                  @endforelse
               </select>
               <i class="fa-solid fa-chevron-down select-icon"></i>
            </div>
            <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
               <label for="" class="form-label">&nbsp;</label>
               <input type="text" name="track_p_copyright_name" id="p_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control"  >
            </div>
        </div>



        <div class=" songWriterContent" style="">
        </div>

        <div class="trackContent">
        </div>
    </div>
</div>
