@extends('layouts.portal_revamp_scaffold')
@push('styles')
<style>
    .btn.disabled, .btn:disabled, fieldset:disabled .btn {
        color: black;
        background-color: var(--primary);
        border-color: var(--primary);
    }
    .image-album {
        position: relative;
        height: 150px;
        width: 250px;

        padding: 5px;
        margin-bottom: 20px;
    }
    .cross {
        position: absolute;
        right: 0;
        top: 0;
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        background-color: rgb(148, 45, 45);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        cursor: pointer;
    }

    .form-check-input[type=checkbox]:checked {
        background-color: black;
        }





</style>
@endpush
@push('buttonContent')
<div class="col-12 text-center mt-3">
    <h2 class="page-title">Create Video Release</h2>
</div>
<div class="col-lg-7 col-md-9 mx-auto mt-4">
    <div class="card">
        <div class="card-body">
            <p class="markting-salutaion">
               If you don't have a VEVO channel please note that VEVO processes all new channel request on Mondays only. This means if you request on a Tuesday, you will need to wait until the following Monday.
            </p>
            <p class="markting-salutaion">
               Make sure to distribute the track as a single on Create Release before distributing the music video for Vevo.  
            </p>

        </div>
    </div>
</div>
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
 
   <div class="col-12">
      {!! Form::model($release,['route' => ['user.video-release.update', $release->id], 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
      @method('PUT')
      <div id="audioTracks"></div>
      <div class="auth-form">
         <div class="card">
            <div class="card-body py-4 px-lg-4 px-2">
               <input type="hidden" name="number_of_songs" id="number_of_songs" value="1">
               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">Video Title</label>
                  <input type="text" name="video_title" id="alTitle" required placeholder="Video Title" class="form-control custom-control" value="{{$release->video_title}}">
               </div>
               <div class="mb-lg-4 mb-3">
                <label for="" class="form-label">Do you have a Vevo channel?</label>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="vevo"type="radio" id="flexRadioDefault1" value="yes" onchange="vevoLink($(this))" @if(!empty($release->vevo_link)) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                    <span class="custom-label">Yes</span>

                    </label>
                </div>
                <div class="mb-lg-4 mb-3" id="vevoLink" @if(empty($release->vevo_link)) style="display:none" @endif>
                    <input type="text" name="vevo_link" id="vevo_link"  placeholder="Insert Link" class="form-control custom-control" value="{{ $release->vevo_link }}">
                 </div>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="vevo" type="radio" value="no"  id="flexRadioDefault2"  onchange="vevoLink($(this))" @if(empty($release->vevo_link)) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    <span class="custom-label">No</span> <small>(We will create one for you)</small>

                    </label>
                </div>
               </div>

               <div class="mb-lg-4 mb-3">
                <label for="" class="form-label">Is this video made for Kids?</label>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="is_video_made_for_kids" type="radio" id="flexRadioDefault11" value="yes" @if($release->is_video_made_for_kids == "yes") checked @endif>
                    <label class="form-check-label" for="flexRadioDefault11">
                    <span class="custom-label">Yes</span>
                    </label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="is_video_made_for_kids" type="radio" value="no"  id="flexRadioDefault22" @if($release->is_video_made_for_kids == "no") checked @endif >
                    <label class="form-check-label" for="flexRadioDefault22">
                        <span class="custom-label">No</span>
                    </label>
                </div>
               </div>



               <div class="mb-lg-4 mb-3">
                <label for="" class="form-label">Is this video currently on YouTube?</label>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="youtube" type="radio" id="flexRadioDefault10" value="yes" onchange="youtubeLink($(this))" @if(empty($release->youtube_link)) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault10">
                    <span class="custom-label">Yes</span>

                    </label>
                </div>
                <div class="mb-lg-4 mb-3" id="youtubeLink" @if(empty($release->youtube_link)) style="display:none" @endif >
                    <input type="text" name="youtube_link" id="youtube_link"  placeholder="Insert Link" class="form-control custom-control" value="{{ $release->vevo_link }}">
                 </div>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="youtube" type="radio" value="no"  id="flexRadioDefault20"  onchange="youtubeLink($(this))" @if(empty($release->youtube_link)) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault20">
                    <span class="custom-label">No</span>

                    </label>
                </div>
               </div>

               @forelse(json_decode($release->artist) as $index=>$a)
               @if($index == 0)
                   <div class="">
                       <label for="" class="form-label">Artist</label>
                       <div class="d-lg-flex justify-content-between gap-3 align-items-center ">
                           <div class="mb-lg-4 mb-3 w-100 input-icon inc position-relative artist_{{ $index }}">
                               {!! Form::select('artist['.$index.'][type]', artist(), $a->type, ['class' => 'form-control custom-control artist', 'required']) !!}
                               <i class="fa-solid fa-chevron-down select-icon"></i>
                           </div>
                           <div class="d-flex w-100 justify-content-between gap-3 align-items-center artist_{{ $index }}">
                               <div class="mb-lg-4 mb-3 w-100">
                                   <input type="text"  name="artist[{{ $index }}][name]"  placeholder="Artist Name" class="form-control custom-control artist_name" required value="{{$a->name}}">
                               </div>
                               <div class="mb-lg-4 mb-3">
                                   <a href="javascript:;" id="addArtist" class="addInput" onClick="addInput($(this),'artist')" data-id="{{ count(collect(json_decode($release->artist))) - 1 }}">
                                       <span class="increament"><i class="fa fa-plus"></i></span>
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               @else
                   <div class="">
                       <div class="d-lg-flex justify-content-between gap-3 align-items-center ">
                           <div class="mb-lg-4 mb-3 w-100 input-icon inc position-relative artist_{{ $index }}">
                               {!! Form::select('artist['.$index.'][type]', artist(), $a->type, ['class' => 'form-control custom-control artist', 'required']) !!}
                               <i class="fa-solid fa-chevron-down select-icon"></i>
                           </div>
                           <div class="d-flex w-100 justify-content-between gap-3 align-items-center artist_{{ $index }}">
                               <div class="mb-lg-4 mb-3 w-100">
                                   <input type="text"  name="artist[{{ $index }}][name]"  placeholder="Artist Name" class="form-control custom-control artist_name" required value="{{$a->name}}">
                               </div>
                               <div class="mb-lg-4 mb-3 artist_{{ $index }}"><a href="javascript:;" style="text-decoration:none !important" class="removeInput" onclick="removeInput($(this))" data-id="{{ $index}}" data-type="artist"><span class="increament bg-danger"><i class="fa fa-times"></i></span></a></div>
                           </div>
                       </div>
                   </div>
               @endif
          @empty
          @endforelse
        <div class="row input-group-list artistContent"></div>


            <div class="d-md-flex justify-content-between gap-3">
                <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                   <label for="" class="form-label">Primary Genre</label>
                   {!! Form::select('primary_genre', genre(), $release->primary_genre, ['class' => 'form-control custom-control', 'id' => 'primary_genre', 'required']) !!}
                   <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
                <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
                   <label for="" class="form-label">Secondary Genre(Optional)</label>
                   {!! Form::select('secondary_genre', genre(), $release->secondary_genre, ['class' => 'form-control custom-control', 'id' => 'secondary_genre']) !!}
                   <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
              </div>


            <div class="d-md-flex justify-content-between gap-3">
                <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                    <label for="" class="form-label">Primary Language</label>
                    {!! Form::select('primary_language', primaryLanguages(), $release->language, ['class' => 'form-control custom-control', 'id' => 'exampleFormControlSelect2', 'required']) !!}
                    <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>


             <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                <label for="" class="form-label">Label & Copyright</label>
                <input type="text"  name="label_copyright" id="label"  required placeholder="Label & Copyright" class="form-control custom-control" value="{{$release->label_copyright}}">
             </div>
            </div>
            <div class="d-md-flex justify-content-between gap-3">

               <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                  <label for="" class="form-label">UPC CODE</label>
                  <input type="text" name="upc_code" id="upc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control" value="{{$release->upc_code}}">
               </div>

               <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                <label for="isrc" class="form-label">ISRC CODE</label>
                <input type="text" id="isrc" name="isrc_code" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control" value="{{$release->isrc_code}}">
            </div>
        </div>

        @forelse(json_decode($release->songwriter) as $index=>$a)
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
                                <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="{{ count(collect(json_decode($release->songwriter))) - 1 }}">
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

        <div class=" songWriterContent" style="">

        </div>
        <div class="mb-lg-4 mb-3">
            <label for="" class="form-label">Video Description</label>
            <textarea placeholder="Video Description" class="form-control custom-control h-auto" rows="4"  name="video_description" id="video_description"> {{ $release->video_description }}</textarea>

         </div>
        <div class="mb-lg-4 mb-3 input-icon position-relative" id="lyricsSection">
            <div class="col-lg-12">
               <label for="addFile">Lyrics</label>
            </div>
            <div class="col-lg-12" >
               <div class="row p-3 pb-4 border border-light rounded shadow m-0">
                  <div class="col-md-12 mb-3">
                     <textarea  id="lyrics" name="lyrics" cols="30" rows="10" class="form-control">{{$release->lyrics}}</textarea>
                  </div>
               </div>
            </div>
         </div>


         <div>
            <label for="" class="form-label mb-0">Video Thumbnail (1280 x 720 pixel)</label>
           <small class="text-danger mb-2 d-block">Make sure image size should be less than 2048KB</small>
           <div class="mb-lg-4 mb-3 position-relative">
           <span class="text-danger" id="sizeMsg" style="display:none">Image Size is greater than 2048KB<br></span>
           <small class="upload-msg text-danger" style="width:auto !important"></small>
           <div class="image-album" style="display:block ;">
             <span class="cross">x</span>
             <img id="uploadedImage" src="{{asset(config('upload_path.video_thumbnail').$release->video_thumbnail)}}" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:block; height:150px; width:250px" class="img-upload-album">
          </div>

           <input type="file" id="readUrl" name="video_thumbnail"  accept="image/*"  class="form-control custom-control" style="display:none">
           <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none; height:100px; width:100px;">
        </div>
        </div>



            <div class="mb-lg-4 mb-3 input-icon position-relative" id="aTrack">
                <div class="col-lg-12">
                   <label for="addFile">Upload Video (MP4 Files Only)</label>
                   <input type="hidden" id="video_track" name="video_track" value="{{$release->video_track}}" required>
                </div>
                <div class="col-lg-12">
                   <div class="row p-3 pb-4 border border-light rounded shadow m-0">
                      <!-- Default checked -->
                      <div class="col-md-12 mb-3">
                         <div class="audio-name"></div>
                      </div>
                      <div class="col-md-12">
                         <div class="file-upload-wrapper" id="zdrop">
                            <div class="card card-body w-100 view file-upload" id="upload-labels">
                               <input type="file" onchange="previewFile(1)"  name="track_audio_file"  accept="video/mp4" class="audiofile a_1 browseFile audio-upload-file-input">
                               <p class="file-upload-infos-message" id="audioMsg_1">Video upload - Drag and drop or click</p>
                               <small class="text-danger" id="audioTrackMsg" style="display:none">Track Size is larger than 30 MB</small>
                            </div>
                            <div class=" w-100 ">
                                <video src=""   id="audio_1" type="video/mp4" width="auto" height="auto" controls style="background:rgb(255 243 1); display:none; width:100%">>
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div  style="display: none" class="progress mt-3" style="height: 25px">
                               <div class="progress-bar     progress-bar-animated bg-warning progress-bar-striped text-dark" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                           </div>
                           <small style="display: none" class="showloaderMsg">Please do not close or refresh the browser. After this loading click on Add Track Button.</small>
                         </div>
                      </div>
                   </div>
                </div>

             </div>
           <div class="mb-lg-4 mb-3 d-none">
              <div class="preview-container">
                 <div class="collection row" id="previews">
                    <div class="collection-item col-sm-6 mb-3 clearhack valign-wrapper item-template"
                       id="zdrop-template">
                       <div class="left pv zdrop-info" data-dz-thumbnail>
                          <div class="d-flex justify-content-between">
                             <span data-dz-name></span> <span><a href="javascript:;"
                                data-dz-remove
                                class="btn-floating ph red white-text waves-effect waves-light remove"><i
                                class="fa fa-close"></i></a></span>
                          </div>
                          <div class="progress">
                             <div class="determinate" style="width:0" data-dz-uploadprogress>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>



           <div class="mb-lg-4 mb-3 position-relative input-icon input-left-icon">
            <label for="" class="form-label">Release Date?</label>
            <input type="date" name="release_date" id="release_date"  required class="form-control custom-control" value="{{$release->release_date}}"><i class="left-icon"><img src="{{ asset('assets/portal-revamp/img/calender.png') }}" alt=""></i>
         </div>



         <label class="special" for="">Mandatory Checkboxes</label>
         <div class="mb-lg-4 mb-3">
          
          
            <div class="form-check  mt-4">
               <input class="form-check-input me-3" type="checkbox" name="check1" required id="check1">
               <label class="form-check-label" for="flexCheckDefault">
               I accept that I can only upload audio that is music, and that ASMR, background sounds, etc. are not music.
               </label>
               <small id="check1Msg" class="text-danger"></small>
            </div>
            <div class="form-check  mt-4">
               <input class="form-check-input me-3" type="checkbox" name="check2" required id="check2">
               <label class="form-check-label" for="flexCheckDefault1">
                  I recorded this music
                  and I have all necessary rights to legally sell it in stores worldwide & collect all
                  royalties.
               </label>
               <small id="check2Msg" class="text-danger"></small>
            </div>
            <div class="form-check  mt-4">
               <input class="form-check-input me-3" type="checkbox" name="check3" required id="check3" >
               <label class="form-check-label" for="flexCheckDefault2">
                  I agree that the
                  content I upload is high quality (no short songs, no reuse of samples, and no
                  samples from TV, radio, movies, etc. without permission).
               </label>
               <small id="check3Msg" class="text-danger"></small>
            </div>
            <div class="form-check  mt-4">
               <input class="form-check-input me-3" type="checkbox" name="check4" required id="check4">
               <label class="form-check-label" for="flexCheckDefault3">
                  I do not use the
                  name of another artist in the name, song titles, album title, without their
                  approval.
               </label>
               <small id="check4Msg" class="text-danger"></small>
            </div>
            <div class="form-check  mt-4">
              <input class="form-check-input me-3" type="checkbox" name="check5" required id="check5">
              <label class="form-check-label" for="flexCheckDefault3">
                  I have read and agree to the Terms of Service of Sharpline Distro.
              </label>
              <small id="check4Msg" class="text-danger"></small>
           </div>
         </div>
         <div class="row">
            <div class="col-12 ">
               <button id="createRelease" type="submit" class="btn btn-primary rounded w-100" >Edit Video Release</button>
            </div>
         </div>



            </div>
         </div>

      </div>
      {!! Form::close() !!}
   </div>
</div>
@endsection
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script src="{{asset('assets/revamp/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>

<script>
    $(document).ready(function(){
        var audioPath = '{{ url("user/video_track") }}/{{$release->video_track}}'
        $("#audio_1").attr('src',audioPath).show();
    });
    tinymce.init({
        selector: '#lyrics',
        skin: "oxide-dark",
        content_css: "dark"
    });

   $(".showTimes").hover(function(){
       var id = $(this).attr('data-id');
       $("#store_"+id).addClass('fa fa-times');
   });

   function removeStore(id){
       $('.storeDetails_'+id).remove();
   }
</script>
<script>
   $(document).ready(function () {
      $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
   });
    var browseFile = $("[name=track_audio_file]");
    let resumable = new Resumable({
        target: '{{ route('user.uploadLargeFiles',["video" => 1]) }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['mp4'],
        // chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 3,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        $('.showloaderMsg').show();
        $('.addTrack').removeClass('bg-success').removeClass('bg-warning');
        $('.addTrack').addClass('bg-primary');
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
        $("#addTrack").attr('disabled',true);
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('.card-footer').show();
        $('.progress').removeClass('bg-warning');
        $('.progress').addClass('bg-success');
        $("#createRelease").attr('disabled',false);
        $("#video_track").val(response.filename);
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        notify('file uploading error. Please upload again', 'error')
        // alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }


   function previewFile(count) {
      $("#audioTrackMsg").hide();
      $('#audio_' + count).hide();
      var file = document.querySelector('.a_' + count).files[0];
      var fileSize  = parseInt(file.size / 1e+6);
      var fileName = $("#audioMsg_" + count).html(file.name + ' (' + fileSize + 'MB)');
      var reader = new FileReader();
      var preview = document.getElementById('audio_' + count);
      $("#audio_" + count).fadeIn();
      reader.addEventListener("load", function() {
        preview.src = reader.result;
      }, false);
      if (file) {
        reader.readAsDataURL(file);
      }
   }

   function fileSizee(elm){

      return elm.size;
   }
   function editPreviewFile(count) {
      $("#audioTrackMsg").hide();
      $('#audio_' + count).hide();
      $("#edit_audio_track").attr('src', '');
      var preview = document.getElementById('edit_audio_track');
      var file = document.querySelector('.edit_a').files[0];
      var fileSize  = file.size / 1e+6;
      var fileName = $("#edit_audioMsg").html(file.name + ' (' + fileSize + 'MB)');
      var reader = new FileReader();
      $("#edit_audio_track").fadeIn();
      reader.addEventListener("load", function() {
        preview.src = reader.result;
      }, false);
      if (file) {
        reader.readAsDataURL(file);
      }
   }

   function artist(count) {
    //   var html = '<div class="col-lg-4 artist_' + count + '"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist[' + count + '][type]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-7 artist_' + count + '"> <div class="form-group">  <input type="text" name="artist[' + count + '][name]" id="" class="form-control artist_name text-white" placeholder="Artist Name" required> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_' + count + '"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artist">x</a> </div> </div> ';
      var html = ' <div class="d-lg-flex justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 input-icon inc position-relative artist_' + count + '"><select  class="form-control custom-control artist" id="exampleFormControlSelect2" name="artist[' + count + '][type]" required ><option value="primary artist">Primary Artist</option><option value="featured artist">Featured Artist</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center artist_' + count + '"><div class="mb-lg-4 mb-3 w-100"><input type="text"  name="artist[' + count + '][name]"  placeholder="Artist Name" class="form-control custom-control artist_name" required></div><div class="mb-lg-4 mb-3 artist_' + count + '"><a href="javascript:;" style="text-decoration:none !important" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artist"><span class="increament bg-danger"><i class="fa fa-times"></i></span></a></div></div></div>';
      return html;
   }

   function track(count) {
    //   var html = '<div class="col-lg-2 artist_track_' + count + '"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist_track_type[]" required > <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_name[]" required id="" class="form-control artist_name text-white" placeholder="Artist Name"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_spotify[]" required id="" class="form-control artist_spotify text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_apple[]" required id="" class="form-control artist_apple text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_track_' + count + '"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artistTrack">x</a> </div> </div> ';
    var html = '<div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc artist_track_' + count + '"><select id="exampleFormControlSelect2" name="artist_track_type[]" required  class="form-control custom-control"><option value="primary artist">Primary Artist</option><option value="featured artist">Featured Artist</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control artist_name"></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control artist_spotify"></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control artist_apple"></div><div class="mb-lg-4 mb-3 artist_track_' + count + '"><a href="javascript:;" style="text-decoration: none !important" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artistTrack"><span class="increament bg-danger"><i class="fa fa-times"></i></span></a></div></div>';
      return html;
   }

   function songWriters(count) {
    //   var html = '<div class="col-lg-4 songwriters_track_' + count + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + count + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + count + '" > <div class="form-group d-flex align-items-center form-remove-add-p2">  <a href="javascritpt:;" class="removeInput" onClick="removeInput($(this))" data-id="' + count + '" data-type="songWriter">x</a> </div>';
      var html = '<div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc songwriters_track_' + count + '"><select  name="songwriters_type[]" required class="form-control custom-control tracksongwriter_type"><option value="Composer &amp; writer">Composer &amp; writer</option><option value="Composer">Composer</option><option value="Lyricist">Lyricist</option><option value="Producer">Producer</option><option value="Publisher">Publisher</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center songwriters_track_' + count + '"><div class="mb-lg-4 mb-3 w-100"><input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name"></div><div class="mb-lg-4 mb-3 songwriters_track_' + count + '"><a href="javascritpt:;" style="text-decoration:none !important" class="removeInput" onClick="removeInput($(this))" data-id="' + count + '" data-type="songWriter"><span class="increament bg-danger"> <i class="fa fa-times"></i> </span></a></div></div></div>';
      return html;
   }

   function addInput(elm, type) {
      var count = parseInt(elm.attr('data-id')) + 1;
      if (type == 'artist') {
         $("#addArtist").attr('data-id', count);
         var artistResponse = artist(count);
         $(".artistContent").append(artistResponse);
      } else if (type == 2) {
         $("#artistTrack").attr('data-id', count);
         var trackResponse = track(count);
         $(".trackArtist").append(trackResponse);
      } else if (type == 3) {
         $("#songWriter").attr('data-id', count);
         var songWriterResponse = songWriters(count);
         $(".songWriterContent").append(songWriterResponse);
      }
   }

   function removeInput(elm) {
      var count = parseInt(elm.attr('data-id'));
      var type = elm.attr('data-type');
      if (type == 'artist') {
         $('.artist_' + count).remove();
      } else if (type == 'artistTrack') {
         $('.artist_track_' + count).remove();
      } else if (type == 'songWriter') {
         $('.songwriters_track_' + count).remove();
      }
   }
   document.getElementById('readUrl').addEventListener('change', function() {
      var validate = false;
      {{--  console.log(fileSizee(this.files[0]));  --}}
      var pictureSize = this.files[0].size;
      if (this.files[0]) {
         var picture = new FileReader();
         picture.readAsDataURL(this.files[0]);
         picture.addEventListener('load', function(event) {
            var image = new Image();
            image.src = picture.result;
            image.onload = function() {
               width = image.width;
               height = image.height;
               console.log(width+'x'+height);
               if (width == 1280 && height == 720) {
                  validate = true;
               }
               else{
                $("#readUrl").val('');
               }
            };

            setTimeout(() => {
               // document.querySelector('.upload-msg').style.display = 'block';
               setTimeout(() => {
                  if(parseInt(pictureSize) > 2048000){
                     console.log(pictureSize);
                     console.log('check');
                     $("#sizeMsg").show();
                     document.querySelector('#readUrl').value = ''
                     validate = false;
                  }
                  else{
                     console.log(pictureSize);
                     $("#sizeMsg").hide();
                  }
                  if (validate == true) {
                     document.getElementById('uploadedImage').setAttribute('src', event.target.result);
                     document.getElementById('uploadedImage').style.display = 'block';
                     document.querySelector('.image-album').style.display = 'block';
                     document.querySelector('.upload-msg').style.display = 'none';
                     document.querySelector('#readUrl').style.display = 'none'
                  } else {
                     document.querySelector('.upload-msg').style.display = 'block';
                  }
               }, 1000);
            }, );

         });
      }
   });
   document.querySelector('.cross').addEventListener('click', (event) => {
      document.querySelector('.image-album').style.display = 'none';
      document.querySelector('#readUrl').value = ''
      document.querySelector('#readUrl').style.display = 'block'
      event.preventDefault();
      return true;
   })
   $('.select2').select2();

   $("#number_of_songs").change(function(){
        var value = $(this).val();
        $(".no_of_songs").html(value);
        $("#msg_no_of_songs").show();
   });


   function multiTrack(count, trackId, track_title) {
    //   $("#multiTracks").append('<div class="card-body py-4 px-lg-4 px-2"><div class="row mt-5  " id="track_msg_' + count + '" > <div class="col-md-12"> <h2 class="text-center trackUploaded" ><i class="fa fa-check text-success"></i>&nbsp;&nbsp;('+count+') ' + track_title + ' Uploaded</h2> <div class="text-center"> <a href="javascript:;" onClick="editTrack(' + trackId + ',$(this))"  data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-pencil text-success d-none" style="font-size:25px"></i></a>&nbsp;&nbsp;<a href="javascript:;" onClick="deleteTrack(' + trackId + ',$(this))" data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-trash text-danger" style="font-size:25px;"></i></a> </div></div> </div></div>');
    $("#uploadedTracks").append('<div id="remove_track_'+trackId+'" class="stories mt-2 border p-3"><div class="row"><div class="col-1"><small>&nbsp;</small><h4 >'+count+'</h4></div><div class="col-9"><small>Track Name</small><h4 id="track_name_'+trackId+'"style="color: var(--primary)">'+track_title+'</h4></div><div class="col-md-2"><div class="row"><div class="col-6"><small>Edit</small><br><a href="#multiTracks" onClick="editTrackv2('+trackId+','+count+')"><span><i class="fa fa-pencil-square" style="color:var(--primary); font-size:30px"></i></span></a></div><div class="col-6"><small>Remove</small><br><a href="javascript:;" onClick="removeTrack('+trackId+',$(this),null)"><span><i class="fa fa-minus-square" style="color:var(--primary); font-size:30px;"></i></span></a></div></div></div></div></div>');
   }

   function addTrack(count, trackId) {
    var selectedSongs = parseInt($("#number_of_songs").val()) + 1;
    var track_title = $(".track_title").val();
      $("#track_" + count).remove();
      multiTrack(count, trackId, track_title);
      var count = count + 1;
      if(selectedSongs != count){
          var html = noOfSongs(count);
          $("#multiTracks").append(html);
          $("#createRelease").attr('disabled',true);
          $("#msg_no_of_songs").show();
          $(".no_of_songs").html($("#number_of_songs").val());
      }
      else{
        $("#aTrack").hide();
        $("#aTrack").attr('data-type','hide');
        $("#lyricsSection").hide();
        $("#lyricsSection").attr('data-type','hide');


        $("#msg_no_of_songs").hide();
        $("#createRelease").attr('disabled',false);
        $("#addTrack").hide();
      }
   }

   function noOfSongs(i) {
        text= '<div id="track_' + i + '"><div class="card-body py-4 px-lg-4 px-2"><div class="mb-lg-4 mb-3"><label for="track_title" class="form-label">Title Track</label><input type="text" name="track_title" id="track_title_' + i + '"  placeholder="Title Track" class="form-control custom-control track_title" required></div><div class="mb-lg-4 mb-3"><label for="isrc" class="form-label">ISRC CODE</label><input type="text" id="isrc" name="track_isrc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control"></div><div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon"><label for="artist" class="form-label">Artist</label><select id="exampleFormControlSelect2" name="artist_track_type[]" required class="form-control custom-control"><option value="primary artist">Primary Artist</option><option value="featured artist">Featured Artist</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="mb-lg-4 mb-3 w-100"><label for="" class="form-label opacity-0">sfsa</label><input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control"></div><div class="mb-lg-4 mb-3 w-100"><label for="" class="form-label opacity-0">sfsa</label><input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control"></div><div class="mb-lg-4 mb-3 w-100"><label for="" class="form-label opacity-0">sfsa</label><input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control"></div><div class=""><a href="javascript:;" id="artistTrack" class="addInput" onclick="addInput($(this),2)" data-id="' + i + '"><span class="increament"><i class="fa fa-plus"></i></span></a></div></div><div class="trackArtist"></div></div>';
        text+= '<div class="card-body border-top"><div class="form-check "><input class="form-check-input me-3" name="track_contains_1"type="radio" id="flexRadioDefault1' + i + '" value="Contain Vocals"><label class="form-check-label" for="flexRadioDefault1"><span class="custom-label">Contain Vocals</span><br>My Song contains lyrics and vocals</label></div><div class="form-check mt-3"><input class="form-check-input me-3" name="track_contains_1"type="radio" value="Instrumental"  id="flexRadioDefault2 ' + i + '" checked><label class="form-check-label" for="flexRadioDefault2"><span class="custom-label">Instrumental</span><br>My Song contains no lyrics and vocals</label></div></div><div class="card-body border-top"><div class="form-check"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault21' + i + '" value="Clean"><label class="form-check-label" for="flexRadioDefault21"><span class="custom-label">Clean</span><br>My Song does not contain any profanity (Includes title & artwork)</label></div><div class="form-check mt-3"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault22' + i + '" checked value="Explicit"><label class="form-check-label" for="flexRadioDefault22"><span class="custom-label">Explicit</span><br>My Song contain any profanity (Includes title & artwork)</label></div><div class="form-check mt-3"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault23' + i + '" value="Radio Edit"><label class="form-check-label" for="flexRadioDefault23"><span class="custom-label">Radio Edit</span><br>The track is clean/censored, but have a explict version.</label></div></div><div class="card-body border-top"><div class="mb-lg-4 mb-3 input-icon position-relative"><label for="" class="form-label">Language</label><input type="text" id="track_language" name="track_language" placeholder="Language" required class="form-control custom-control"></div><div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon songwriters_track_' + i + '"><label for="" class="form-label">Song Writers</label><select  name="songwriters_type[]" required class="form-control custom-control tracksongwriter_type"><option value="Composer &amp; writer">Composer &amp; writer</option><option value="Composer">Composer</option><option value="Lyricist">Lyricist</option><option value="Producer">Producer</option><option value="Publisher">Publisher</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center songwriters_track_' + i + '"><div class="mb-lg-4 mb-3 w-100"><label for="" class="form-label opacity-0">sfsa</label><input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name"></div><div class="songwriters_track_' + i + '"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'"><span class="increament"> <i class="fa fa-plus"></i> </span></a></div></div></div><div class=" songWriterContent" style=""></div><div class="trackContent"></div></div>';
    //   text = '<div id="track_' + i + '"><div class="row mt-5 bg-dark p-3"> <div class="col-lg-12"><div class="form-group"> <label for="titleTrack">' + i + '. Track Title</label> <input type="text" name="track_title" id="track_title_' + i + '" class="form-control track_title text-white" placeholder="Track Title"></div> </div> <div class="col-lg-12"> <div class="form-group"> <label for="isrc">ISRC CODE</label> <input type="text" class="form-control text-white" id="isrc" name="track_isrc_code" value="" placeholder="If you do not have one. Leave blank we will generate one for free">  </div> </div><div class="col-lg-2"> <div class="form-group"> <label for="artist">Artist</label> <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_name[]" required id="" class="form-control text-white" placeholder="Artist Name"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_spotify[]" required id="" class="form-control text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text"  name="artist_track_apple[]" required id="" class="form-control text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4"> <div class="form-group d-flex align-items-center form-remove-add"><a href="javascript:;" id="artistTrack" class="addInput" onclick="addInput($(this),2)" data-id="' + i + '">+</a></div></div><div class="row input-group-list w-100 m-0 trackArtist"> </div>';
    //   text += '<div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Contain Vocals"> Contain Vocals <i class="input-helper"></i></label> <span>My Song contains lyrics and vocals</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Instrumental">Instrumental <i class="input-helper"></i></label> <span>My Song contains no lyrics and vocals</span> </div> </div> <div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Clean"> Clean <i class="input-helper"></i></label> <span>My Song does not contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Explicit">Explicit <i class="input-helper"></i></label> <span>My Song contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Radio Edit">Radio Edit <i class="input-helper"></i></label> <span>The track is clean/censored, but have a explict version.</span> </div> <hr class="hr-releases"> </div> <div class="col-lg-12 mt-3"> <div class="form-group"> <label for="language">Language</label> <input type="text" name="track_language" requried id="" class="form-control text-white"> </div> </div> <div class="col-lg-12"> <div class="form-group">  </div> </div> <div class="col-lg-4 songwriters_track_' + i + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + i + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + i + '" > <div class="form-group d-flex align-items-center form-remove-add-p2"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'">+</a></div> </div></div><div class="row bg-dark songWriterContent" style="padding-right:17px; padding-left:17px;"> </div>';
    //   text += '<div class="col-lg-12"> <label for="addFile">Audio File (WAV Files Only)</label> </div> <div class="col-lg-12"> <div class="row bg-dark p-3 pb-4 border border-light rounded shadow m-0"> <div class="col-md-12 mb-3"> <div class="audio-name"></div> </div> <div class="col-md-12"> <div class="file-upload-wrapper"> <div class="card card-body w-100 view file-upload"> <input name="track_audio_file" required  type="file"  onchange="previewFile(' + i + ')"  accept="audio/wav" class="browseFile audiofile a_' + i + '"> <p class="file-upload-infos-message" id="audioMsg_' + i + '">Video upload - Drag and drop or click</p> </div> <div class="card card-body w-100 "> <audio controls src="" id="audio_' + i + '" width="100%" style="background:#fbda03;display:none"></audio> </div> <div  style="display: none" class="progress mt-3" style="height: 25px"> <div class="progress-bar     progress-bar-animated bg-warning progress-bar-striped text-dark" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div> </div> <small style="display: none" class="showloaderMsg">Please do not close or refresh the browser</small></div> </div> </div> </div><div class="col-12 text-right mt-3"> <button type="button" id=""   data-id="' + i + '" class="btn btn-lg " onClick="uploadTrack(' + i + ')" style="background-color: #fbda03; color: #333;">Add Track</button> </div></div></div>';
      $("html, body").animate({
         scrollTop: $(".trackUploaded").height()
      }, 1000);
      return text;
   }

   function uploadTrack(elm) {
      var count = parseInt(elm.attr('data-id'));
      var form = new FormData();
      var track_title = $("[name=track_title]").val();
      var track_isrc = $("[name=track_isrc]").val();
      var artist_track_type = $("[name='artist_track_type[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_name = $("[name='artist_track_name[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_spotify = $("[name='artist_track_spotify[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_apple = $("[name='artist_track_apple[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_type = $("[name='songwriters_type[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_name = $("[name='songwriters_name[]']").map(function() {
         return $(this).val();
      }).get();
      var track_contains_1 = $("[name=track_contains_1]:checked").val();
      var track_contains_2 = $("[name=track_contains_2]:checked").val();
      var track_language = $("[name=track_language]").val();
      var track_audio_file = $(".browseFile").val();
      var lyrics = tinyMCE.get('lyrics').getContent();
      console.log(track_audio_file);
      form.append('track_title', track_title);
      form.append('track_isrc', track_isrc);
      form.append('artist_track_type', artist_track_type);
      form.append('artist_track_name', artist_track_name);
      form.append('artist_track_spotify', artist_track_spotify);
      form.append('artist_track_apple', artist_track_apple);
      form.append('track_contains_1', track_contains_1);
      form.append('track_contains_2', track_contains_2);
      form.append('track_language', track_language);
      form.append('songwriters_type', songwriters_type);
      form.append('songwriters_name', songwriters_name);
      form.append('track_audio_file', track_audio_file);
      form.append('lyrics', lyrics);

      if (track_title == "") {
         notify('Track Title is required', 'error')
      }
      if (artist_track_name == "") {
         notify('Please Fill Artist Details', 'error')
      }
      if (track_language == "") {
         notify('Language is required', 'error')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'error')
      }
      if (track_audio_file == undefined) {
         notify('Audio Track is required', 'error')
      }

      if (track_title != "" && artist_track_name != "" && track_language != "" && songwriters_name != "" && track_audio_file != undefined ) {

         $.ajax({
            type: "POST",
            url: "{{ route('user.release.audio_track')}}",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            type: "POST",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            headers: {
               'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            beforeSend: function(res){
                $("#loaderMsg").html('Please Wait..<br>It takes time<br>Depends on the size of MP4 File');
                $('.loader').show();
            },
            success: function(res) {
                $("#loaderMsg").html('Bravo!, Track Uploaded');
                $('.loader').hide();
               if (res.success == true) {
                  tinymce.activeEditor.setContent('');
                  $("#audio_1").hide();
                  $("#audioMsg_1").html('Video Upload - Drag and drop or click');
                  $(".progress").hide();
                  $(".showloaderMsg").hide();
                  var newCount = count + 1;
                  $("#addTrack").attr('data-id',newCount);
                  $("#updateTrack").attr('data-id',newCount);
                  $("#resetTrack").attr('data-id',newCount);

                  $("#active_message").fadeOut();
                  $("#createRelease").attr('disabled', false);
                  addTrack(count, res.data);
                  $("#audioTracks").append('<input type="hidden" value="' + res.data + '" id="track_' + res.data + '" name="audio_track[]">');
                  notify(res.msg, 'success');
               }
            },
            error: function(res) {
                $('.loader').hide();
                notify('Audio Track is required', 'error');
            }
         });
      }
   }

   function editTrack(id, elm) {

      var count = elm.attr('data-count');
      $("#edit_count").val(count);
      var trackId = id;
      $("#edit_trackId").val(id);
      var track_title = elm.attr('data-name');
      $("#edit_track_title").val(track_title);

      $.ajax({
         type: "GET",
         url: "{{route('user.release.editTrack')}}",
         data: {
            'id': id,
         },
         success: function(res) {
            if (res != "") {
               $('.editTrackContent').html(res);
               $("#editTrack").modal('show');
            }
         },
         error: function(res) {

         }
      })
   }

   function updateTrack(elm) {

      var count = $("#edit_count").val();
      var trackId = $("#edit_trackId").val();
      var track_title = $("#edit_track_title").val();

      var form = new FormData();
      var track_id = $("[name=track_id]").val();
      var track_title = $("[name=edit_track_title]").val();
      var track_isrc = $("[name=edit_track_isrc]").val();
      var artist_track_type = $("[name='edit_artist_track_type[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_name = $("[name='edit_artist_track_name[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_type = $("[name='edit_songwriters_type[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_name = $("[name='edit_songwriters_name[]']").map(function() {
         return $(this).val();
      }).get();
      var track_contains_1 = $("[name=edit_track_contains_1]").val();
      var track_contains_2 = $("[name=edit_track_contains_2]").val();
      var track_language = $("[name=edit_track_language]").val();
      var track_audio_file = $("[name=edit_track_audio_file]")[0].files[0];

      form.append('track_id', track_id);
      form.append('track_title', track_title);
      form.append('track_isrc', track_isrc);
      form.append('artist_track_type', artist_track_type);
      form.append('artist_track_name', artist_track_name);
      form.append('track_contains_1', track_contains_1);
      form.append('track_contains_2', track_contains_2);
      form.append('track_language', track_language);
      form.append('songwriters_type', songwriters_type);
      form.append('songwriters_name', songwriters_name);
      form.append('track_audio_file', track_audio_file);


      if (track_title == "") {
         notify('Track Title is required', 'error')
      }
      if (artist_track_name == "") {
         notify('Please Fill Artist Details', 'error')
      }
      if (track_language == "") {
         notify('Language is required', 'error')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'error')
      }


      if (track_title != "" && artist_track_name != "" && track_language != "" && songwriters_name != "") {

         $.ajax({
            type: "POST",
            url: "{{ route('user.release.updateTrack')}}",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            type: "POST",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            headers: {
               'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            success: function(res) {
               if (res.success == true) {
                  if (res.success == true) {
                     $("#editTrack").modal('hide');
                    //  $("#track_msg_" + count).html(multiTrack(count, trackId, res.data));
                     notify(res.msg, 'success');
                  }
               }
            },
            error: function(res) {

            }
         });
      }
   }

   function deleteTrack(id, elm) {
      var count = elm.attr('data-count');
      var trackId = id;
      var track_title = elm.attr('data-name');
      var conf = confirm('Are you sure?');
      if (conf == true) {
         $.ajax({
            type: "POST",
            url: "{{route('user.release.deleteTrack')}}",
            data: {
               '_token': '{{csrf_token()}}',
               'id': trackId,
            },
            success: function(res) {
               if (res.success == true) {
                  $("#track_msg_" + count).remove();
                  $("#track_" + trackId).remove();
                  notify(res.msg, 'error');
               }
            },
            error: function(res) {

            }
         });
      }

   }

   function closeModal(modal) {
      $("#" + modal).modal('hide');
   }


   function editTrackv2(id,count){
      var number_of_songs = $("#number_of_songs").val();
      var counter = count - 1;
      var trackId = id;
      $.ajax({
         type: "GET",
         url: "{{route('user.release.editTrack')}}",
         data: {
            'id': id,
            'count' : count,
         },
         success: function(res) {
            var audioPath = '{{ url("user/audio_track") }}'+'/'+res.audio_track;
            $("#multiTracks").html(res.data);
            $("#audioMsg_1").html(res.audio_track+'</br>Video upload - Drag and drop or click to change the track');
            $("#audio_1").attr('src',audioPath).show();
            $("#createMode").hide();
            $("#updateMode").show();
            $("#aTrack").show();
            $("#lyricsSection").show();
            // if(number_of_songs == counter){
            //     $("#aTrack").show();
            //     $("#lyricsSection").show();
            //     $("#track_"+count).show();
            //     alert('edit equal');
            // }
            // else{
            //     alert('edit not equal');
            // }
            if(res.lyrics != ""){
                tinyMCE.get('lyrics').setContent(res.lyrics);
            }

         },
         error: function(res) {

         }
      })
   }


   $("#resetTrack").click(function(){
        var number_of_songs = $("#number_of_songs").val();
        var aTrack = $("#aTrack").attr('data-type');
        var lyricsSection = $("#lyricsSection").attr('data-type');
        var counter = count + 1;
        var conf = confirm('Do you want to cancel this track update?');
        if(conf == true){
            var count = $(this).attr('data-id');
            $.ajax({
                type : "POST",
                url  : "{{ route('user.release.resetTrack') }}",
                data : {
                    '_token' : "{{ csrf_token() }}",
                    count    : count,
                },
                success : function(res){
                    if(res.success == true){
                        $("#multiTracks").html(res.data);
                        $("#audioMsg_1").html('Video upload - Drag and drop or click');
                        $("#audio_1").attr('src','').hide();
                        tinyMCE.get('lyrics').setContent('');
                        $("#createMode").show();
                        $("#updateMode").hide();
                        if(aTrack == 'hide' &&  lyricsSection == 'hide'){
                            $("#aTrack").hide();
                            $("#lyricsSection").hide();
                            $("#track_"+count).hide();
                        }


                    }
                },
                error : function(res){

                }
            })
        }
   });


   $("#updateTrack").click(function(){
      var aTrack = $("#aTrack").attr('data-type');
      var lyricsSection = $("#lyricsSection").attr('data-type');
      var elm = $(this);
      var count = parseInt(elm.attr('data-id'));
      var form = new FormData();
      var track_title = $("[name=track_title]").val();
      var track_id = $("[name=track_id]").val();
      var track_isrc = $("[name=track_isrc]").val();
      var artist_track_type = $("[name='artist_track_type[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_name = $("[name='artist_track_name[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_spotify = $("[name='artist_track_spotify[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_track_apple = $("[name='artist_track_apple[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_type = $("[name='songwriters_type[]']").map(function() {
         return $(this).val();
      }).get();
      var songwriters_name = $("[name='songwriters_name[]']").map(function() {
         return $(this).val();
      }).get();
      var track_contains_1 = $("[name=track_contains_1]:checked").val();
      var track_contains_2 = $("[name=track_contains_2]:checked").val();
      var track_language = $("[name=track_language]").val();
      var track_audio_file = $(".browseFile").val();
      var lyrics = tinyMCE.get('lyrics').getContent();
      form.append('track_title', track_title);
      form.append('track_id', track_id);
      form.append('track_isrc', track_isrc);
      form.append('artist_track_type', artist_track_type);
      form.append('artist_track_name', artist_track_name);
      form.append('artist_track_spotify', artist_track_spotify);
      form.append('artist_track_apple', artist_track_apple);
      form.append('track_contains_1', track_contains_1);
      form.append('track_contains_2', track_contains_2);
      form.append('track_language', track_language);
      form.append('songwriters_type', songwriters_type);
      form.append('songwriters_name', songwriters_name);
      form.append('track_audio_file', track_audio_file);
      form.append('lyrics', lyrics);
      form.append('count',count);

      if (track_id == "") {
         notify('Track ID is required', 'error')
      }
      if (track_title == "") {
         notify('Track Title is required', 'error')
      }
      if (artist_track_name == "") {
         notify('Please Fill Artist Details', 'error')
      }
      if (track_language == "") {
         notify('Language is required', 'error')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'error')
      }
      if (track_audio_file == undefined) {
         notify('Audio Track is required', 'error')
      }
      if (track_title != "" && artist_track_name != "" && track_language != "" && songwriters_name != "" &&  track_audio_file != undefined  ) {

         $.ajax({
            type: "POST",
            url: "{{ route('user.release.updateTrack')}}",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            type: "POST",
            data: form,
            contentType: 'multipart/form-data',
            processData: false,
            contentType: false,
            headers: {
               'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            beforeSend: function(res){
                $("#loaderMsg").html('Please Wait..<br>It takes time<br>Depends on the size of MP4 File');
                $('.loader').show();
            },
            success: function(res) {
                $("#loaderMsg").html('Bravo!, Track Uploaded');
                $('.loader').hide();
               if (res.success == true) {
                  tinymce.activeEditor.setContent('');
                  $("#audio_1").attr('src','').hide();
                  $("#audioMsg_1").html('Video Upload - Drag and drop or click');
                  $(".progress").hide();
                  $(".showloaderMsg").hide();
                  notify(res.msg, 'success');
                  $("#multiTracks").html(res.data);
                  $("#createMode").show();
                  $("#updateMode").hide();
                  $("#track_name_"+track_id).html(res.track_title);
                  if(aTrack == 'hide' &&  lyricsSection == 'hide'){
                    $("#aTrack").hide();
                    $("#lyricsSection").hide();
                    $("#track_"+count).hide();
                  }
               }
            },
            error: function(res) {
                $('.loader').hide();
                $.notify('Audio Track is required','error');
            }
         });
      }
   });

   function removeTrack(id, elm, release_id) {
      var count = elm.attr('data-count');
      var trackId = id;
      var track_title = elm.attr('data-name');
      var audio_track = $("[name='audio_track[]']").map(function() {
         return $(this).val();
      }).get();
      var conf = confirm('Are you sure?');
      if (conf == true) {
         $.ajax({
            type: "POST",
            url: "{{route('user.release.deleteTrack')}}",
            data: {
               '_token': '{{csrf_token()}}',
               'id': trackId,
               'audio_track' : audio_track,
               'release_id' : release_id,
            },
            success: function(res) {
               if (res.success == true) {
                  $("#remove_track_"+trackId).remove();
                  $("#track_"+trackId).remove();
                  notify(res.msg, 'error');
               }
            },
            error: function(res) {

            }
         });
      }

   }

   function vevoLink(elm){
    value = $("[name=vevo]:checked").val();
    $("#vevo_link").val('');
    if(value == 'yes'){
        $("#vevoLink").show();
        $("#vevo_link").attr('required',true);
        $("#vevoCheck").show();
        $("#vevo_check").attr('required',true);
    }
    else{
        $("#vevoLink").hide();
        $("#vevo_link").attr('required',false);
        $("#vevoCheck").hide();
        $("#vevo_check").attr('required',false);

    }
   }


   function youtubeLink(elm){
    value = $("[name=youtube]:checked").val();
    $("#youtube_link").val('');
    if(value == 'yes'){
        $("#youtubeLink").show();
        $("#youtube_link").attr('required',true);
        $("#youtubeCheck").show();
        $("#youtube_check").attr('required',true);
    }
    else{
        $("#youtubeLink").hide();
        $("#youtube_link").attr('required',false);
        $("#youtubeCheck").hide();
        $("#youtube_check").attr('required',false);

    }
   }


</script>
@endpush
