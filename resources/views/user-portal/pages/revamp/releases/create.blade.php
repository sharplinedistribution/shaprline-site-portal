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
        width: 150px;

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


    .cmp-date-time-picker .cmp-dp-date-wrapper .cmp-dp-date-item-cur, .cmp-date-time-picker .cmp-dp-date-wrapper .cmp-dp-date-item-cur:hover {
        background-color: #FBDA03 !important;
        color: black !important;
    }

    .cmp-date-time-picker .cmp-dp-btn-wrap .cmp-dp-btn {
        color: black !important;
        background: #FBDA03 !important;
        border: 1px solid #FBDA03 !important;
    }

    .cmp-date-time-picker .cmp-dp-date-wrapper .cmp-dp-date-item:hover {
        background-color: black !important;
        color: #FBDA03 !important;
    }

    .modal-content {
        background-color: #0C0B0B;
        border: var(--bs-modal-border-width) solid #FFF301;
        border-radius: var(--bs-modal-border-radius);
    }

    .select2-search { background-color: #151515; color: white; }
    .select2-search input { background-color: #151515; color: white; }

    .select2-results { background-color: #151515; color: white; }

    .profile-pic {
        width: 200px;
        max-height: 200px;
        display: inline-block;
    }

    .file-upload-artist {
        display: none;
    }
    .circle {
        border-radius: 100% !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        position: relative;
        top: 0px;
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
    .upload-button {
    font-size: 1.2em;
    }

    .upload-button:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    color: #999;
    }

    hr {
        height: 1px;
        background-color: #FFF301;
        border: none;
    }
    .sortable-item {
        cursor: move;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')
<div class="row mt-2 px-lg-4">
   <div class="col-12 text-center mb-3">
      <h2 class="page-title">Create Release</h2>
   </div>
   <div class="col-12">
      {!! Form::open(['route' => 'user.release.store', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
      <div id="audioTracks"></div>
      <div class="auth-form">
         <div class="card">
            <div class="card-body py-4 px-lg-4 px-2">
               <div class="mb-lg-4 mb-3 input-icon position-relative">
                  <label for="" class="form-label">Number of Songs</label>
                  <select type="text" name="number_of_songs" id="number_of_songs" required class="form-control custom-control w-100">
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
                  <i class="fa-solid fa-chevron-down select-icon"></i>
               </div>
               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">Album Title</label>
                  <input type="text" name="album_title" id="alTitle" required placeholder="Album Title" class="form-control custom-control">
               </div>


               <div class="mb-lg-4 mb-3">
                <label for="" class="form-label">Has this product been previously released?</label>
                <div class="form-check ">
                    <input class="form-check-input me-3" name="is_previous_released"type="radio" id="flexRadioDefault1" value="1" onchange="previousRelease($(this))">
                    <label class="form-check-label" for="flexRadioDefault1">
                    <span class="custom-label">Yes</span>

                    </label>
                </div>

                <div class="form-check ">
                    <input class="form-check-input me-3" name="is_previous_released" type="radio" value="0"  id="flexRadioDefault2" checked onchange="previousRelease($(this))">
                    <label class="form-check-label" for="flexRadioDefault2">
                    <span class="custom-label">No, It's a new release</span>

                    </label>
                </div>
                <div class="mb-lg-4 mb-3" id="previousReleaseDate" style="display:none">
                    <input type="text" name="previous_release_date" id="previous_release_date"  placeholder="Pick the previous date" class="form-control custom-control mt10px input" max="{{ date('Y-m-d') }}">

                </div>
               </div>


               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">UPC CODE</label>
                  <input type="text" name="upc_code" id="upc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control">
               </div>

               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">LABEL</label>
                  <input type="text" name="label" id="label" required placeholder="Label" class="form-control custom-control">
               </div>
               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">Version</label>
                  <input type="text" name="version" id="version" placeholder="Leave a blank if original" class="form-control custom-control">
               </div>
               <div id="createAddArtistId">

               </div>
               <input type="hidden" id="hiddenArtistType">
               <input type="hidden" id="hiddenRole">

               <div class="">
                    <label for="" class="">Artist</label>
                </div>
                <div class="" id="addMainPrimaryArtist">
                    <br>
                    <button  onClick="mainArtist($(this))" data-type="main" data-location="release" type="button"  class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Main Primary Artist</strong></button>
                </div>
                <div id="mainArtistDetail">
                </div>

                <div id="otherArtistDetail" class="mt-4">
                </div>

                <div class="mb-2 mt-2" id="addOtherKeyArtist" style="display: none">
                    <button  onClick="mainArtist($(this))" data-type="other" data-location="release"  type="button"  class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Other Key Artist</strong></button>
                </div>


               {{-- <div class="">
                   <label for="" class="form-label">Artist</label>
                   <div class="d-lg-flex justify-content-between gap-3 align-items-center ">
                       <div class="mb-lg-4 mb-3 w-100 input-icon inc position-relative">

                     <select  class="form-control custom-control artist" id="exampleFormControlSelect2" name="artist[0][type]" required>
                        <option value="primary artist">Primary Artist</option>
                         <option value="featured artist">Featured Artist</option>
                         <option value="producer artist">Producer</option>
                         <option value="remixer artist">Remixer</option>


                     </select>
                     <i class="fa-solid fa-chevron-down select-icon"></i>
                  </div>
                  <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                     <div class="mb-lg-4 mb-3 w-100">
                        <input type="text"  name="artist[0][name]"  placeholder="Artist Name" class="form-control custom-control artist_name" required>
                     </div>
                     <div class="mb-lg-4 mb-3">
                        <a href="javascript:;" id="addArtist" class="addInput" onClick="addInput($(this),'artist')" data-id="0">
                            <span class="increament"><i class="fa fa-plus"></i></span>
                        </a>
                     </div>
                  </div>
                   </div>

               </div> --}}


               <div class="row input-group-list artistContent"></div>
               <div class="mb-lg-4 mb-3 position-relative input-icon input-left-icon">
                  <label for="" class="form-label">Release Date?</label>
                  <input type="date" name="release_date" id="release_date"  required class="form-control custom-control"><i class="left-icon"><img src="{{ asset('assets/portal-revamp/img/calender.png') }}" alt=""></i>
               </div>
               <div>
                   <label for="" class="form-label mb-0">Album Artwork (3000 x 3000 pixel)</label>
                  <small class="text-danger mb-2 d-block">Make sure image size should be less than 2048KB</small>
                  <div class="mb-lg-4 mb-3 position-relative">
                  <span class="text-danger" id="sizeMsg" style="display:none">Image Size is greater than 2048KB<br></span>
                  <small class="upload-msg text-danger" style="width:auto !important"></small>
                  <div class="image-album" style="display:none ;">
                    <span class="cross">x</span>
                    <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none; height:150px; width:150px" class="img-upload-album">
                 </div>

                  <input type="file" id="readUrl" name="album_artwork" required accept="image/*"  class="form-control custom-control">
                  <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none; height:100px; width:100px;">
               </div>
               </div>

               <div class="mb-lg-4 mb-3 position-relative input-icon">
                  <label for="" class="form-label">Primary Language</label>
                  <select id="exampleFormControlSelect2" name="language" required class="form-control custom-control">
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
                  <i class="fa-solid fa-chevron-down select-icon"></i>
               </div>
               <div class="d-md-flex justify-content-between gap-3">
                  <div class="mb-lg-4 mb-3 w-100 position-relative input-icon">
                     <label for="" class="form-label">Primary Genre</label>
                     <select name="primary_genre" id="primary_genre" required class="form-control custom-control">
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
                     <i class="fa-solid fa-chevron-down select-icon"></i>
                  </div>
                  <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
                     <label for="" class="form-label">Secondary Genre(Optional)</label>
                     <select name="secondary_genre" id="secondary_genre"  class="form-control custom-control">
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
                     <i class="fa-solid fa-chevron-down select-icon"></i>
                  </div>
                </div>
                <div class="mb-lg-4 mb-3 position-relative input-icon">
                  <label for="" class="form-label">Catalog ID</label>
                  <input type="text" name="catalog_id" id="catalog_id" placeholder="Add your own catalog reference ID (Optional)" class="form-control custom-control">
               </div>


               <div class="d-md-flex justify-content-between gap-3">
                <div class="mb-lg-4 mb-3 w-50    position-relative input-icon">
                   <label for="" class="form-label">&#8471; Copyright</label>
                   <select name="p_copyright_year" id="p_copyright_year"  class="form-control custom-control" required>
                    <option value="">Select Year</option>
                      @forelse (copyrightYear() as $copyright)
                            <option value="{{$copyright}}">{{$copyright}}</option>
                      @empty

                      @endforelse
                   </select>
                   <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
                <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
                   <label for="" class="form-label">&nbsp;</label>
                   <input type="text" name="p_copyright_name" id="p_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control" required>
                </div>
              </div>


              <div class="d-md-flex justify-content-between gap-3">
                <div class="mb-lg-4 mb-3 w-50    position-relative input-icon">
                   <label for="" class="form-label">&copy; Copyright</label>
                   <select name="c_copyright_year" id="c_copyright_year"  class="form-control custom-control" required>
                    <option value="">Select Year</option>
                      @forelse (copyrightYear() as $copyright)
                            <option value="{{$copyright}}">{{$copyright}}</option>
                      @empty

                      @endforelse
                   </select>
                   <i class="fa-solid fa-chevron-down select-icon"></i>
                </div>
                <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
                   <label for="" class="form-label">&nbsp;</label>
                   <input type="text" name="c_copyright_name" id="c_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control" required>
                </div>
              </div>



               <div class="mb-lg-4 mb-3">
                  <label for="" class="form-label">Stores</label>
                  <div class="stories mt-2 border p-3 pb-0">
                     @forelse ($stores as $item)
                     <input type="hidden" name="stores[]" value="{{ $item->name }}" class="storeDetails_{{ $item->id }}">
                     <span class="mx-2 mb-3 d-inline-block @if($item->name != 'Spotify') showTimes  @endif storeDetails_{{ $item->id }}"  data-id="{{ $item->id }}"><a href="javascript:;" @if($item->name != 'Spotify') onClick="removeStore({{$item->id}})" @endif id="store_{{ $item->id }}" style="color:#FFF301"><img src="{{asset('assets/icons/'.$item->logo)}}" width="45" height="45" alt="{{ $item->name }}"></a></span>
                     @empty
                     @endforelse
                  </div>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="py-4 px-lg-4 px-2 sortable-container" id="uploadedTracks">
            </div>
            <div id="multiTracks">
                <div id="track_1">
                    <div class="card-body py-4 px-lg-4 px-2">
                        <div class="mb-lg-4 mb-3">
                            <label for="track_title" class="form-label">Track Title</label>
                            <input type="text" name="track_title" placeholder="Track Title" class="form-control custom-control track_title" required>
                        </div>
                        <div class="mb-lg-4 mb-3">
                            <label for="track_version" class="form-label">Track Version</label>
                            <input type="text" name="track_version" placeholder="Track Version" class="form-control custom-control track_version" required>
                        </div>
                        <div class="mb-lg-4 mb-3">
                            <label for="isrc" class="form-label">ISRC CODE</label>
                            <input type="text" id="isrc" name="track_isrc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control">
                        </div>
                        <div id="createAddArtistIdTrack">

                        </div>

                        {{-- <div class="">
                            <label for="artist" class="form-label">Artist</label>
                            <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center ">
                                <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">

                                <select id="exampleFormControlSelect2" name="artist_track_type[]" required class="form-control custom-control">
                                    <option value="primary artist">Primary Artist</option>
                                    <option value="featured artist">Featured Artist</option>
                                    <option value="producer artist">Producer</option>
                                    <option value="remixer artist">Remixer</option>
                                </select>
                                <i class="fa-solid fa-chevron-down select-icon"></i>
                            </div>
                            <div class="mb-lg-4 mb-3 w-100">
                                <input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control">
                            </div>
                            <div class="mb-lg-4 mb-3 w-100">
                                    <input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control">
                                </div>
                            <div class="mb-lg-4 mb-3 w-100">
                                    <input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control">
                                </div>
                            <div class="mb-lg-4 mb-3">
                                    <a href="javascript:;" id="artistTrack" class="addInput" onClick="addInput($(this),2)" data-id="0">
                                        <span class="increament"><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>
                            </div>

                        </div> --}}
                        <div class="trackArtist">
                        </div>

                        <div class="">
                            <label for="" class="">Artist</label>
                        </div>
                        <div class="" id="addMainPrimaryArtistTrack">
                            <br>
                            <button  onClick="mainArtist($(this))" data-type="main" data-location="track" type="button"  class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Main Primary Artist</strong></button>
                        </div>
                        <div id="mainArtistDetailTrack">
                        </div>

                        <div id="otherArtistDetailTrack" class="mt-4">
                        </div>

                        <div class="mb-2 mt-2" id="addOtherKeyArtistTrack" style="display: none">
                            <button  onClick="mainArtist($(this))" data-type="other" data-location="track" type="button"  class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Other Key Artist</strong></button>
                        </div>
                    </div>

                    <div class="card-body border-top">
                        <div class="form-check ">
                            <input class="form-check-input me-3" name="track_contains_1"type="radio" id="flexRadioDefault1" value="Contain Vocals">
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
                            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault21" value="Clean">
                            <label class="form-check-label" for="flexRadioDefault21">
                            <span class="custom-label">Clean</span>
                            <br>
                            My Song doesn't contain any profanity (Includes title & artwork)
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault22" checked value="Explicit">
                            <label class="form-check-label" for="flexRadioDefault22">
                            <span class="custom-label">Explicit</span>
                            <br>
                            My Song contain any profanity (Includes title & artwork)
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault23" value="Radio Edit">
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
                            <input type="text" id="track_language" name="track_language" placeholder="Language" required class="form-control custom-control">
                        </div>
                        <div class="">
                            <label for="" class="form-label">Song Writers</label>
                            <div class="d-lg-flex d-block justify-content-between gap-3 align-items-center">
                                <div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc">

                                <select  name="songwriters_type[]" required class="form-control custom-control tracksongwriter_type">
                                    <option value="Composer &amp; writer">Composer &amp; writer</option>
                                    <option value="Composer">Composer</option>
                                    <option value="Lyricist">Lyricist</option>
                                    <option value="Publisher">Publisher</option>
                                </select>
                                <i class="fa-solid fa-chevron-down select-icon"></i>
                            </div>
                            <div class="d-flex w-100 justify-content-between gap-3 align-items-center">
                                <div class="mb-lg-4 mb-3 w-100">

                                    <input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name">
                                </div>
                                <div class="mb-lg-4 mb-3">
                                    <a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="0">
                                        <span class="increament"> <i class="fa fa-plus"></i> </span>
                                    </a>
                                </div>
                            </div>
                            </div>

                        </div>
                        <div class=" songWriterContent" style="">
                        </div>
                        <div class="d-md-flex justify-content-between gap-3  ">
                            <div class="mb-lg-4 mb-3 w-50    position-relative input-icon">
                               <label for="" class="form-label">&#8471; Copyright</label>
                               <select name="track_p_copyright_year" id="track_p_copyright_year"  class="form-control custom-control" >
                                <option value="">Select Year</option>
                                  @forelse (copyrightYear() as $copyright)
                                        <option value="{{$copyright}}">{{$copyright}}</option>
                                  @empty

                                  @endforelse
                               </select>
                               <i class="fa-solid fa-chevron-down select-icon"></i>
                            </div>
                            <div class="mb-lg-4 mb-3 w-100 input-icon position-relative">
                               <label for="" class="form-label">&nbsp;</label>
                               <input type="text" name="track_p_copyright_name" id="track_p_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control" >
                            </div>
                        </div>



                        <div class="trackContent">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="mb-lg-4 mb-3 input-icon position-relative" id="aTrack">
                    <div class="col-lg-12">
                       <label for="addFile">Audio File (WAV Files Only)</label>
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
                                   <input type="file" onchange="previewFile(1)"  name="track_audio_file"  accept="audio/wav" class="audiofile a_1 browseFile audio-upload-file-input">
                                   <p class="file-upload-infos-message" id="audioMsg_1">Audio upload - Drag and drop or click</p>
                                   <small class="text-danger" id="audioTrackMsg" style="display:none">Track Size is larger than 30 MB</small>
                                </div>
                                <div class=" w-100 ">
                                   <audio controls src="" id="audio_1" width="100%" style="background:rgb(255 243 1); display:none; width:100%"></audio>
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

               <div class="mb-lg-4 mb-3 input-icon position-relative" id="lyricsSection">
                    <div class="col-lg-12">
                       <label for="addFile">Lyrics</label>
                    </div>
                    <div class="col-lg-12" >
                       <div class="row p-3 pb-4 border border-light rounded shadow m-0">
                          <div class="col-md-12 mb-3">
                             <textarea  id="lyrics" name="lyrics" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                       </div>
                    </div>
                 </div>


               <div class="row">
                    <div class="col-12 text-end">
                        <div id="createMode">
                            <a href="#multiTracks">
                                <button type="button" id="addTrack" data-id="1" onClick="uploadTrack($(this))" class="btn btn-primary rounded">Add Track <span id="addTrackCount">One</span></button>
                            </a>
                        </div>
                        <div id="updateMode" style="display: none">
                            <a href="#multiTracks">
                                <button type="button" id="updateTrack"  data-id="1"   class="btn btn-primary rounded">Update Track</button>
                            </a>
                            &nbsp;&nbsp;
                            <a href="#multiTracks">
                                <button type="button" id="resetTrack"  data-id="1"  class="btn btn-primary rounded" style="color:white; background-color:black">Cancel</button>
                            </a>
                        </div>
                    </div>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-body py-4 px-lg-4 px-2">
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
               <span class="ins d-block mt-4 mb-lg-4 mb-3">Add your First track this button will be enable on your first upload. Upload Your Track and hit on Add Track button</span>
               <div class="row">
                  <div class="col-12 ">
                    <span class="badge bg-danger mb-3" id="msg_no_of_songs" style="">You have selected <span class="no_of_songs"></span> tracks. Please upload <span class="no_of_songs"></span> tracks to enable this button</span>
                     <button id="createRelease" type="submit" class="btn btn-primary rounded w-100" disabled>Create Release</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {!! Form::close() !!}
   </div>
</div>

<div class="modal fade" id="mainArtistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-body">
          <input type="hidden" id="location">
          <div class="row">
              <div class="col-md-12">
                  <h4 class="text-white" id="addArtistTitle">Add Main Primary Artist</h4>
              </div>
          </div>
          <div class="row" id="roleDropDown" style="display:none">
              <div class="col-md-12">
                  <label for="" class="text-white">Role</label>
                  {!! Form::select('role', artistNew(), null, ['id' => 'role' , 'class' => 'form-control select2Other', 'placeholder' => 'Please Select']) !!}
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="" class="text-white">Artist</label>
                  <select name="" id="userArtists" class="form-control select2">
                      <option value="create_artist" disabled>Artist Not Found, Search Artist</option>
                  </select>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-md-12" >
                  <div style="float:right">
                      <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModal($(this))">Cancel</button>&nbsp;
                      <button class="btn btn-primary artistType" onClick="addArtistDetail($(this))">Add Artist</button>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

  <div class="modal fade" id="createAndNewArtistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-body">
              <form  method="post" id="addNewArtist" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-12">
                          <h4 class="text-white">Create & Add a New Artist</h4>
                      </div>
                  </div>
                  <center>
                  <div class="row">
                      <div class="small-12 medium-2 large-2 columns ">
                      <div class="circle">
                          <img class="profile-pic" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">

                      </div>
                      <!--<div class="p-image">-->
                      <!--    <i class="fa fa-camera upload-button"></i>-->
                          <!--<input id="newArtistAvatar" class="file-upload-artist" type="file" accept="image/*" name="avatar"/>-->
                      <!--</div>-->
                      <!--<small style="color:rgb(147, 143, 143);" >We Support PNG, JFIF, JPEG or JPG Images.</small>-->
                  </div>
                  </div>
                  </center>
                  <hr>
                  <div class="row">
                      <div class="col-md-12">
                          <label for="" class="text-white">Official Artist/Brand Name</label>
                          <input type="text" name="name" id="newArtistName"  class="form-control" placeholder="Offical name" required>
                          <small style="color:rgb(147, 143, 143);">The artist name must be written exactly as you want it to appear on music services suchas Spotify, Apple Music, etc</small>
                      </div>
                      <div class="col-md-12 mt-3" >
                          <label for="" class="form-label text-white">Is there Artist on Spotify? (required when distributing to Spotify)</label>
                          <div class="form-check ">
                              <input class="form-check-input me-3" name="spotify_profile_link" type="radio" value="1"  id="flexRadioDefault102"  onChange="spotifyProfileLink($(this))">
                              <label class="form-check-label" for="flexRadioDefault102">
                              <span class="custom-label text-white">Yes</span>

                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input me-3" name="spotify_profile_link" type="radio" id="flexRadioDefault101" value="0"  checked onChange="spotifyProfileLink($(this))">
                              <label class="form-check-label" for="flexRadioDefault101">
                              <span class="custom-label text-white">No, create a new Spotify profile for this artist</span>

                              </label>
                          </div>
                          <div class="spotifyProfileLink" style="display:none">
                              <input type="url" name="spotify_link" id="spotify_link" class="form-control" placeholder="Artist Spotify Profile Link">
                          </div>
                      </div>

                      <div class="col-md-12 mt-3" >
                          <label for="" class="form-label text-white">Is there Artist on Apple Music? (required when distributing to Apple Music)</label>
                          <div class="form-check ">
                              <input class="form-check-input me-3" name="apple_music_profile_link"  type="radio" value="1"  id="flexRadioDefault202"   onChange="appleMusicProfileLink($(this))">
                              <label class="form-check-label" for="flexRadioDefault202">
                              <span class="custom-label text-white">Yes</span>
                              </label>
                          </div>
                          <div class="form-check ">
                              <input class="form-check-input me-3" name="apple_music_profile_link" type="radio" id="flexRadioDefault201" value="0"  checked onChange="appleMusicProfileLink($(this))">
                              <label class="form-check-label" for="flexRadioDefault201">
                              <span class="custom-label text-white">No, create a new Apple Music profile for this artist</span>

                              </label>
                          </div>
                          <div class="appleMusicProfileLink" style="display:none">
                              <input type="url" name="apple_music_link" id="apple_music_link" class="form-control" placeholder="Artist Apple Music Profile Link">
                          </div>
                      </div>
                  </div>

                  <div class="row mt-3 ">
                      <div class="col-md-12" >
                          <div style="float:right">
                              <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModal($(this))">Cancel</button>&nbsp;
                              <button type="submit" class="btn btn-primary" >Add Artist</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="editArtistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-body" id="editArtistDetail">

            </div>
          </div>
        </div>
    </div>
@endsection
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script src="{{asset('assets/revamp/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/date-time-picker.min.js') }}"></script>
<script src="{{ asset('assets/revamp/js/num2words.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
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
        $("#previous_release_date").dateTimePicker({
            limitMax: '{{ date("Y-m-d",strtotime("-1 days")); }}'
        });
    });

    $(".J-dtp-btn-today").hide();
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
      var html = ' <div class="d-lg-flex justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 input-icon inc position-relative artist_' + count + '"><select  class="form-control custom-control artist" id="exampleFormControlSelect2" name="artist[' + count + '][type]" required ><option value="primary artist">Primary Artist</option><option value="featured artist">Featured Artist</option><option value="producer artist">Producer</option><option value="remixer artist">Remixer</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center artist_' + count + '"><div class="mb-lg-4 mb-3 w-100"><input type="text"  name="artist[' + count + '][name]"  placeholder="Artist Name" class="form-control custom-control artist_name" required></div><div class="mb-lg-4 mb-3 artist_' + count + '"><a href="javascript:;" style="text-decoration:none !important" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artist"><span class="increament bg-danger"><i class="fa fa-times"></i></span></a></div></div></div>';
      return html;
   }

   function track(count) {
    //   var html = '<div class="col-lg-2 artist_track_' + count + '"> <div class="form-group">  <select class="form-control artist" id="exampleFormControlSelect2" name="artist_track_type[]" required > <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_name[]" required id="" class="form-control artist_name text-white" placeholder="Artist Name"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_spotify[]" required id="" class="form-control artist_spotify text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-3 artist_track_' + count + '"> <div class="form-group">  <input type="text" name="artist_track_apple[]" required id="" class="form-control artist_apple text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div>  <div class="col-lg-1 d-flex align-items-center justify-content-between p-0  artist_track_' + count + '"> <div class="form-group d-flex align-items-center form-remove-add">  <a href="javascript:;" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artistTrack">x</a> </div> </div> ';
    var html = '<div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc artist_track_' + count + '"><select id="exampleFormControlSelect2" name="artist_track_type[]" required  class="form-control custom-control"><option value="primary artist">Primary Artist</option><option value="featured artist">Featured Artist</option><option value="producer artist">Producer</option><option value="remixer artist">Remixer</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_name[]" required placeholder="Artist Name" class="form-control custom-control artist_name"></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_spotify[]" required placeholder="Spotify Link. Leave blank if you do not have any" class="form-control custom-control artist_spotify"></div><div class="mb-lg-4 mb-3 w-100 artist_track_' + count + '"><input type="text" name="artist_track_apple[]" required placeholder="Apple Link. Leave blank if you do not have any" class="form-control custom-control artist_apple"></div><div class="mb-lg-4 mb-3 artist_track_' + count + '"><a href="javascript:;" style="text-decoration: none !important" class="removeInput" onClick="removeInput($(this))" data-id=' + count + ' data-type="artistTrack"><span class="increament bg-danger"><i class="fa fa-times"></i></span></a></div></div>';
      return html;
   }

   function songWriters(count) {
    //   var html = '<div class="col-lg-4 songwriters_track_' + count + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + count + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + count + '" > <div class="form-group d-flex align-items-center form-remove-add-p2">  <a href="javascritpt:;" class="removeInput" onClick="removeInput($(this))" data-id="' + count + '" data-type="songWriter">x</a> </div>';
      var html = '<div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon inc songwriters_track_' + count + '"><select  name="songwriters_type[]" required class="form-control custom-control tracksongwriter_type"><option value="Composer &amp; writer">Composer &amp; writer</option><option value="Composer">Composer</option><option value="Lyricist">Lyricist</option><option value="Publisher">Publisher</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center songwriters_track_' + count + '"><div class="mb-lg-4 mb-3 w-100"><input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name"></div><div class="mb-lg-4 mb-3 songwriters_track_' + count + '"><a href="javascritpt:;" style="text-decoration:none !important" class="removeInput" onClick="removeInput($(this))" data-id="' + count + '" data-type="songWriter"><span class="increament bg-danger"> <i class="fa fa-times"></i> </span></a></div></div></div>';
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
               if (width == 3000 && height == 3000) {
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


   function multiTrack(count, trackId, track_title, track_version) {
    var trackVersion = ' ('+track_version+')';
    if(track_version == ""){
        trackVersion = "";
    }
    //   $("#multiTracks").append('<div class="card-body py-4 px-lg-4 px-2"><div class="row mt-5  " id="track_msg_' + count + '" > <div class="col-md-12"> <h2 class="text-center trackUploaded" ><i class="fa fa-check text-success"></i>&nbsp;&nbsp;('+count+') ' + track_title + ' Uploaded</h2> <div class="text-center"> <a href="javascript:;" onClick="editTrack(' + trackId + ',$(this))"  data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-pencil text-success d-none" style="font-size:25px"></i></a>&nbsp;&nbsp;<a href="javascript:;" onClick="deleteTrack(' + trackId + ',$(this))" data-count="' + count + '" data-name="' + track_title + '"><i class="fa fa-trash text-danger" style="font-size:25px;"></i></a> </div></div> </div></div>');
    $("#uploadedTracks").append('<div id="remove_track_'+trackId+'" data-id="'+trackId+'" class="sortable-item stories mt-2 border p-3"><div class="row"><div class="col-1"><small>&nbsp;</small><h4 >'+count+'</h4></div><div class="col-9"><small>Track Name</small><h4 id="track_name_'+trackId+'"style="color: var(--primary)">'+track_title+trackVersion+'</h4></div><div class="col-md-2"><div class="row"><div class="col-6 text-center"><small>Edit</small><br><a href="#multiTracks" onClick="editTrackv2('+trackId+','+count+')"><span><i class="fa fa-pencil-square" style="color:var(--primary); font-size:30px"></i></span></a></div><div class="col-6 "><small>Remove</small><br><a href="javascript:;" onClick="removeTrack('+trackId+',$(this),null)"><span><i class="fa fa-minus-square" style="color:var(--primary); font-size:30px;"></i></span></a></div></div></div></div><input type="hidden" value="' + trackId + '" id="track_sortable' + trackId + '" name="audio_track_sortable[]" ></div>');
   }

   function addTrack(count, trackId) {
    var selectedSongs = parseInt($("#number_of_songs").val()) + 1;
    var track_title = $(".track_title").val();
    var track_version = $(".track_version").val();
      $("#track_" + count).remove();
      multiTrack(count, trackId, track_title, track_version);
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
        text= '<div id="track_' + i + '"><div class="card-body py-4 px-lg-4 px-2"><div class="mb-lg-4 mb-3"><label for="track_title" class="form-label">Track Title</label><input type="text" name="track_title" id="track_title_' + i + '"  placeholder="Track Title" class="form-control custom-control track_title" required></div><div class="mb-lg-4 mb-3"><label for="track_version" class="form-label">Track Version</label><input type="text" name="track_version" id="track_version_' + i + '"  placeholder="Track Version" class="form-control custom-control track_version" required></div><div class="mb-lg-4 mb-3"><label for="isrc" class="form-label">ISRC CODE</label><input type="text" id="isrc" name="track_isrc" placeholder="If you don’t have one. Leave blank we’ll generate one for free" class="form-control custom-control"></div><div id="createAddArtistIdTrack"></div><div class=""><label for="" class="">Artist</label></div><div class="" id="addMainPrimaryArtistTrack"><br><button onclick="mainArtist($(this))" data-type="main" data-location="track" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Main Primary Artist</strong></button></div><div id="mainArtistDetailTrack"></div><div id="otherArtistDetailTrack" class="mt-4"></div><div class="mb-2 mt-2" id="addOtherKeyArtistTrack" style="display: none"><button onclick="mainArtist($(this))" data-type="other" data-location="track" type="button" class="btn " style="background-color: #FFF301; color: #333;"><strong><i class="fa fa-plus"></i>&nbsp; Add Other Key Artist</strong></button></div><div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="trackArtist"></div></div>';
        text+= '<div class="card-body border-top"><div class="form-check "><input class="form-check-input me-3" name="track_contains_1"type="radio" id="flexRadioDefault1' + i + '" value="Contain Vocals"><label class="form-check-label" for="flexRadioDefault1"><span class="custom-label">Contain Vocals</span><br>My Song contains lyrics and vocals</label></div><div class="form-check mt-3"><input class="form-check-input me-3" name="track_contains_1"type="radio" value="Instrumental"  id="flexRadioDefault2 ' + i + '" checked><label class="form-check-label" for="flexRadioDefault2"><span class="custom-label">Instrumental</span><br>My Song contains no lyrics and vocals</label></div></div><div class="card-body border-top"><div class="form-check"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault21' + i + '" value="Clean"><label class="form-check-label" for="flexRadioDefault21"><span class="custom-label">Clean</span><br>My Song does not contain any profanity (Includes title & artwork)</label></div><div class="form-check mt-3"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault22' + i + '" checked value="Explicit"><label class="form-check-label" for="flexRadioDefault22"><span class="custom-label">Explicit</span><br>My Song contain any profanity (Includes title & artwork)</label></div><div class="form-check mt-3"><input class="form-check-input me-3" type="radio" name="track_contains_2" id="flexRadioDefault23' + i + '" value="Radio Edit"><label class="form-check-label" for="flexRadioDefault23"><span class="custom-label">Radio Edit</span><br>The track is clean/censored, but have a explict version.</label></div></div><div class="card-body border-top"><div class="mb-lg-4 mb-3 input-icon position-relative"><label for="" class="form-label">Language</label><input type="text" id="track_language" name="track_language" placeholder="Language" required class="form-control custom-control"></div><div class="d-lg-flex d-block justify-content-between gap-3 align-items-center "><div class="mb-lg-4 mb-3 w-100 position-relative input-icon songwriters_track_' + i + '"><label for="" class="form-label">Song Writers</label><select  name="songwriters_type[]" required class="form-control custom-control tracksongwriter_type"><option value="Composer &amp; writer">Composer &amp; writer</option><option value="Composer">Composer</option><option value="Lyricist">Lyricist</option><option value="Producer">Producer</option><option value="Publisher">Publisher</option></select><i class="fa-solid fa-chevron-down select-icon"></i></div><div class="d-flex w-100 justify-content-between gap-3 align-items-center songwriters_track_' + i + '"><div class="mb-lg-4 mb-3 w-100"><label for="" class="form-label opacity-0">sfsa</label><input type="text" name="songwriters_name[]" required placeholder="Name" class="form-control custom-control tracksongwriter_name"></div><div class="songwriters_track_' + i + '"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'"><span class="increament"> <i class="fa fa-plus"></i> </span></a></div></div></div><div class=" songWriterContent" style=""></div><div class="trackContent"></div><div class="d-md-flex justify-content-between gap-3 border-top"> <div class="mb-lg-4 mb-3 w-50    position-relative input-icon "> <label for="" class="form-label">&#8471; Copyright</label> <select name="track_p_copyright_year" id="track_p_copyright_year"  class="form-control custom-control" > <option value="">Select Year</option> @forelse (copyrightYear() as $copyright) <option value="{{$copyright}}">{{$copyright}}</option> @empty @endforelse </select> <i class="fa-solid fa-chevron-down select-icon"></i> </div> <div class="mb-lg-4 mb-3 w-100 input-icon position-relative"> <label for="" class="form-label">&nbsp;</label> <input type="text" name="track_p_copyright_name" id="track_p_copyright_name" placeholder="Name of individual/entity" class="form-control custom-control" > </div> </div></div>';
    //   text = '<div id="track_' + i + '"><div class="row mt-5 bg-dark p-3"> <div class="col-lg-12"><div class="form-group"> <label for="titleTrack">' + i + '. Track Title</label> <input type="text" name="track_title" id="track_title_' + i + '" class="form-control track_title text-white" placeholder="Track Title"></div> </div> <div class="col-lg-12"> <div class="form-group"> <label for="isrc">ISRC CODE</label> <input type="text" class="form-control text-white" id="isrc" name="track_isrc_code" value="" placeholder="If you do not have one. Leave blank we will generate one for free">  </div> </div><div class="col-lg-2"> <div class="form-group"> <label for="artist">Artist</label> <select class="form-control" id="exampleFormControlSelect2" name="artist_track_type[]" required> <option value="primary artist">Primary Artist</option> <option value="featured artist">Featured Artist</option> </select> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_name[]" required id="" class="form-control text-white" placeholder="Artist Name"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text" name="artist_track_spotify[]" required id="" class="form-control text-white" placeholder="Spotify Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for=""></label> <input type="text"  name="artist_track_apple[]" required id="" class="form-control text-white" placeholder="Apple Link. Leave blank if you do not have"> </div> </div> <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4"> <div class="form-group d-flex align-items-center form-remove-add"><a href="javascript:;" id="artistTrack" class="addInput" onclick="addInput($(this),2)" data-id="' + i + '">+</a></div></div><div class="row input-group-list w-100 m-0 trackArtist"> </div>';
    //   text += '<div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Contain Vocals"> Contain Vocals <i class="input-helper"></i></label> <span>My Song contains lyrics and vocals</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_1" id="ExampleRadio' + i + '"  value="Instrumental">Instrumental <i class="input-helper"></i></label> <span>My Song contains no lyrics and vocals</span> </div> </div> <div class="col-lg-12"> <hr class="hr-releases"> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Clean"> Clean <i class="input-helper"></i></label> <span>My Song does not contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Explicit">Explicit <i class="input-helper"></i></label> <span>My Song contain any profanity (Includes title & artwork)</span> </div> <div class="form-check form-check-warning"> <label class="form-check-label"> <input type="radio" class="form-check-input" name="track_contains_2" id="ExampleRadio1' + i + '"  value="Radio Edit">Radio Edit <i class="input-helper"></i></label> <span>The track is clean/censored, but have a explict version.</span> </div> <hr class="hr-releases"> </div> <div class="col-lg-12 mt-3"> <div class="form-group"> <label for="language">Language</label> <input type="text" name="track_language" requried id="" class="form-control text-white"> </div> </div> <div class="col-lg-12"> <div class="form-group">  </div> </div> <div class="col-lg-4 songwriters_track_' + i + '"> <div class="form-group"> <select name="songwriters_type[]" required id="" class="form-control"> <option value="Composer & Writer">Composer & writer</option> <option value="Composer">Composer</option> <option value="Lyricist">Lyricist</option> <option value="Producer">Producer</option> <option value="Publisher">Publisher</option> </select> </div> </div> <div class="col-lg-7 songwriters_track_' + i + '" > <div class="form-group"> <input type="text" name="songwriters_name[]" required id="" class="form-control text-white" placeholder="Name"> </div> </div> <div class="col-lg-1 songwriters_track_' + i + '" > <div class="form-group d-flex align-items-center form-remove-add-p2"><a href="javascript:;" id="songWriter" class="addInput" onclick="addInput($(this),3)" data-id="'+i+'">+</a></div> </div></div><div class="row bg-dark songWriterContent" style="padding-right:17px; padding-left:17px;"> </div>';
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
      var track_version = $("[name=track_version]").val();
      var track_isrc = $("[name=track_isrc]").val();
      var artist_ids = $("[name='artist_id[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_ids_track = $("[name='artist_id_track[]']").map(function() {
         return $(this).val();
      }).get();
      var artist_role_track = $("[name='artist_role_track[]']").map(function() {
         return $(this).val();
      }).get();

    //   var artist_track_type = $("[name='artist_track_type[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_name = $("[name='artist_track_name[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_spotify = $("[name='artist_track_spotify[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_apple = $("[name='artist_track_apple[]']").map(function() {
    //      return $(this).val();
    //   }).get();
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
      var p_copyright_year = $("[name=track_p_copyright_year]").val();
      var p_copyright_name = $("[name=track_p_copyright_name]").val();

      var lyrics = tinyMCE.get('lyrics').getContent();
      console.log(track_audio_file);
      form.append('track_title', track_title);
      form.append('track_version', track_version);
      form.append('track_isrc', track_isrc);
      form.append('artist_ids',artist_ids_track);
      form.append('artist_roles',artist_role_track);

    //   form.append('artist_track_type', artist_track_type);
    //   form.append('artist_track_name', artist_track_name);
    //   form.append('artist_track_spotify', artist_track_spotify);
    //   form.append('artist_track_apple', artist_track_apple);
      form.append('track_contains_1', track_contains_1);
      form.append('track_contains_2', track_contains_2);
      form.append('track_language', track_language);
      form.append('songwriters_type', songwriters_type);
      form.append('songwriters_name', songwriters_name);
      form.append('track_audio_file', track_audio_file);
      form.append('p_copyright_year', p_copyright_year);
      form.append('p_copyright_name', p_copyright_name);
      form.append('lyrics', lyrics);

      if(artist_ids == ""){
        notify('Please select and add Artist','error');
      }
      if(artist_ids_track == ""){
        notify('Please select and add Artist','error');
      }
      if (track_title == "") {
         notify('Track Title is required', 'error')
      }

    //   if (artist_track_name == "") {
    //      notify('Please Fill Artist Details', 'error')
    //   }
      if (track_language == "") {
         notify('Language is required', 'error')
      }
      if (songwriters_name == "") {
         notify('Songwriter is required', 'error')
      }
      if (track_audio_file == undefined) {
         notify('Audio Track is required', 'error')
      }

      if (artist_ids != "" && track_title != "" && track_language != "" && songwriters_name != "" && track_audio_file != undefined ) {

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
                  tinymce.activeEditor.setContent('');
                  $("#audio_1").hide();
                  $("#audioMsg_1").html('Audio Upload - Drag and drop or click');
                  $(".progress").hide();
                  $(".showloaderMsg").hide();
                  var newCount = count + 1;
                  $("#addTrack").attr('data-id',newCount);
                  $('#addTrackCount').html(numToWords(newCount));
                  $("#updateTrack").attr('data-id',newCount);
                  $("#resetTrack").attr('data-id',newCount);

                  $("#active_message").fadeOut();
                  $("#createRelease").attr('disabled', false);
                  addTrack(count, res.data);
                  $("#audioTracks").append('<input type="hidden" value="' + res.data + '" id="track_' + res.data + '" name="audio_track[]" data-id="'+parseInt(count - 1)+'">');
                  notify(res.msg, 'success');
               }
            },
            error: function(res) {
                $('.loader').hide();
                notify('Audio Track is required', 'error');
            }
         });
      }
      else{
        notify('Please select required fields', 'error');
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
            $("#audioMsg_1").html(res.audio_track+'</br>Audio upload - Drag and drop or click to change the track');
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
                        $("#audioMsg_1").html('Audio upload - Drag and drop or click');
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
      var track_version = $("[name=track_version]").val();
      var track_id = $("[name=track_id]").val();
      var track_isrc = $("[name=track_isrc]").val();
    //   var artist_track_type = $("[name='artist_track_type[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_name = $("[name='artist_track_name[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_spotify = $("[name='artist_track_spotify[]']").map(function() {
    //      return $(this).val();
    //   }).get();
    //   var artist_track_apple = $("[name='artist_track_apple[]']").map(function() {
    //      return $(this).val();
    //   }).get();
      var artist_ids_track = $("[name='artist_id_track[]']").map(function() {
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
      var p_copyright_year = $("[name=track_p_copyright_year]").val();
      var p_copyright_name = $("[name=track_p_copyright_name]").val();
      var lyrics = tinyMCE.get('lyrics').getContent();
      form.append('track_title', track_title);
      form.append('track_version', track_version);
      form.append('track_id', track_id);
      form.append('track_isrc', track_isrc);
    //   form.append('artist_track_type', artist_track_type);
    //   form.append('artist_track_name', artist_track_name);
    //   form.append('artist_track_spotify', artist_track_spotify);
    //   form.append('artist_track_apple', artist_track_apple);
      form.append('artist_ids',artist_ids_track);
      form.append('track_contains_1', track_contains_1);
      form.append('track_contains_2', track_contains_2);
      form.append('track_language', track_language);
      form.append('songwriters_type', songwriters_type);
      form.append('songwriters_name', songwriters_name);
      form.append('track_audio_file', track_audio_file);
      form.append('p_copyright_year', p_copyright_year);
      form.append('p_copyright_name', p_copyright_name);
      form.append('lyrics', lyrics);
      form.append('count',count);

      console.log(artist_ids_track);

      if (track_id == "") {
         notify('Track ID is required', 'error')
      }
      if (track_title == "") {
         notify('Track Title is required', 'error')
      }
    //   if (artist_track_name == "") {
    //      notify('Please Fill Artist Details', 'error')
    //   }
      if(artist_ids_track == ""){
        notify('Please select and add Artist','error');
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
      if (track_title != "" && artist_ids_track != "" && track_language != "" && songwriters_name != "" &&  track_audio_file != undefined  ) {

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
                $("#loaderMsg").html('Please Wait..<br>It takes time<br>Depends on the size of Wav File');
                $('.loader').show();
            },
            success: function(res) {
                $("#loaderMsg").html('Bravo!, Track Uploaded');
                $('.loader').hide();
               if (res.success == true) {
                  tinymce.activeEditor.setContent('');
                  $("#audio_1").attr('src','').hide();
                  $("#audioMsg_1").html('Audio Upload - Drag and drop or click');
                  $(".progress").hide();
                  $(".showloaderMsg").hide();
                  notify(res.msg, 'success');
                  $("#multiTracks").html(res.data);
                  $("#createMode").show();
                  $("#updateMode").hide();
                  if(res.track_version == "" || res.track_version == null){ var trackTitleAndVersion = res.track_title; }
                  else{ var trackTitleAndVersion = res.track_title +' ('+res.track_version+')'; }
                  $("#track_name_"+track_id).html(trackTitleAndVersion);
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
    //   var audio_track = $("[name='audio_track[]']").map(function() {
    //      return $(this).val();
    //   }).get();
        var audio_track = $("[name='audio_track_sortable[]']").map(function() {
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


   function previousRelease(elm){
        var value =  $("[name=is_previous_released]:checked").val();
        if(value == 1){
            $("#previousReleaseDate").show();
            $("#previous_release_date").attr('required',true);
            $("#previous_release_date").attr('readonly',false);
        }
        else{
            $("#previousReleaseDate").hide();
            $("#previous_release_date").attr('required',false);
            $("#previous_release_date").val('');
        }
   }



   function formatOption1(option) {
        $(".createAndNew").remove();
        // Check if the custom button has been appended
        var isCustomButtonAppended = $('.select2-dropdown').find('.custom-button').length > 0;
        console.log(isCustomButtonAppended);

        if (!isCustomButtonAppended) {
            // Append custom button
            var $dropdown = $('.select2-dropdown');
            var $customButton = $('<button class="btn btn-primary w-100 createAndNew" style="margin-bottom:0px;" onClick="createAndNewArtist($(this))">CREATE AND ADD A NEW ARTIST</button>');
            $dropdown.append($customButton);

            // Event handler for the custom button
            $customButton.on('click', function () {
                // Perform custom button action
                $('.product-select').select2('close')
            });
        }

        // Default option rendering
        return option.text;
    }


   $('.select2').select2({
        "width" : "100%",
        dropdownParent: $("#mainArtistModal"),
        templateResult: formatOption1,
        allowClear: true,
   });
   $('.select2Other').select2({
        "width" : "100%",
        dropdownParent: $("#mainArtistModal"),
        allowClear: true,
   });
   function mainArtist(elm){

       var type = elm.attr('data-type');
       var location = elm.attr('data-location');

        if(location == 'release'){
            var artistsIds = $("[name='artist_id[]']").map(function() {
                return $(this).val();
            }).get();
        }
        else if(location == 'track'){
            var artistsIds = $("[name='artist_id_track[]']").map(function() {
                return $(this).val();
            }).get();
        }
        $("#location").val(location);
        if(type == 'main'){
            $('.artistType').attr('data-artistType','main');
            $('#hiddenArtistType').val('main');
            $("#addArtistTitle").html('Create & Add a New Artist');
            $("#roleDropDown").hide();
        }
        else if(type == 'other'){
            $('.artistType').attr('data-artistType','other');
            $('#hiddenArtistType').val('other');
            $("#addArtistTitle").html('Add Other Key Artist');
            $("#roleDropDown").show();
        }

        $.ajax({
            type : "GET",
            url  : "{{route('user.getArtist')}}",
            data : {
                'artistsIds' : artistsIds,
            },
            beforeSend : function(res){
                $("#userArtists").empty();
                clearFields();
            },
            success : function(res){
                if(res.success == true){
                    $("#userArtists").append('<option value="">Select Artist</option>');
                    $("#userArtists").append(res.data);
                    // $.each(res.data,function(key,value){
                    //     if(jQuery.inArray(value.id,artists)){
                    //         $("#userArtists").append('<option value="'+value.id+'" >'+value.name+'</option>');
                    //     }
                    //     else{
                    //         $("#userArtists").append('<option value="'+value.id+'" disabled>'+value.name+'</option>');
                    //     }
                    // });
                }
                else{
                    $("#userArtists").append('<option value="create_artist" disabled>Artist Not Found, Search Artist</option>')
                }
            },
            error  : function(res){
                notify('Something Went Wrong','error');
            }
        });
        $("#mainArtistModal").modal('show');
   }
   function createAndNewArtist(elm){
        $("#mainArtistModal").modal('hide');
        $("#createAndNewArtistModal").modal('show');
   }


   $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload-artist").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload-artist").click();
        });
    });


    function spotifyProfileLink(elm){
        var value = $("[name=spotify_profile_link]:checked").val();
        console.log(value);
        if(value == 1){
            $(".spotifyProfileLink").show();
            $("#spotify_link").attr('required',true);
        }
        else{
            $(".spotifyProfileLink").hide();
            $("#spotify_link").val('');
            $("#spotify_link").attr('required',false);
        }
    }


    function spotifyProfileLink2(elm){
        var value = $("[name=spotify_profile_link2]:checked").val();
        console.log(value);
        if(value == 1){
            $(".spotifyProfileLink").show();
            $("#spotify_link").attr('required',true);
        }
        else{
            $(".spotifyProfileLink").hide();
            $("#spotify_link").val('');
            $("#spotify_link").attr('required',false);
            $("[name=edit_spotify_link]").val('');
        }
   }


   function appleMusicProfileLink(elm){
        var value = $("[name=apple_music_profile_link]:checked").val();
        if(value == 1){
            $(".appleMusicProfileLink").show();
            $("#apple_music_link").attr('required',true);
        }
        else{
            $(".appleMusicProfileLink").hide();
            $("#apple_music_link").val('');
            $("#apple_music_link").attr('required',false);
        }
   }


   function appleMusicProfileLink2(elm){
        var value = $("[name=apple_music_profile_link2]:checked").val();
        if(value == 1){
            $(".appleMusicProfileLink").show();
            $("#apple_music_link").attr('required',true);
        }
        else{
            $(".appleMusicProfileLink").hide();
            $("#apple_music_link").val('');
            $("#apple_music_link").attr('required',false);
            $("[name=edit_apple_music_link]").val('');
        }
   }

   $('#addNewArtist').on('submit', function(event){
        event.preventDefault();
        var role = $("#hiddenRole").val();
        var location = $("#location").val();
        $.ajax({
            url:"{{ route('user.addNewArtist') }}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(res)
            {
                clearFields();
                if(res.success == true){
                    notify('Artist Added','success');
                    $("#createAndNewArtistModal").modal('hide');
                    artistDetail(res.artist_id,role,location);
                }
            },
            error:function(res){
                notify('Something Went Wrong','error');
            }
        })
    });

    function updateArtist(elm) {
        var validate = true;
        var form = new FormData();

        var id = $("#editArtistID").val();
        var avatar = $("[name=editAvatar]").val();
        var name = $("[name=editName]").val();
        var spotifyLink = $("[name=edit_spotify_link]").val();
        var appleMusicLink = $("[name=edit_apple_music_link]").val();
        var spotifyCheck = $(".spotify_profile_link2:checked").val();
        var appleMusicCheck = $(".apple_music_profile_link2:checked").val();
        var type  = elm.attr('data-type');

        form.append('id', id);
        form.append('avatar', avatar);
        form.append('name', name);
        form.append('spotifyLink', spotifyLink);
        form.append('appleMusicLink', appleMusicLink);
        form.append('type',type);



        if(name == "") {
            notify('Name is required', 'error')
        }
        if(spotifyCheck == 1 && spotifyLink == ""){
            validate =  false;
            notify("Please add Spotify Profile link","error");
        }
        if(appleMusicCheck == 1 && appleMusicLink == ""){
            validate = false;
            notify("Please add Apple Music Profile link","error");
        }

      if (name != "" && validate == true) {

         $.ajax({
            type: "POST",
            url: "{{ route('user.updateArtist')}}",
            data: form,
            processData: false,
            contentType: false,
            headers: {
               'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            beforeSend: function(res){
            },
            success: function(res) {
                if(res.success == true){
                    notify('Artist Updated','success');
                    $("#artistContent_"+id).html(res.data);
                    $("#editArtistModal").modal('hide');
                }
            },
            error: function(res) {

            }
         });
      }
      else{
        notify("Please check the required fields","error");
      }
   }





    function addArtistDetail(elm){
        var artist_id = $("#userArtists").val();
        var role = $("#role").val();
        var artistType = elm.attr('data-artistType');
        var location = $("#location").val();
        // var artistType = $("#hiddenArtistType").val();
        if(artistType == 'main'){
            if(artist_id != "" ){
                artistDetail(artist_id,role,location);
            }
            else{
                notify('Please Select Artist','error');
            }
        }
        else if(artistType == 'other'){
            if(artist_id != "" && role != ""){
                artistDetail(artist_id,role,location);
            }
            else{
                notify('All fields are required','error');
            }
        }
    }

    function artistDetail(artist_id,role,location){
        $.ajax({
            type : "POST",
            url  : "{{ route('user.addArtistDetail') }}",
            data : {
                '_token' : "{{ csrf_token() }}",
                'artist_id' : artist_id,
                'role' : role,
                'location' : location,
            },
            success : function(res){
                clearFields();
                if(res.success == true){
                    if(res.type == 'main' && location == 'release'){
                        $("#mainArtistDetail").html(res.data);

                        $("#addMainPrimaryArtist").hide();
                        $("#addOtherKeyArtist").show();
                        $("#createAddArtistId").append('<input type="hidden" id="artistIds_'+res.artist_id+'" value="' + res.artist_id + '"  name="artist_id[]"><input type="hidden" id="artistRoles_'+res.artist_id+'" value="main primary"  name="artist_role[]">');
                    }
                    else if(res.type == 'other' && location == 'release'){
                        $("#otherArtistDetail").append(res.data);

                        $("#addMainPrimaryArtist").hide();
                        $("#addOtherKeyArtist").show();
                        $("#createAddArtistId").append('<input type="hidden" id="artistIds_'+res.artist_id+'" value="' + res.artist_id + '"  name="artist_id[]"><input type="hidden" id="artistRoles_'+res.artist_id+'" value="' + role + '"  name="artist_role[]">');
                    }
                    else if(res.type == 'main' && location == 'track'){
                        $("#mainArtistDetailTrack").append(res.data);

                        $("#addMainPrimaryArtistTrack").hide();
                        $("#addOtherKeyArtistTrack").show();
                        $("#createAddArtistIdTrack").append('<input type="hidden" id="trackArtistIds_'+res.artist_id+'" value="' + res.artist_id + '"  name="artist_id_track[]"><input type="hidden" id="trackArtistRoles_'+res.artist_id+'" value="main primary"  name="artist_role_track[]">');

                    }
                    else if(res.type == 'other' && location == 'track'){
                        $("#otherArtistDetailTrack").append(res.data);

                        $("#addMainPrimaryArtistTrack").hide();
                        $("#addOtherKeyArtistTrack").show();
                        $("#createAddArtistIdTrack").append('<input type="hidden" id="trackArtistIds_'+res.artist_id+'" value="' + res.artist_id + '"  name="artist_id_track[]"><input type="hidden" id="trackArtistRoles_'+res.artist_id+'" value="' + role + '"  name="artist_role_track[]">');

                    }
                    $("#mainArtistModal").modal('hide');



                }
            },
            error   : function(res){

            }
        });
    }

    function clearFields(){
        $('#role').val(null).trigger('change');
        $("#userArtists").val('');
        $("#newArtistAvatar").val('');
        $("#newArtistName").val('');
        $("#spotify_link").val('');
        $("#apple_music_link").val('');
        $('.profile-pic').attr('src','https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg');
        $(".file-upload-artist").empty('');
        // profile-pic
        // https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg
    }


    function editArtist(id,type){
        $.ajax({
            type : "GET",
            url  : "{{ route('user.editArtist') }}",
            data : {
                'id' : id,
                'type' : type,
            },
            success : function(res){
                if(res.success == true){
                    $("#editArtistDetail").html(res.data);
                }
            },
            error  : function(res){

            }
        });
        $("#editArtistModal").modal('show');
    }

    function deleteArtist(elm,type,id,location){
        // var location = $("#location").val();
        console.log('Type: '+type+' Id: '+id,' Locaiton: '+location);
        if(location == 'release'){
            var artistsIds = $("[name='artist_id[]']").map(function() {
                return $(this).val();
            }).get();
        }
        else if(location == 'track'){
            var artistsIds = $("[name='artist_id_track[]']").map(function() {
                return $(this).val();
            }).get();
        }

        if(location == 'release'){
            $("#artistIds_"+id).remove();
            $("#artistRoles_"+id).remove();
        }
        else if(location == 'track'){
            $("#trackArtistIds_"+id).remove();
            $("#trackArtistRoles_"+id).remove();
        }

        $.ajax({
            type : "GET",
            url  : "{{ route('user.deleteArtist') }}",
            data : {
              'id' : id,
              'type' : type,
              'artistIds' : artistsIds,
            },
            success : function(res){
                if(res.success == true){

                    var artistsIds = $("[name='artist_id[]']").map(function() {
                        return $(this).val();
                    }).get();
                    console.log(artistsIds);
                    if(type == 'main' && location == 'release'){
                        $("#addMainPrimaryArtist").show();
                        $("#addOtherKeyArtist").hide();
                        $("#mainArtistDetail #artistContent_"+id).remove();
                        $("#artist_"+id).remove();

                    }
                    else if(type == 'other' && location == 'release'){
                        $("#artist_"+id).remove();
                        $("#otherArtistDetail #artistContent_"+id).remove();
                        if(artistsIds == ""){
                            $("#addMainPrimaryArtist").show();
                            $("#addOtherKeyArtist").hide();
                        }
                        else{
                            $("#addMainPrimaryArtist").hide();
                            $("#addOtherKeyArtist").show();
                        }
                    }
                    else if(type == 'main' && location == 'track'){
                        $("#addMainPrimaryArtistTrack").show();
                        $("#addOtherKeyArtistTrack").hide();
                        $("#mainArtistDetailTrack #artistContent_"+id).remove();
                        // $("#artistIds_"+id).remove();
                    }
                    else if(type == 'other' && location == 'track'){
                        // $("#artistIds_"+id).remove();
                        $("#otherArtistDetailTrack #artistContent_"+id).remove();
                        if(artistsIds == ""){
                            $("#addMainPrimaryArtistTrack").show();
                            $("#addOtherKeyArtistTrack").hide();
                        }
                        else{
                            $("#addMainPrimaryArtistTrack").hide();
                            $("#addOtherKeyArtistTrack").show();
                        }
                    }
                }

            },
            error  : function(res){

            }
        })
    }

    $("#role").change(function(){
        $("#hiddenRole").val($(this).val());
    });


    function numToWords(n) {
        if (n < 0)
        return false;
        single_digit = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine']
        double_digit = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen']
        below_hundred = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety']
        if (n === 0) return 'Zero'
        function translate(n) {
            word = ""
            if (n < 10) {
                word = single_digit[n] + ' '
            }
            else if (n < 20) {
                word = double_digit[n - 10] + ' '
            }
            else if (n < 100) {
                rem = translate(n % 10)
                word = below_hundred[(n - n % 10) / 10 - 2] + ' ' + rem
            }
            else if (n < 1000) {
                word = single_digit[Math.trunc(n / 100)] + ' Hundred ' + translate(n % 100)
            }
            else if (n < 1000000) {
                word = translate(parseInt(n / 1000)).trim() + ' Thousand ' + translate(n % 1000)
            }
            else if (n < 1000000000) {
                word = translate(parseInt(n / 1000000)).trim() + ' Million ' + translate(n % 1000000)
            }
            else {
                word = translate(parseInt(n / 1000000000)).trim() + ' Billion ' + translate(n % 1000000000)
            }
            return word
        }
        result = translate(n)
        return result.trim()+'.'
    }


    document.addEventListener('DOMContentLoaded', function () {
        var sortableContainer = document.querySelector('.sortable-container');

        new Sortable(sortableContainer, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onStart: function (evt) {
                // var dataId = evt.item.dataset.id;
                // $("#track_"+dataId).attr('data-id',evt.newIndex);
            },
            onEnd: function (evt) {
                // console.log('Drag ended:', evt.item);
                // var dataId = evt.item.dataset.id;
                // $("#track_"+dataId).attr('data-id',evt.newIndex);
            },
            onUpdate: function (evt) {
                // console.log('Item updated:', evt.item);
                // console.log('New index:', evt.newIndex);
                // console.log('Old index:', evt.oldIndex);
                // var dataId = evt.item.dataset.id;
                // $("#track_"+dataId).attr('data-id',evt.newIndex);
            }
        });
    });


</script>
@endpush
