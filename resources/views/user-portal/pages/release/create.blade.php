@extends('layouts.user_scaffold')
@push('title')
- Create Release
@endpush
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
   .select2-selection__choice {
      padding: 10px !important;
   }

   audio {
      width: 100%;
   }

   audio::-webkit-media-controls-panel {
      background-color: #fbda03 !important;
   }

   .modal-dialog {
      width: 1109px !important;
   }

   .h-30px {
      height: 30px;
   }

   input {
      color: white;
   }
   .bg-warning{
    background-color : #fbda03 !important;
   }
</style>
@endpush
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h2 class="text-center" style="color: #fbda03;">Create Release</h2>
      </div>
   </div>
   {!! Form::open(['route' => 'user.release.store', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
   <div id="audioTracks">

   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="songsNumber">Number of Songs</label>
            <select name="number_of_songs" class="form-control" id="number_of_songs" requried>
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
            <input name="album_title" type="text" class="form-control text-white" id="alTitle" placeholder="Album Title" required>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="upc">UPC CODE</label>
            <input type="text" name="upc_code" id="upc" class="form-control text-white" placeholder="If you don't have one. Leave blank we'll generate one for free" value="">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="label">LABEL</label>
            <input type="text" class="form-control text-white" name="label" id="label" placeholder="Label" required>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="version">Version?</label>
            <input type="text" class="form-control text-white" name="version" id="version" placeholder="Leave a blank if orginal">
         </div>
      </div>
   </div>
   <div class="row input-group-list">
      <div class="col-lg-4">
         <div class="form-group">
            <label for="artist">Artist</label>
            <select class="form-control artist" id="exampleFormControlSelect2" name="artist[0][type]" required>
               <option value="primary artist">Primary Artist</option>
               <option value="featured artist">Featured Artist</option>
            </select>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="form-group">
            <label for=""></label>
            <input type="text" name="artist[0][name]" id="" class="form-control artist_name text-white" placeholder="Artist Name" required>
         </div>
      </div>
      <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4">
         <div class="form-group d-flex align-items-center form-remove-add">
            <a href="javascript:;" id="addArtist" class="addInput" onClick="addInput($(this),'artist')" data-id="0">+</a>
            {{-- <a href="javascript:;"  id="removeArtist" class="removeInput" onClick="removeInput($(this),'artist')" data-id="0">x</a> --}}
         </div>
      </div>
   </div>
   <div class="row input-group-list artistContent">
   </div>
   <div class="container-fluid row-fluid-input p-0"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="releaseDate">Release Date?</label>
            <input type="text" name="release_date" id="release_date" class="form-control text-white datepicker" required readonly style="background: #2A3038; color: white !important;">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <span class="text-danger" id="sizeMsg" style="display:none">Image Size is greater than 1024KB</span>
         <p class="upload-msg text-danger" style="width:auto !important">Please upload image with resolution (1000 x 1000)</p>
         <div class="form-group">
            <div class="image-album" style="display:none ;">
               <span class="cross">x</span>
               <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;" class="img-upload-album">
            </div>
            <label for="readUrl">Album Artwork (1000x1000 pixel)</label><br>
            <small class="text-danger">Make sure image size should be less than 1024KB</small>
            <input type='file' id="readUrl" name="album_artwork" class="form-control" required accept="image/*">
            <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
            <label for="languages">Primary Language</label>
            <select class="form-control" id="exampleFormControlSelect2" name="language" required>
               <option value="Afrikaans">Afrikaans</option>
               <option value="Albanian">Albanian</option>
               <option value="Arabic">Arabic</option>
               <option value="Armenian">Armenian</option>
               <option value="Basque">Basque</option>
               <option value="Bengali">Bengali</option>
               <option value="Bulgarian">Bulgarian</option>
               <option value="Catalan">Catalan</option>
               <option value="Cambodian">Cambodian</option>
               <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
               <option value="Croatian">Croatian</option>
               <option value="Czech">Czech</option>
               <option value="Danish">Danish</option>
               <option value="Dutch">Dutch</option>
               <option value="English">English</option>
               <option value="Estonian">Estonian</option>
               <option value="Fiji">Fiji</option>
               <option value="Finnish">Finnish</option>
               <option value="French">French</option>
               <option value="Georgian">Georgian</option>
               <option value="German">German</option>
               <option value="Greek">Greek</option>
               <option value="Gujarati">Gujarati</option>
               <option value="Hebrew">Hebrew</option>
               <option value="Hindi">Hindi</option>
               <option value="Hungarian">Hungarian</option>
               <option value="Icelandic">Icelandic</option>
               <option value="Indonesian">Indonesian</option>
               <option value="Irish">Irish</option>
               <option value="Italian">Italian</option>
               <option value="Japanese">Japanese</option>
               <option value="Javanese">Javanese</option>
               <option value="Korean">Korean</option>
               <option value="Latin">Latin</option>
               <option value="Latvian">Latvian</option>
               <option value="Lithuanian">Lithuanian</option>
               <option value="Macedonian">Macedonian</option>
               <option value="Malay">Malay</option>
               <option value="Malayalam">Malayalam</option>
               <option value="Maltese">Maltese</option>
               <option value="Maori">Maori</option>
               <option value="Marathi">Marathi</option>
               <option value="Mongolian">Mongolian</option>
               <option value="Nepali">Nepali</option>
               <option value="Norwegian">Norwegian</option>
               <option value="Persian">Persian</option>
               <option value="Polish">Polish</option>
               <option value="Portuguese">Portuguese</option>
               <option value="Punjabi">Punjabi</option>
               <option value="Quechua">Quechua</option>
               <option value="Romanian">Romanian</option>
               <option value="Russian">Russian</option>
               <option value="Samoan">Samoan</option>
               <option value="Serbian">Serbian</option>
               <option value="Slovak">Slovak</option>
               <option value="Slovenian">Slovenian</option>
               <option value="Spanish">Spanish</option>
               <option value="Swahili">Swahili</option>
               <option value="Swedish">Swedish</option>
               <option value="Tamil">Tamil</option>
               <option value="Tatar">Tatar</option>
               <option value="Telugu">Telugu</option>
               <option value="Thai">Thai</option>
               <option value="Tibetan">Tibetan</option>
               <option value="Tonga">Tonga</option>
               <option value="Turkish">Turkish</option>
               <option value="Ukrainian">Ukrainian</option>
               <option value="Urdu">Urdu</option>
               <option value="Uzbek">Uzbek</option>
               <option value="Vietnamese">Vietnamese</option>
               <option value="Welsh">Welsh</option>
               <option value="Xhosa">Xhosa</option>

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
         <select name="secondary_genre" id="secondary_genre" class="form-control">
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
         <option value="Spotify" selected>Spotify</option>
         <option value="Apple Music" selected>Apple Music</option>
         <option value="Tik Tok" selected>Tik Tok</option>
         <option value="Amazon Music" selected>Amazon Music</option>
         <option value="SoundCloud" selected>SoundCloud</option>
         <option value="YouTube Music" selected>YouTube Music</option>
         <option value="YouTube Content ID" selected>YouTube Content ID</option>
         <option value="ACR Cloud" selected>ACR Cloud </option>
         <option value="7Digital" selected>7Digital</option>
         <option value="AMI Entertainment" selected>AMI Entertainment</option>
         <option value="Anghami" selected>Anghami</option>
         <option value="AWA" selected>AWA </option>
         <option value="Beatsource" selected>Beatsource</option>
         <option value="BMAT" selected>BMAT </option>
         <option value="Boomplay" selected>Boomplay</option>
         <option value="BPI Content Protection" selected>BPI Content Protection </option>
         <option value="Claro Musica" selected>Claro Musica</option>
         <option value="ClicknClear" selected>ClicknClear</option>
         <option value="Deezer" selected>Deezer </option>
         <option value="Gracenote" selected>Gracenote </option>
         <option value="Hungama" selected>Hungama </option>
         <option value="iHeartRadio" selected>iHeartRadio </option>
         <option value="iTunes" selected>iTunes </option>
         <option value="Jaxsta" selected>Jaxsta</option>
         <option value="JOOX" selected>JOOX </option>
         <option value="Juno" selected>Juno </option>
         <option value="Jiosaavn" selected>Jiosaavn</option>
         <option value="KKBOX" selected>KKBOX </option>
         <option value="MediaNet" selected>MediaNet</option>
         <option value="MelOn" selected>MelOn</option>
         <option value="Millward Brown" selected>Millward Brown </option>
         <option value="MixCloud" selected>MixCloud</option>
         <option value="Mood" selected>Mood Media </option>
         <option value="Napster" selected>Napster </option>
         <option value="NetEase" selected>NetEase </option>
         <option value="Nuuday" selected>Nuuday</option>
         <option value="Pandora" selected>Pandora </option>
         <option value="Peloton" selected>Peloton </option>
         <option value="Phononet" selected>Phononet</option>
         <option value="Qobuz" selected>Qobuz</option>
         <option value="Resso" selected>Resso</option>
         <option value="RX" selected>RX Music </option>
         <option value="Saavn" selected>Saavn</option>
         <option value="Shazam" selected>Shazam </option>
         <option value="Slacker" selected>Slacker </option>
         <option value="Soundmouse" selected>Soundmouse</option>
         <option value="Soundscan" selected>Soundscan </option>
         <option value="24/7 Entertainment" selected>24/7 Entertainment</option>
         <option value="SRV4421" selected>SRV4421 </option>
         <option value="SRV5481" selected>SRV5481 </option>
         <option value="Tencent" selected>Tencent </option>
         <option value="TIDAL" selected>TIDAL </option>
         <option value="TouchTunes" selected>TouchTunes</option>
         <option value="VerveLife" selected>VerveLife</option>
         <option value="Yandex" selected>Yandex</option>
         <option value="United Media Agency" selected>United Media Agency</option>
         <option value="Simfy Africa" selected>Simfy Africa</option>
         <option value="EmpikMusik" selected>EmpikMusik</option>
         <option value="Sirius XM" selected>Sirius XM</option>
      </select>
      {{--
      <div class="stores_data p-3" style="background-color: #1f2022;">
      </div>
      --}}
   </div>
</div>
<div id="multiTracks">
   <div id="track_1">
      <div class="row mt-5 bg-dark p-3 ">
         <div class="col-lg-12">
            <div class="form-group">
               <label for="titleTrack">1. Track Title</label>
               <input type="text" name="track_title" class="form-control track_title text-white" placeholder="Track Title" required style="color:white;">
            </div>
         </div>
         <div class="col-lg-12">
            <div class="form-group">
               <label for="isrc">ISRC CODE</label>
               <input type="text" class="form-control text-white" id="isrc" name="track_isrc" placeholder="If you don't have one. Leave blank we'll generate one for free" value="">
            </div>
         </div>
         <div class="row input-group-list w-100 m-0">
            <div class="col-lg-2">
               <div class="form-group">
                  <label for="artist">Artist</label>
                  <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" required>
                     <option value="primary artist">Primary Artist</option>
                     <option value="featured artist">Featured Artist</option>
                  </select>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label for=""></label>
                  <input type="text" name="artist_track_name[]" required id="" class="form-control text-white" placeholder="Artist Name">
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label for=""></label>
                  <input type="text" name="artist_track_spotify[]" required id="" class="form-control text-white" placeholder="Spotify Link. Leave blank if you do not have">
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label for=""></label>
                  <input type="text" name="artist_track_apple[]" required id="" class="form-control text-white" placeholder="Apple Link. Leave blank if you do not have">
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
                  <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio5"  value="Contain Vocals">
                  Contain Vocals
                  <i class="input-helper"></i></label>
               <span>My Song contains lyrics and vocals</span>
            </div>
            <div class="form-check form-check-warning">
               <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio5"  value="Instrumental">Instrumental <i class="input-helper"></i></label>
               <span>My Song contains no lyrics and vocals</span>
            </div>
         </div>
         <div class="col-lg-12">
            <hr class="hr-releases">
            <div class="form-check form-check-warning">
               <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4"  value="Clean">
                  Clean
                  <i class="input-helper"></i></label>
               <span>My Song doesn't contain any profanity (Includes title & artwork)</span>
            </div>
            <div class="form-check form-check-warning">
               <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4"  value="Explicit">Explicit <i class="input-helper"></i></label>
               <span>My Song contain any profanity (Includes title & artwork)</span>
            </div>
            <div class="form-check form-check-warning">
               <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio4" value="Radio Edit">Radio Edit <i class="input-helper"></i></label>
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
               <select name="songwriters_type[]" required id="" class="form-control tracksongwriter_type">
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
               <input type="text" name="songwriters_name[]" required id="" class="form-control tracksongwriter_name text-white" placeholder="Name">
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

      <div class="trackContent">
      </div>
   </div>
</div>
<div class="row bg-dark " id="aTrack" style="padding-right:17px; padding-left:17px;">
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
                   <input type="file" onchange="previewFile(1)"  name="track_audio_file"  accept="audio/wav" class="audiofile a_1 browseFile">
                   <p class="file-upload-infos-message" id="audioMsg_1">Audio upload - Drag and drop or click</p>
                   <small class="text-danger" id="audioTrackMsg" style="display:none">Track Size is larger than 30 MB</small>
                </div>
                <div class="card card-body w-100 ">
                   <audio controls src="" id="audio_1" width="100%" style="background:#fbda03; display:none"></audio>
                </div>
                <div  style="display: none" class="progress mt-3" style="height: 25px">
                   <div class="progress-bar     progress-bar-animated bg-warning progress-bar-striped text-dark" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
               </div>
               <small style="display: none" class="showloaderMsg">Please do not close or refresh the browser. After this loading click on Add Track Button.</small>
             </div>
          </div>
       </div>
    </div>
    <div class="col-12 text-right mt-3 mb-3">
       <button type="button" id="addTrack" data-id="1" class="btn btn-lg" onClick="uploadTrack($(this))" style="background-color: #fbda03; color: #333;">Add Track</button>
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
            upload audio that is music, and that ASMR, background sounds, etc. are not music. <i class="input-helper"></i></label>
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
            <input type="checkbox" class="form-check-input" name="check3" required id="check3"> I agree that the
            content I upload is high quality (no short songs, no reuse of samples, and no
            samples from TV, radio, movies, etc. without permission). <i class="input-helper"></i></label>
         <small id="check3Msg" class="text-danger"></small>
      </div>
      <div class="form-check form-check-warning">
         <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="check4" required id="check4"> I do not use the
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
      <small class="text-danger  " id="active_message">Add your First track this button will be enable on your first upload.<br> Upload Your Track and hit on Add Track button</small>
      <br>
      <span class="badge bg-danger mb-3" id="msg_no_of_songs" style="display: none">You have selected <span class="no_of_songs">1</span> tracks. Please upload <span class="no_of_songs">1</span> tracks to enable this button</span><br>
      <button type="submit" class="btn btn-block btn-lg" id="createRelease" style="background-color:#fbda03; color: #333;" disabled>Create
         Release</button>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editTrack" tabindex="-1" role="dialog" aria-labelledby="editTrack" aria-hidden="true">
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
{!! Form::close() !!}
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script src="{{asset('web/js/notify.js')}}"></script>
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>


<script>
   $(document).ready(function () {
      $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
   });
    var browseFile = $("[name=track_audio_file]");
    let resumable = new Resumable({
        target: '{{ route('user.uploadLargeFiles') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['wav'],
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
        $("#addTrack").attr('disabled',false);
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        notify('file uploading error. Please upload again', 'danger')
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
    alert(count);
      var html = '<div class="col-lg-4 artist_' + count + '"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist[' + count + '][type]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-7 artist_' + count + '"> <div class="form-group">  <input type="text" name="artist[' + count + '][name]" id="" class="form-control artist_name text-white" placeholder="Artist Name" required> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_' + count + '"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artist">x</a> </div> </div> ';
      return html;
   }

   function track(count) {
      var html = '<div class="col-lg-2 artist_track_' + count + '"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist_track_type[]" required > <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_name[]" required id="" class="form-control artist_name text-white" placeholder="Artist Name"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_spotify[]" required id="" class="form-control artist_spotify text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_apple[]" required id="" class="form-control artist_apple text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_track_' + count + '"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artistTrack">x</a> </div> </div> ';
      return html;
   }

   function songWriters(count) {
      var html = '<div class="col-lg-4 songwriters_track_' + count + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + count + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + count + '" > <div class="form-group d-flex align-items-center form-remove-add-p2">  <a href="javascritpt:;" class="removeInput" onClick="removeInput($(this))" data-id="' + count + '" data-type="songWriter">x</a> </div>';
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
               if (width == 1000 && height == 1000) {
                  validate = true;
               }
               else{
                $("#readUrl").val('');
               }
            };

            setTimeout(() => {
               // document.querySelector('.upload-msg').style.display = 'block';
               setTimeout(() => {
                  if(parseInt(pictureSize) > 1024000){
                     console.log(pictureSize);
                     $("#sizeMsg").show();
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
      $("#multiTracks").append('<div class="row mt-5 bg-dark p-5 " id="track_msg_' + count + '" style="margin: -42px;"> <div class="col-md-12"> <h2 class="text-center trackUploaded" ><i class="fa fa-check text-success"></i>&nbsp;&nbsp;('+count+') ' + track_title + ' Uploaded</h2> <div class="text-center"> <a href="javascript:;" onClick="editTrack(' + trackId + ',$(this))"  data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-pencil text-success d-none" style="font-size:25px"></i></a>&nbsp;&nbsp;<a href="javascript:;" onClick="deleteTrack(' + trackId + ',$(this))" data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-trash text-danger" style="font-size:25px;"></i></a> </div></div> </div>');
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
        $("#msg_no_of_songs").hide();
        $("#createRelease").attr('disabled',false);
      }
   }

   function noOfSongs(i) {
      text = '<div id="track_' + i + '"><div class="row mt-5 bg-dark p-3"> <div class="col-lg-12"><div class="form-group"> <label for="titleTrack">' + i + '. Track Title</label> <input type="text" name="track_title" id="track_title_' + i + '" class="form-control track_title text-white" placeholder="Track Title"></div> </div> <div class="col-lg-12"> <div class="form-group"> <label for="isrc">ISRC CODE</label> <input type="text" class="form-control text-white" id="isrc" name="track_isrc_code" value="" placeholder="If you do not have one. Leave blank we will generate one for free">  </div> </div><div class="col-lg-2"> <div class="form-group"> <label for="artist">Artist</label> <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_name[]" required id="" class="form-control text-white" placeholder="Artist Name"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_spotify[]" required id="" class="form-control text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text"  name="artist_track_apple[]" required id="" class="form-control text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4"> <div class="form-group d-flex align-items-center form-remove-add"><a href="javascript:;" id="artistTrack" class="addInput" onclick="addInput($(this),2)" data-id="' + i + '">+</a></div></div><div class="row input-group-list w-100 m-0 trackArtist"> </div>';
      text += '<div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Contain Vocals"> Contain Vocals <i class="input-helper"></i></label> <span>My Song contains lyrics and vocals</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Instrumental">Instrumental <i class="input-helper"></i></label> <span>My Song contains no lyrics and vocals</span> </div> </div> <div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Clean"> Clean <i class="input-helper"></i></label> <span>My Song does not contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Explicit">Explicit <i class="input-helper"></i></label> <span>My Song contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Radio Edit">Radio Edit <i class="input-helper"></i></label> <span>The track is clean/censored, but have a explict version.</span> </div> <hr class="hr-releases"> </div> <div class="col-lg-12 mt-3"> <div class="form-group"> <label for="language">Language</label> <input type="text" name="track_language" requried id="" class="form-control text-white"> </div> </div> <div class="col-lg-12"> <div class="form-group">  </div> </div> <div class="col-lg-4 songwriters_track_' + i + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + i + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + i + '" > <div class="form-group d-flex align-items-center form-remove-add-p2"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'">+</a></div> </div></div><div class="row bg-dark songWriterContent" style="padding-right:17px; padding-left:17px;"> </div>';
    //   text += '<div class="col-lg-12"> <label for="addFile">Audio File (WAV Files Only)</label> </div> <div class="col-lg-12"> <div class="row bg-dark p-3 pb-4 border border-light rounded shadow m-0"> <div class="col-md-12 mb-3"> <div class="audio-name"></div> </div> <div class="col-md-12"> <div class="file-upload-wrapper"> <div class="card card-body w-100 view file-upload"> <input name="track_audio_file" required  type="file"  onchange="previewFile(' + i + ')"  accept="audio/wav" class="browseFile audiofile a_' + i + '"> <p class="file-upload-infos-message" id="audioMsg_' + i + '">Audio upload - Drag and drop or click</p> </div> <div class="card card-body w-100 "> <audio controls src="" id="audio_' + i + '" width="100%" style="background:#fbda03;display:none"></audio> </div> <div  style="display: none" class="progress mt-3" style="height: 25px"> <div class="progress-bar     progress-bar-animated bg-warning progress-bar-striped text-dark" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div> </div> <small style="display: none" class="showloaderMsg">Please do not close or refresh the browser</small></div> </div> </div> </div><div class="col-12 text-right mt-3"> <button type="button" id=""   data-id="' + i + '" class="btn btn-lg " onClick="uploadTrack(' + i + ')" style="background-color: #fbda03; color: #333;">Add Track</button> </div></div></div>';
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


      if (track_title == "") {
         notify('Track Title is required', 'danger')
      }
      if (artist_track_name == "") {
         notify('Please Fill Artist Details', 'danger')
      }
      if (track_language == "") {
         notify('Language is required', 'danger')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'danger')
      }
      if (track_audio_file == undefined) {
         notify('Audio Track is required', 'danger')
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
                $("#loaderMsg").html('Please Wait..<br>It takes time<br>Depends on the size of Wav File');
                $('.loader').show();
            },
            success: function(res) {
                $("#loaderMsg").html('Bravo!, Track Uploaded');
                $('.loader').hide();
               if (res.success == true) {
                  $("#audio_1").hide();
                  $("#audioMsg_1").html('Audio Upload - Drag and drop or click');
                  $(".progress").hide();
                  $(".showloaderMsg").hide();
                  var newCount = count + 1;
                  $("#addTrack").attr('data-id',newCount);
                  $("#active_message").fadeOut();
                  $("#createRelease").attr('disabled', false);
                  addTrack(count, res.data);
                  $("#audioTracks").append('<input type="hidden" value="' + res.data + '" id="track_' + res.data + '" name="audio_track[]">');
                  notify(res.msg, 'success');
               }
            },
            error: function(res) {
                $('.loader').hide();
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
         notify('Track Title is required', 'danger')
      }
      if (artist_track_name == "") {
         notify('Please Fill Artist Details', 'danger')
      }
      if (track_language == "") {
         notify('Language is required', 'danger')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'danger')
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
                  notify(res.msg, 'danger');
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
</script>
@endpush
