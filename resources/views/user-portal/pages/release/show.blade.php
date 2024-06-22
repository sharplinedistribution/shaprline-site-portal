@extends('layouts.user_scaffold')
@push('title')
View Release -
@endpush
@push('styles')
<style>
    audio {
        width: 100%;
    }

    audio::-webkit-media-controls-panel {
        background-color: #fbda03 !important;
    }
</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h1 mb-4 mt-2 d-inline-block mr-3"><a href="{{route('user.release.index')}}"><i class="mdi mdi-keyboard-return"></i></a>{{$release->album_title}} <small class="user" style="color: #fbda03;">(No. of Songs - {{count(json_decode($release->track_ids))}})</small></h1>
            {{--  <a href="{{route('user.release.edit',$release->id)}}" class="btn btn-sm" style="background-color: #fbda03; color: #333;">Edit Details</a>  --}}

        </div>
        <div class="col-12">
            <p class="mb-2">UPC CODE - {{isset($release->upc_code) ? $release->upc_code : ''}}</p>
            <p class="mb-2">LABEL - {{isset($release->label) ? $release->label : ''}}</p>
            <p class="mb-2">Version - {{isset($release->version) ? $release->version : 'Original' }}</p>
            <hr class="hr-releases">
            <p class="mb-2 mt-2" style="color: #fbda03;">Artist</p>
            @if(json_decode($release->artist))
            @forelse (json_decode($release->artist) as $item)
            <p class="mb-2">{{ucwords($item->type)}} - {{$item->name}}</p>
            @empty

            @endforelse
            @endif
            <hr class="hr-releases">
            <p class="mb-2 mt-2">Release Date? - {{getDateFormat($release->release_date)}}</p>
            <p class="mb-2 mt-2">Album Artwork</p>
            <div class="row w-100 mb-2">
                <div class="col-8 col-md-3 col-lg-2">
                    <img src="{{asset(config('upload_path.album_artwork').$release->album_artwork)}}" class="card-img-top" alt="...">
                </div>
            </div>
            <p class="mb-2">Primary Language - {{$release->language}}</p>
            <p class="mb-2">Primary Genre - {{$release->primary_genre}}</p>
            @isset($release->secondary_genre)
            <p class="mb-2">Secondary Genre - {{$release->secondary_genre}}</p>
            @endif
            <p class="mb-2">Stores</p>
            <div class="stores_data p-3 mb-2" style="background-color: #1f2022;">
                @if(json_decode($release->stores))
                @forelse (json_decode($release->stores) as $store)
                <span>{{$store}}</span>
                @empty
                @endforelse
                @endif

            </div>


        </div>
    </div>

    @forelse (getTracks($release->track_ids) as $index=>$track)
    <div class="row bg-dark p-4">
        <div class="col-lg-12 mt-4">
            <div class="frequentlyQsts">
                <h2 style="color: #fbda03;">{{++$index}}. {{$track->title}} - {{getFirstArtist($track->artist)}}</h2>

            </div>
        </div>
        <div class="col-12">
            <p class="mb-2">ISRC CODE - {{isset($track->isrc_code) ? $track->isrc_code : ''}}</p>
            <hr class="hr-releases">
            <p class="mb-2 mt-2" style="color: #fbda03;">Artist</p>
            @if(json_decode($track->artist))
            @forelse (json_decode($track->artist) as $item)
            <p class="mb-2">
                <small style="color:yellow">{{ucwords($item->type)}}</small><br> {{$item->name}}<br>
                <small style="color:yellow">Spotify Link</small><br>{!! !empty($item->spotify) ? '<a href="'.$item->spotify.'">'.$item->spotify.'</a>' : '<i class="text-white">-</i>' !!}<br>
                <small style="color:yellow">Apple Music Link</small><br>{!! !empty($item->apple) ? '<a href="'.$item->apple.'">'.$item->apple.'</a>' : '<i class="text-white">-</i>' !!}<br>

            </p>
            <hr style="border-top: 1px solid yellow ">
            @empty

            @endforelse
            @endif
            <hr class="hr-releases">
            @if($track->contains_1 == 'Contain Vocals')
                <p class="mb-2 mt-2">Contain Vocals - My Song contains lyrics and vocals    </p>
            @elseif($track->contains_1 == 'Instrumental')
                <p class="mb-2 mt-2">Instrumental - My Song contains no lyrics and vocals</p>
            @endif

            @if($track->contains_2 == "Clean")
                <p class="mb-2 mt-2">Clean - My Song doesn't contain any profanity (Includes title & artwork)</p>
            @elseif($track->contains_2 == "Explicit")
                <p class="mb-2 mt-2">Explicit - My Song contain any profanity (Includes title & artwork)</p>
            @elseif($track->contains_2 == "Radio Edit")
                <p   class="mb-2 mt-2">Radio Edit - The track is clean/censored, but have a explict version.</p>
            @endif
            <p class="mb-2"> Language - {{$track->language}}</p>
            <hr class="hr-releases">
            <p class="mb-2 mt-2" style="color: #fbda03;">Songwriters</p>
            @if(json_decode($track->songwriter) >0)
            @forelse (json_decode($track->songwriter) as $item)
            <p class="mb-2">{{ucwords($item->type)}} - {{$item->name}}</p>
            @empty
            @endforelse
            @endif
            <hr class="hr-releases">
            <p class="mb-2 mt-2"> Audio File - {{$track->title}}</p>
            <div id="showAudio_{{$track->id}}">
                    <span class="badge bg-warning" style="background:#fbda03 !important; color:black !important;"><a href="javascript:;" style=" text-decoration: none; color: black;" onClick="playAudio('{{$track->id}}')"><i class="fa fa-play"></i>Play Audio</a></span>
            </div>

        </div>
    </div>
    @empty

    @endforelse
    <!-- Music Plateforms -->
    <!-- partial -->
</div>
@endsection
@push('scripts')
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

    <script>
        function playAudio(id){
                $.ajax({
                    type : "GET",
                    url  : "{{route('user.playTrack')}}",
                    data : {
                        'id' : id,
                    },
                    beforeSend: function(res){
                        $('.loader').show();
                    },
                    success : function(res){
                        $('.loader').hide();
                        if(res.success == true){
                            $("#showAudio_"+id).html(res.data);
                        }
                        else{
                            notify('Something Went Wrong','error');
                        }
                    },
                    error : function(res){
                        $('.loader').hide();
                    }
                });
            }
    </script>
@endpush
