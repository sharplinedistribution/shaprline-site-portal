@extends('layouts.user_scaffold')
@push('title')
- Edit Release
@endpush
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .select2-selection__choice  {
        padding: 10px !important;
   }
   audio{
    width: 100%;
   }
   audio::-webkit-media-controls-panel{
    background-color:#fbda03 !important;
   }
   .modal-dialog {
        width: 1109px !important;
   }
   .h-30px{
    height: 30px;
   }
   input{
    color: white;
   }

</style>
@endpush
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h2 class="text-center" style="color: #fbda03;">Edit Release</h2>
      </div>
   </div>
   <form id="form" method="POST" enctype="multipart/form-data" action="{{route('user.release.update',$release->id)}}">
    @csrf
    @method('PUT')
   <div id="audioTracks">
    @forelse (json_decode($release->track_ids) as $item)
        <input type="hidden" value="{{$item}}" id="track_{{$item}}" name="audio_track[]">
    @empty
    @endforelse
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="songsNumber">Number of Songs</label>
            <select name="number_of_songs" class="form-control" id="number_of_songs"  requried>
               <option value="1">1(Single)</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7(Album)</option>
               <option value="8">8</option>
               <option value="9">9</option>
               <option value="10">10</option>
               <option value="11">11</option>
               <option value="12">12</option>
               <option value="13">13</option>
               <option value="14">14</option>
               <option value="15">15</option>
               <option value="16">16</option>
               <option value="17">17</option>
               <option value="18">18</option>
               <option value="19">19</option>
               <option value="20">20</option>
               <option value="21">21</option>
               <option value="22">22</option>
               <option value="23">23</option>
               <option value="24">24</option>
               <option value="25">25</option>
               <option value="26">26</option>
               <option value="27">27</option>
               <option value="28">28</option>
               <option value="29">29</option>
               <option value="30">30</option>
               <option value="31">31</option>
               <option value="32">32</option>
               <option value="33">33</option>
               <option value="34">34</option>
               <option value="35">35</option>
               <option value="36">36</option>
               <option value="37">37</option>
               <option value="38">38</option>
               <option value="39">39</option>
               <option value="40">40</option>
               <option value="41">41</option>
               <option value="42">42</option>
               <option value="43">43</option>
               <option value="44">44</option>
               <option value="45">45</option>
               <option value="46">46</option>
               <option value="47">47</option>
               <option value="48">48</option>
               <option value="49">49</option>
               <option value="50">50</option>
               <option value="51">51</option>
               <option value="52">52</option>
               <option value="53">53</option>
               <option value="54">54</option>
               <option value="55">55</option>
               <option value="56">56</option>
               <option value="57">57</option>
               <option value="58">58</option>
               <option value="59">59</option>
               <option value="60">60</option>
               <option value="61">61</option>
               <option value="62">62</option>
               <option value="63">63</option>
               <option value="64">64</option>
               <option value="65">65</option>
               <option value="66">66</option>
               <option value="67">67</option>
               <option value="68">68</option>
               <option value="69">69</option>
               <option value="70">70</option>
               <option value="71">71</option>
               <option value="72">72</option>
               <option value="73">73</option>
               <option value="74">74</option>
               <option value="75">75</option>
               <option value="76">76</option>
               <option value="77">77</option>
               <option value="78">78</option>
               <option value="79">79</option>
               <option value="80">80</option>
               <option value="81">81</option>
               <option value="82">82</option>
               <option value="83">83</option>
               <option value="84">84</option>
               <option value="85">85</option>
               <option value="86">86</option>
               <option value="87">87</option>
               <option value="88">88</option>
               <option value="89">89</option>
               <option value="90">90</option>
               <option value="91">91</option>
               <option value="92">92</option>
               <option value="93">93</option>
               <option value="94">94</option>
               <option value="95">95</option>
               <option value="96">96</option>
               <option value="97">97</option>
               <option value="98">98</option>
               <option value="99">99</option>
               <option value="100">100</option>
            </select>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="form-group">
            <label for="alTitle">Album Title</label>
            <input name="album_title" type="text" class="form-control text-white" id="alTitle" placeholder="Album Title" required value="{{$release->album_title}}">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="upc">UPC CODE</label>
            <input type="text" name="upc_code" id="upc" class="form-control text-white" placeholder="If you don't have one. Leave blank we'll generate one for free" value="{{$release->upc_code}}">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="label">LABEL</label>
            <input type="text" class="form-control text-white" name="label" id="label" placeholder="Label" required value="{{$release->label}}">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="version">Version?</label>
            <input type="text" class="form-control text-white" name="version" id="version" placeholder="Leave a blank if orginal" value="{{$release->version}}">
         </div>
      </div>
   </div>
   <div class="row input-group-list">
    @if(count(json_decode($release->artist)) > 0)
        @foreach(json_decode($release->artist) as $index=>$a)
            <div class="col-lg-4">
                <div class="form-group">
                    @if($index==0)<label for="artist">Artist</label>@endif
                    {!! Form::select('artist_type[]', artist(), $a->type, ['class' => 'form-control  artist', 'required']) !!}
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    @if($index==0)<label for="artist"></label>@endif
                    <input type="text" name="artist_name[]" id="" class="form-control artist_name text-white" placeholder="Artist Name" required value="{{$a->name}}">
                </div>
            </div>
        @endforeach
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::select('artist_type[]', artist(), null, ['class' => 'form-control  artist']) !!}
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <input type="text" name="artist_name[]" id="" class="form-control artist_name text-white" placeholder="Artist Name" >
            </div>
        </div>
    </div>
    @endif
   <div class="row input-group-list artistContent">
   </div>
   <div class="container-fluid row-fluid-input p-0"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="releaseDate">Release Date?</label>
            <input type="date" name="release_date" id="release_date" class="form-control text-white" required value="{{$release->release_date}}">
         </div>
      </div>
   </div>
   <div class="row">
       <div class="col-lg-12">
          <p class="upload-msg text-danger" style="width:auto !important">Please upload image with resolution (3000 x 3000)</p>
         <div class="form-group">
            <div class="image-album" style="">
               <span class="cross">x</span>
               <img id="uploadedImage" src="{{asset(config('upload_path.album_artwork').$release->album_artwork)}}" alt="Uploaded Image"
                  accept="image/png, image/jpeg" style=""
                  class="img-upload-album">
            </div>
            <label for="readUrl">Album Artwork (3000x3000 pixel)</label>
            <input type='file' id="readUrl" name="album_artwork" class="form-control" @if(empty($release->album_artwork)) required @endif>
            <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="languages">Primary Language</label>
            <select class="form-control" id="language" name="language" required>
                <option value="Afrikaans" >Afrikaans</option>
                <option value="Albanian" >Albanian</option>
                <option value="Arabic" >Arabic</option>
                <option value="Armenian" >Armenian</option>
                <option value="Basque" >Basque</option>
                <option value="Bengali" >Bengali</option>
                <option value="Bulgarian" >Bulgarian</option>
                <option value="Catalan" >Catalan</option>
                <option value="Cambodian" >Cambodian</option>
                <option value="Chinese (Mandarin)" >Chinese (Mandarin)</option>
                <option value="Croatian" >Croatian</option>
                <option value="Czech" >Czech</option>
                <option value="Danish" >Danish</option>
                <option value="Dutch" >Dutch</option>
                <option value="English" >English</option>
                <option value="Estonian" >Estonian</option>
                <option value="Fiji" >Fiji</option>
                <option value="Finnish" >Finnish</option>
                <option value="French" >French</option>
                <option value="Georgian" >Georgian</option>
                <option value="German" >German</option>
                <option value="Greek" >Greek</option>
                <option value="Gujarati" >Gujarati</option>
                <option value="Hebrew" >Hebrew</option>
                <option value="Hindi" >Hindi</option>
                <option value="Hungarian" >Hungarian</option>
                <option value="Icelandic" >Icelandic</option>
                <option value="Indonesian" >Indonesian</option>
                <option value="Irish" >Irish</option>
                <option value="Italian" >Italian</option>
                <option value="Japanese" >Japanese</option>
                <option value="Javanese" >Javanese</option>
                <option value="Korean" >Korean</option>
                <option value="Latin" >Latin</option>
                <option value="Latvian" >Latvian</option>
                <option value="Lithuanian" >Lithuanian</option>
                <option value="Macedonian" >Macedonian</option>
                <option value="Malay" >Malay</option>
                <option value="Malayalam" >Malayalam</option>
                <option value="Maltese" >Maltese</option>
                <option value="Maori" >Maori</option>
                <option value="Marathi" >Marathi</option>
                <option value="Mongolian" >Mongolian</option>
                <option value="Nepali" >Nepali</option>
                <option value="Norwegian" >Norwegian</option>
                <option value="Persian" >Persian</option>
                <option value="Polish" >Polish</option>
                <option value="Portuguese" >Portuguese</option>
                <option value="Punjabi" >Punjabi</option>
                <option value="Quechua" >Quechua</option>
                <option value="Romanian" >Romanian</option>
                <option value="Russian" >Russian</option>
                <option value="Samoan" >Samoan</option>
                <option value="Serbian" >Serbian</option>
                <option value="Slovak" >Slovak</option>
                <option value="Slovenian" >Slovenian</option>
                <option value="Spanish" >Spanish</option>
                <option value="Swahili" >Swahili</option>
                <option value="Swedish" >Swedish</option>
                <option value="Tamil" >Tamil</option>
                <option value="Tatar" >Tatar</option>
                <option value="Telugu" >Telugu</option>
                <option value="Thai" >Thai</option>
                <option value="Tibetan" >Tibetan</option>
                <option value="Tonga" >Tonga</option>
                <option value="Turkish" >Turkish</option>
                <option value="Ukrainian" >Ukrainian</option>
                <option value="Urdu" >Urdu</option>
                <option value="Uzbek" >Uzbek</option>
                <option value="Vietnamese" >Vietnamese</option>
                <option value="Welsh" >Welsh</option>
                <option value="Xhosa" >Xhosa</option>

            </select>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <label for="primaryGenre">Primary Genre</label>
         <select name="primary_genre" id="primary_genre" class="form-control" required>
            <option value="Alternative">Alternative</option>
            <option value="Alternative Rock">Alternative Rock</option>
            <option value="Big Band">Big Band</option>
            <option value="Blues">Blues</option>
            <option value="C-Pop">C-Pop</option>
            <option value="Children's">Children's</option>
            <option value="Classical">Classical</option>
            <option value="Comedy">Comedy</option>
            <option value="Country">Country</option>
            <option value="Dance">Dance</option>
            <option value="Easy Listening">Easy Listening</option>
            <option value="Electronic">Electronic</option>
            <option value="Experimental">Experimental</option>
            <option value="Fitness &amp; Workout">Fitness &amp; Workout</option>
            <option value="Folk">Folk</option>
            <option value="French Pop">French Pop</option>
            <option value="German Folk">German Folk</option>
            <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
            <option value="Holiday">Holiday</option>
            <option value="Inspirational">Inspirational</option>
            <option value="Instrumental">Instrumental</option>
            <option value="J-Pop">J-Pop</option>
            <option value="Jazz">Jazz</option>
            <option value="K-Pop">K-Pop</option>
            <option value="Karaoke">Karaoke</option>
            <option value="Latin">Latin</option>
            <option value="Metal">Metal</option>
            <option value="New Age">New Age</option>
            <option value="Opera">Opera</option>
            <option value="Pop">Pop</option>
            <option value="Punk">Punk</option>
            <option value="R&amp;B">R&amp;B</option>
            <option value="Reggae">Reggae</option>
            <option value="Rock">Rock</option>
            <option value="Singer/Songwriter">Singer/Songwriter</option>
            <option value="Soul">Soul</option>
            <option value="Soundtrack">Soundtrack</option>
            <option value="Spoken Word">Spoken Word</option>
            <option value="Vocal/Nostalgia">Vocal/Nostalgia</option>
            <option value="World">World</option>
         </select>
      </div>
      <div class="col-lg-6">
         <label for="secondarGenre">Secondary Genre(Optional)</label>
         <select name="secondary_genre" id="secondary_genre" class="form-control" >
            <option value="Alternative">Alternative</option>
            <option value="Alternative Rock">Alternative Rock</option>
            <option value="Big Band">Big Band</option>
            <option value="Blues">Blues</option>
            <option value="C-Pop">C-Pop</option>
            <option value="Children's">Children's</option>
            <option value="Classical">Classical</option>
            <option value="Comedy">Comedy</option>
            <option value="Country">Country</option>
            <option value="Dance">Dance</option>
            <option value="Easy Listening">Easy Listening</option>
            <option value="Electronic">Electronic</option>
            <option value="Experimental">Experimental</option>
            <option value="Fitness &amp; Workout">Fitness &amp; Workout</option>
            <option value="Folk">Folk</option>
            <option value="French Pop">French Pop</option>
            <option value="German Folk">German Folk</option>
            <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
            <option value="Holiday">Holiday</option>
            <option value="Inspirational">Inspirational</option>
            <option value="Instrumental">Instrumental</option>
            <option value="J-Pop">J-Pop</option>
            <option value="Jazz">Jazz</option>
            <option value="K-Pop">K-Pop</option>
            <option value="Karaoke">Karaoke</option>
            <option value="Latin">Latin</option>
            <option value="Metal">Metal</option>
            <option value="New Age">New Age</option>
            <option value="Opera">Opera</option>
            <option value="Pop">Pop</option>
            <option value="Punk">Punk</option>
            <option value="R&amp;B">R&amp;B</option>
            <option value="Reggae">Reggae</option>
            <option value="Rock">Rock</option>
            <option value="Singer/Songwriter">Singer/Songwriter</option>
            <option value="Soul">Soul</option>
            <option value="Soundtrack">Soundtrack</option>
            <option value="Spoken Word">Spoken Word</option>
            <option value="Vocal/Nostalgia">Vocal/Nostalgia</option>
            <option value="World">World</option>
         </select>
      </div>
   </div>
   <div class="col-lg-12 mt-2">
      <strong>Stores</strong>
      <select name="stores[]" id="stores" class="form-control select2" multiple style="background: #2A3038" required>
        @forelse (stores() as $index=>$item)
            <option value="{{$item}}" @if(json_decode($release->stores)) @if(in_array($item,json_decode($release->stores))) selected @endif @endif>{{$item}}</option>
        @empty

        @endforelse

      </select>
      {{--
      <div class="stores_data p-3" style="background-color: #1f2022;">
      </div>
      --}}
   </div>
</div>
<div id="multiTracks">

    @forelse (getTracks($release->track_ids) as $index=>$item)
        <div class="row mt-5 bg-dark p-5 " id="track_msg_{{++$index}}" style="margin: -42px;">
            <div class="col-md-12">
            <h2 class="text-center trackUploaded"><i class="fa fa-check text-success"></i>&nbsp;&nbsp;{{$item->title}}</h2>
            <div class="text-center"> <a href="javascript:;" onclick="editTrack({{$item->id}},$(this))" data-count="{{$index}}" data-name="{{$item->title}}"><i class="fa fa-pencil text-success"></i></a>&nbsp;&nbsp;<a href="javascript:;" onclick="deleteTrack({{$item->id}},$(this))" data-count="{{$index}}" data-name="{{$item->title}}"><i class="fa fa-trash text-danger"></i></a> </div>
            </div>
        </div>
    @empty

    @endforelse

    <div id="track_{{$index + 1}}"  >
        <div class="row mt-5 bg-dark p-3 ">
           <div class="col-lg-12">
              <div class="form-group">
                 <label for="titleTrack">{{$index + 1}}. Track Title</label>
                 <input type="text" name="track_title" class="form-control track_title text-white" placeholder="Track Title"  style="color:white;">
              </div>
           </div>
           <div class="col-lg-12">
              <div class="form-group">
                 <label for="isrc">ISRC CODE</label>
                 <input type="text" class="form-control text-white" id="isrc" name="track_isrc"
                    placeholder="If you don't have one. Leave blank we'll generate one for free" value="">
              </div>
           </div>
           <div class="row input-group-list w-100 m-0">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="artist">Artist</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" >
                       <option value="primary artist">Primary Artist</option>
                       <option value="featured artist">Featured Artist</option>
                    </select>
                 </div>
              </div>
              <div class="col-lg-7">
                 <div class="form-group">
                    <label for=""></label>
                    <input type="text" name="artist_track_name[]"  id="" class="form-control text-white" placeholder="Artist Name">
                 </div>
              </div>
              <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4">
                  <div class="form-group d-flex align-items-center form-remove-add">
                     <a href="javascript:;" id="artistTrack" class="addInput" onClick="addInput($(this),2)" data-id="0">+</a>
                     {{-- <a href="javascript:;"  id="removeArtist" class="removeInput" onClick="removeInput($(this),'artist')" data-id="0">x</a> --}}
                  </div>
               </div>


           </div>
           <div class="row input-group-list w-100 m-0 trackArtist">
           </div>
           <div class="col-lg-12">
              <hr class="hr-releases">
              <div class="form-check form-check-warning">
                 <label class="form-check-label">
                 <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio5"
                    checked="" value="Contain Vocals">
                 Contain Vocals
                 <i class="input-helper"></i></label>
                 <span>My Song contains lyrics and vocals</span>
              </div>
              <div class="form-check form-check-warning">
                 <label class="form-check-label">
                 <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio5"
                    checked="" value="Instrumental">Instrumental <i class="input-helper"></i></label>
                 <span>My Song contains no lyrics and vocals</span>
              </div>
           </div>
           <div class="col-lg-12">
              <hr class="hr-releases">
              <div class="form-check form-check-warning">
                 <label class="form-check-label">
                 <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4"
                    checked="" value="Clean">
                 Clean
                 <i class="input-helper"></i></label>
                 <span>My Song doesn't contain any profanity (Includes title & artwork)</span>
              </div>
              <div class="form-check form-check-warning">
                 <label class="form-check-label">
                 <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4"
                    checked="" value="Explicit">Explicit <i class="input-helper"></i></label>
                 <span>My Song contain any profanity (Includes title & artwork)</span>
              </div>
              <div class="form-check form-check-warning">
                 <label class="form-check-label">
                 <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4"
                    checked="" value="Radio Edit">Radio Edit <i class="input-helper"></i></label>
                 <span>The track is clean/censored, but have a explict version.</span>
              </div>
              <hr class="hr-releases">
           </div>
           <div class="col-lg-12 mt-3">
              <div class="form-group">
                 <label for="language">Language</label>
                 <input type="text" name="track_language" requried id="" class="form-control text-white">
              </div>
           </div>
        </div>
        <div class="row bg-dark " style="padding-right:17px; padding-left:17px;">
            <div class="col-lg-4">
               <div class="form-group">
                  <label for="writters">Song Writers</label>
                  <select name="songwriters_type[]"  id="" class="form-control tracksongwriter_type">
                     <option value="Composer &amp; writer">Composer &amp; writer</option>
                     <option value="Composer">Composer</option>
                     <option value="Lyricist">Lyricist</option>
                     <option value="Producer">Producer</option>
                     <option value="Publisher">Publisher</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-7">
               <div class="form-group">
                  <label for="writters">&nbsp;</label>
                  <input type="text" name="songwriters_name[]"  id="" class="form-control tracksongwriter_name text-white" placeholder="Name">
               </div>
            </div>
            <div class="col-lg-1">
               <label for="writters">&nbsp;</label>
               <div class="form-group d-flex align-items-center form-remove-add-p2">
                  <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="0">+</a>
               </div>
            </div>
         </div>


        <div class="row bg-dark songWriterContent" style="padding-right:17px; padding-left:17px;">
        </div>
        <div class="row bg-dark " id="addTrackContent_0" style="padding-right:17px; padding-left:17px;">
           <div class="col-lg-12">
              <label for="addFile">Audio File (WAV Files Only)</label>
           </div>
           <div class="col-lg-12">
              <div class="row bg-dark p-3 pb-4 border border-light rounded shadow m-0">
                 <!-- Default checked -->
                 <div class="col-md-12 mb-3">
                    <div class="audio-name"></div>
                 </div>
                 <div class="col-md-12">
                    <div class="file-upload-wrapper">
                       <div class="card card-body w-100 view file-upload">
                          <input  type="file" onchange="previewFile(1)" name="track_audio_file"  accept="audio/wav" class="audiofile a_1">
                          <p class="file-upload-infos-message" id="audioMsg_1">Audio upload - Drag and drop or click</p>
                          <small class="text-danger" id="audioTrackMsg" style="display:none">Track Size is larger than 30 MB</small>
                       </div>
                       <div class="card card-body w-100 ">
                          <audio controls src="" id="audio_1" width="100%" style="background:#fbda03; display:none"></audio>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12 text-right mt-3 mb-3">
              <button type="button" id="" data-id="{{$index + 1}}" class="btn btn-lg" onClick="uploadTrack({{$index + 1}})" style="background-color: #fbda03; color: #333;">Add Track</button>
           </div>
        </div>
        <div class="trackContent">
        </div>
     </div>
</div>
<div class="row mt-5 bg-dark p-3 mb-5">
   <div class="col-lg-12 mt-2">
      <div class="d-flex justify-content-between align-items-center">
         <label for="">Mandatory Checkboxes</label>
      </div>
   </div>
   <div class="col-lg-12">
      <div class="form-check form-check-warning">
         <label class="form-check-label">
         <input type="checkbox" class="form-check-input" name="check1" required id="check1"> I accept that I can only
         upload audio that is music, and that ASMR, background sounds, etc. are not music. <i
            class="input-helper"></i></label>
         <small id="check1Msg" class="text-danger"></small>
      </div>
      <div class="form-check form-check-warning">
         <label class="form-check-label">
         <input type="checkbox" class="form-check-input" name="check2" required id="check2">I recorded this music
         and I have all necessary rights to legally sell it in stores worldwide & collect all
         royalties. <i class="input-helper"></i></label>
         <small id="check2Msg" class="text-danger"></small>
      </div>
      <div class="form-check form-check-warning">
         <label class="form-check-label">
         <input type="checkbox" class="form-check-input" name="check3" required id="check3">  I agree that the
         content I upload is high quality (no short songs, no reuse of samples, and no
         samples from TV, radio, movies, etc. without permission). <i
            class="input-helper"></i></label>
         <small id="check3Msg" class="text-danger"></small>
      </div>
      <div class="form-check form-check-warning">
         <label class="form-check-label">
         <input type="checkbox" class="form-check-input" name="check4" required id="check4">  I do not use the
         name of another artist in the name, song titles, album title, without their
         approval. <i class="input-helper"></i></label>
         <small id="check4Msg" class="text-danger"></small>
      </div>
      <div class="form-check form-check-warning">
         <label class="form-check-label">
         <input type="checkbox" class="form-check-input" name="check5" required id="check5"> I have read and
         agree to the Terms of Service of Sharpline Distro. <i class="input-helper"></i></label>
         <small id="check5Msg" class="text-danger"></small>
      </div>
   </div>
   <div class="col-lg-12 mt-4">
      <button type="submit" class="btn btn-block btn-lg" id="createRelease"
         style="background-color:#fbda03; color: #333;" >Update
      Release</button>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editTrack" tabindex="-1" role="dialog" aria-labelledby="editTrack" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content bg-dark text-white">
        <input type="hidden" id="edit_count">
        <input type="hidden" id="edit_trackId">
        <input type="hidden" id="edit_track_title">
        <div class="modal-body editTrackContent">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onClick="closeModal('editTrack')">Close</button>
          <button type="button" class="btn btn-primary" onClick="updateTrack($(this))">Save changes</button>
        </div>
      </div>
    </div>
</div>
</form>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $("#number_of_songs").val({{count(json_decode($release->track_ids))}});
        $("#language").val("{{$release->language}}");
        $("#primary_genre").val("{{$release->primary_genre}}");
        $("#secondary_genre").val("{{$release->secondary_genre}}");

    });
    function previewFile(count) {
        $("#audioTrackMsg").hide();
        $('#audio_' + count).hide();
        var preview = document.getElementById('audio_' + count);
        var file = document.querySelector('.a_'+count).files[0];
        var fileSize  = parseInt(file.size / 1e+6);
        var fileName = $("#audioMsg_"+count).html(file.name+' ('+fileSize+' MB)');
        var reader = new FileReader();
        if(fileSize <= 30){
           $("#audio_"+count).fadeIn();
            reader.addEventListener("load", function() {
               preview.src = reader.result;
         }, false);

         if (file) {
               reader.readAsDataURL(file);
         }
        }
        else{
         $("#audioTrackMsg").show();
        }

   }
   function editPreviewFile(count) {
        $("#edit_audio_track").attr('src','');
        $("#edit_audio_track").fadeIn();
        var preview = document.getElementById('edit_audio_track');
        var file = document.querySelector('.edit_a').files[0];
        var fileName = $("#edit_audioMsg").html(file.name+' ('+parseInt(file.size/1024)+'KB)');
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
   }
   function artist(count){
       var html = '<div class="col-lg-4 artist_'+count+'"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist_type[]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-7 artist_'+count+'"> <div class="form-group">  <input type="text" name="artist_name[]" id="" class="form-control artist_name text-white" placeholder="Artist Name" required> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_'+count+'"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id='+count+' data-type="artist">x</a> </div> </div> ';
       return html;
   }
   function track(count){
       var html = '<div class="col-lg-4 artist_track_'+count+'"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist_track_type[]" required > <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-7 artist_track_'+count+'"> <div class="form-group">  <input type="text" name="artist_track_name[]" required id="" class="form-control artist_name text-white" placeholder="Artist Name"> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_track_'+count+'"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id='+count+' data-type="artistTrack">x</a> </div> </div> ';
       return html;
   }
   function songWriters(count){
       var html ='<div class="col-lg-4 songwriters_track_'+count+'"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_'+count+'" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_'+count+'" > <div class="form-group d-flex align-items-center form-remove-add-p2">  <a href="javascritpt:;" class="removeInput" onClick="removeInput($(this))" data-id="'+count+'" data-type="songWriter">x</a> </div>';
       return html;
   }
   function addInput(elm,type){
       var count = parseInt(elm.attr('data-id')) + 1;
       if(type == 'artist'){
           $("#addArtist").attr('data-id',count);
           var artistResponse = artist(count);
           $(".artistContent").append(artistResponse);
       }
       else if(type == 2){
           $("#artistTrack").attr('data-id',count);
           var trackResponse = track(count);
           $(".trackArtist").append(trackResponse);
       }
       else if(type == 3){
           $("#songWriter").attr('data-id',count);
           var songWriterResponse = songWriters(count);
           $(".songWriterContent").append(songWriterResponse);
       }
   }
   function removeInput(elm){
       var count = parseInt(elm.attr('data-id'));
       var type = elm.attr('data-type');
       if(type == 'artist'){
           $('.artist_'+count).remove();
       }
       else if(type == 'artistTrack'){
           $('.artist_track_'+count).remove();
       }
       else if(type == 'songWriter'){
           $('.songwriters_track_'+count).remove();
       }
   }
   document.getElementById('readUrl').addEventListener('change', function(){
    var validate = false;
    if (this.files[0] ) {
      var picture = new FileReader();
      picture.readAsDataURL(this.files[0]);
      picture.addEventListener('load', function(event) {
        var image = new Image();
        image.src = picture.result;
        image.onload = function() {
            width = image.width;
            height = image.height;
            if(width == 3000 && height == 3000){
                validate = true;
            }
        };

        setTimeout(() => {
            // document.querySelector('.upload-msg').style.display = 'block';
            setTimeout(() => {
                if(validate == true){
                    document.getElementById('uploadedImage').setAttribute('src', event.target.result);
                    document.getElementById('uploadedImage').style.display = 'block';
                    document.querySelector('.image-album').style.display = 'block';
                    document.querySelector('.upload-msg').style.display = 'none';
                    document.querySelector('#readUrl').style.display = 'none'
                }
                else{
                    document.querySelector('.upload-msg').style.display = 'block';
                }
            }, 1000);
        },);

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
   function multiTrack(count,trackId,track_title){
       $("#multiTracks").append('<div class="row mt-5 bg-dark p-5 " id="track_msg_'+count+'" style="margin: -42px;"> <div class="col-md-12"> <h2 class="text-center trackUploaded" ><i class="fa fa-check text-success"></i>&nbsp;&nbsp;'+track_title+' Uploaded</h2> <div class="text-center"> <a href="javascript:;" onClick="editTrack('+trackId+',$(this))"  data-count="'+count+'" data-name="'+track_title+'"><i class="fa fa-pencil text-success"></i></a>&nbsp;&nbsp;<a href="javascript:;" onClick="deleteTrack('+trackId+',$(this))" data-count="'+count+'" data-name="'+track_title+'"><i class="fa fa-trash text-danger"></i></a> </div></div> </div>');
   }
   function addTrack(count,trackId){
        var track_title = $(".track_title").val();
        $("#track_"+count).remove();
        multiTrack(count,trackId,track_title);
        var count = count + 1;
        var html = noOfSongs(count);
        $("#multiTracks").append(html);
        $("#number_of_songs").val(count);
   }
   function noOfSongs(i){
        text='<div id="track_'+i+'"><div class="row mt-5 bg-dark p-3"> <div class="col-lg-12"><div class="form-group"> <label for="titleTrack">'+i+'. Track Title</label> <input type="text" name="track_title" id="track_title_'+i+'" class="form-control track_title text-white" placeholder="Track Title"></div> </div> <div class="col-lg-12"> <div class="form-group"> <label for="isrc">ISRC CODE</label> <input type="text" class="form-control text-white" id="isrc" name="track_isrc_code" value="" placeholder="If you don not have one. Leave blank we will generate one for free">  </div> </div><div class="col-lg-4"> <div class="form-group"> <label for="artist">Artist</label> <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-7"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_name[]" required id="" class="form-control text-white" placeholder="Artist Name"> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4"> <div class="form-group d-flex align-items-center form-remove-add"><a href="javascript:;" id="artistTrack" class="addInput" onclick="addInput($(this),2)" data-id="'+i+'">+</a></div></div><div class="row input-group-list w-100 m-0 trackArtist"> </div>';
        text+='<div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio'+i+'" checked="" value="Contain Vocals"> Contain Vocals <i class="input-helper"></i></label> <span>My Song contains lyrics and vocals</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio'+i+'" checked="" value="Instrumental">Instrumental <i class="input-helper"></i></label> <span>My Song contains no lyrics and vocals</span> </div> </div> <div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1'+i+'" checked="" value="Clean"> Clean <i class="input-helper"></i></label> <span>My Song does not contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1'+i+'" checked="" value="Explicit">Explicit <i class="input-helper"></i></label> <span>My Song contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1'+i+'" checked="" value="Radio Edit">Radio Edit <i class="input-helper"></i></label> <span>The track is clean/censored, but have a explict version.</span> </div> <hr class="hr-releases"> </div> <div class="col-lg-12 mt-3"> <div class="form-group"> <label for="language">Language</label> <input type="text" name="track_language" requried id="" class="form-control text-white"> </div> </div> <div class="col-lg-12"> <div class="form-group">  </div> </div> <div class="col-lg-4"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7"> <div class="form-group"> <input type="text" name=songwriters_name[]" required id="" class="form-control" placeholder="Name"> </div> </div> <div class="col-lg-1"> <div class="form-group d-flex align-items-center form-remove-add-p2"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'">+</a></div> </div></div><div class="row bg-dark songWriterContent" style="padding-right:17px; padding-left:17px;"> </div>';
        text+='<div class="col-lg-12"> <label for="addFile">Audio File (WAV Files Only)</label> </div> <div class="col-lg-12"> <div class="row bg-dark p-3 pb-4 border border-light rounded shadow m-0"> <div class="col-md-12 mb-3"> <div class="audio-name"></div> </div> <div class="col-md-12"> <div class="file-upload-wrapper"> <div class="card card-body w-100 view file-upload"> <input name="track_audio_file" required  type="file" onchange="previewFile('+i+')"  accept="audio/wav" class="audiofile a_'+i+'"> <p class="file-upload-infos-message" id="audioMsg_'+i+'">Audio upload - Drag and drop or click</p> </div> <div class="card card-body w-100 "> <audio controls src="" id="audio_'+i+'" width="100%" style="background:#fbda03;display:none"></audio> </div> </div> </div> </div> </div><div class="col-12 text-right mt-3"> <button type="button" id=""   data-id="'+i+'" class="btn btn-lg " onClick="uploadTrack('+i+')" style="background-color: #fbda03; color: #333;">Add Track</button> </div></div></div>';
        $("html, body").animate({
            scrollTop: $(".trackUploaded").height()
        }, 1000);
        return text;
   }
   function uploadTrack(count){
        var form = new FormData();
        var track_title = $("[name=track_title]").val();
        var track_isrc = $("[name=track_isrc]").val();
        var artist_track_type = $("[name='artist_track_type[]']").map(function(){return $(this).val();}).get();
        var artist_track_name = $("[name='artist_track_name[]']").map(function(){return $(this).val();}).get();
        var songwriters_type = $("[name='songwriters_type[]']").map(function(){return $(this).val();}).get();
        var songwriters_name = $("[name='songwriters_name[]']").map(function(){return $(this).val();}).get();
        var track_contains_1 = $("[name=track_contains_1]").val();
        var track_contains_2 = $("[name=track_contains_2]").val();
        var track_language = $("[name=track_language]").val();
		var track_audio_file = $("[name=track_audio_file]")[0].files[0];

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


        if(track_title == ""){  notify('Track Title is required','danger')  }
        if(artist_track_name == ""){  notify('Please Fill Artist Details','danger')  }
        if(track_language == ""){  notify('Language is required','danger')  }
        if(songwriters_name == ""){  notify('Songwriter is required','danger')  }
        if(track_audio_file == undefined){  notify('Audio Track is required','danger')  }


        if(track_title != "" && artist_track_name != "" && track_language != "" && songwriters_name != "" && track_audio_file != undefined){

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
                success: function(res) {
                    if(res.success == true){
                        $("#createRelease").attr('disabled',false);
                        addTrack(count,res.data);
                        $("#audioTracks").append('<input type="hidden" value="'+res.data+'" id="track_'+res.data+'" name="audio_track[]">');
                        notify(res.msg,'success');
                    }
                },
                error: function(res){

                }
            });
        }
   }
   function editTrack(id,elm){

    var count = elm.attr('data-count');
    $("#edit_count").val(count);
    var trackId = id;
    $("#edit_trackId").val(id);
    var track_title = elm.attr('data-name');
    $("#edit_track_title").val(track_title);

    $.ajax({
        type : "GET",
        url  : "{{route('user.release.editTrack')}}",
        data : {
            'id' : id,
        },
        success : function(res){
            if(res != ""){
                $('.editTrackContent').html(res);
                $("#editTrack").modal('show');
            }
        },
        error : function(res){

        }
    })
   }
   function updateTrack(elm){

        var count = $("#edit_count").val();
        var trackId = $("#edit_trackId").val();
        var track_title = $("#edit_track_title").val();

        var form = new FormData();
        var track_id = $("[name=track_id]").val();
        var track_title = $("[name=edit_track_title]").val();
        var track_isrc = $("[name=edit_track_isrc]").val();
        var artist_track_type = $("[name='edit_artist_track_type[]']").map(function(){return $(this).val();}).get();
        var artist_track_name = $("[name='edit_artist_track_name[]']").map(function(){return $(this).val();}).get();
        var songwriters_type = $("[name='edit_songwriters_type[]']").map(function(){return $(this).val();}).get();
        var songwriters_name = $("[name='edit_songwriters_name[]']").map(function(){return $(this).val();}).get();
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


        if(track_title == ""){  notify('Track Title is required','danger')  }
        if(artist_track_name == ""){  notify('Please Fill Artist Details','danger')  }
        if(track_language == ""){  notify('Language is required','danger')  }
        if(songwriters_name == ""){  notify('Songwriter is required','danger')  }


        if(track_title != "" && artist_track_name != "" && track_language != "" && songwriters_name != "" ){

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
                    if(res.success == true){
                        if(res.success == true){
                            $("#editTrack").modal('hide');
                            $("#track_msg_"+count).html(multiTrack(count,trackId,res.data));
                            notify(res.msg,'success');
                        }
                    }
                },
                error: function(res){

                }
            });
        }
   }
   function deleteTrack(id,elm){
        var count = elm.attr('data-count');
        var trackId = id;
        var track_title = elm.attr('data-name');
        var conf = confirm('Are you sure?');
        if(conf == true){
            $.ajax({
                type : "POST",
                url  : "{{route('user.release.deleteTrack')}}",
                data : {
                    '_token' : '{{csrf_token()}}',
                    'id' : trackId,
                },
                success : function(res){
                    if(res.success == true){
                        $("#track_msg_"+count).remove();
                        $("#track_"+trackId).remove();
                        notify(res.msg,'danger');
                    }
                },
                error   : function(res){

                }
            });
        }

   }
   function closeModal(modal){
      $("#"+modal).modal('hide');
   }
</script>
@endpush
