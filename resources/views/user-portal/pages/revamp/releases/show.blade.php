@extends('layouts.portal_revamp_scaffold')
@push('title') My Releases - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        <div class="mt-1">
            <div>
                <h2 class="user-name">
                    <span class="me-2"><a href="{{route('user.release.index')}}"><i class="fa-solid fa-arrow-left" style="color:#FFF301"></i></a></span> {{$release->album_title}} <span>(No. of Songs - {{count(json_decode($release->track_ids))}})</span>
                </h2>
            </div>

        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <p class="m-0">UPC CODE - <span>{{isset($release->upc_code) ? $release->upc_code : ''}}</span></p>
                        <p class="m-0">LABEL - <span>{{isset($release->label) ? $release->label : ''}}</span></p>
                        <p class="m-0">Version - <span>{{isset($release->version) ? $release->version : 'Original' }}</span></p>
                    </div>
                </div>

                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Previously Released</p>
                        </div>
                        <p><span class="text-uppercase">@if($release->is_previous_released == 1) {{ $release->previous_release_date }} @else No, It's a new release @endif</span></p>
                    </div>
                </div>

                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Artist</p>
                        </div>
                        @if(json_decode($release->artist))
                            @forelse (json_decode($release->artist) as $item)
                                @php
                                    $data['name'] = $item->name;
                                    $data['role'] = $item->type;
                                    $data['spotify_profile_link'] = '';
                                    $data['apple_music_profile_link'] = '';
                                    $html = view('user-portal.pages.revamp.royalty-splits.artist',compact('data'));
                                @endphp
                                {!! $html !!}
                            @empty
                            @endforelse
                        @endif

                        @if(json_decode($release->artist_ids))
                            @forelse (json_decode($release->artist_ids) as $ai)
                                {!!  getArtistRole($ai, date('Y-m-d',strtotime($release->created_at))) !!}
                            @empty
                            @endforelse
                        @endif
                    </div>
                </div>

                <div class="py-4 px-lg-4 px-2">
                    <div class="release-data">
                        <p>Release Date - <span class="text-uppercase">{{getDateFormat($release->release_date)}}</span></p>
                        <p>Album Artwork</p>
                        <div class="release-cart">
                            <img src="{{asset(config('upload_path.album_artwork').$release->album_artwork)}}" width="270" alt="" class="d-block img-fluid">
                        </div>
                        <div class="release-data mt-3">
                            <p class="m-0">Primary Language - <span> {{$release->language}}</span></p>
                            <p class="m-0">Primary Genre - <span>{{$release->primary_genre}}</span></p>
                            <p class="m-0">Secondary Genre - <span>{{$release->secondary_genre}}</span></p>
                            @if(!empty($release->catalog_id))
                                <p class="m-0">Catalog ID - <span>{{$release->catalog_id}}</span></p>
                            @endif
                            @if(!empty($release->p_copyright_year))
                                <p class="m-0">&#8471; Copyright - <span>{{$release->p_copyright_year}} | {{$release->p_copyright_name }}</span></p>
                            @endif
                            @if(!empty($release->c_copyright_year))
                            <p class="m-0">&#8471; Copyright - <span>{{$release->c_copyright_year}} | {{$release->c_copyright_name }}</span></p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="" class="form-label">Stores</label>
                            <div class="stories mt-1 border p-3 pb-0">
                                @if(json_decode($release->stores))
                                    @forelse (json_decode($release->stores) as $store)
                                        @php $validate =  validateStoreStatus($store) @endphp
                                        @if($validate != false)
                                            <span n class="mx-2 mb-3 d-inline-block"><a href="javascript:;"><img src="{{ asset('assets/icons/'.str_replace(' ','-',strtolower($store)).'.png')}}" width="45" height="45" alt=""></a></span>
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        @forelse (getTracks($release->track_ids) as $index=>$track)
            <div class="card mt-4">
                <div class="card-body p-0">
                    <div class="py-4 px-lg-4 px-2 border-bottom">
                        <p class="tab-title mt-0 mb-2">{{++$index}}. {{$track->title}} @if(isset($track->track_version)) ({{ $track->track_version  }}) @endif</p>
                        <div class="release-data">
                            <p class="m-0">ISRC CODE - <span>{{isset($track->isrc_code) ? $track->isrc_code : ''}}</span></p>
                        </div>
                    </div>

                    <div class="py-4 px-lg-4 px-2 border-bottom">
                        <div class="release-data">
                            <div class="col-12">
                                <p class="tab-title mt-0 mb-2">Artist</p>
                            </div>

                            @if(count(json_decode($track->artist)) > 0)
                                @forelse (json_decode($track->artist) as $item)
                                    @php
                                        $data['name'] = $item->name;
                                        $data['role'] = $item->type;
                                        $data['spotify_profile_link'] = isset($item->spotify) ? $item->spotify : null;
                                        $data['apple_music_profile_link'] = isset($item->apple) ? $item->apple : null;
                                        $html = view('user-portal.pages.revamp.royalty-splits.artist',compact('data'));
                                    @endphp
                                    {!! $html !!}
                                @empty

                                @endforelse
                            @endif

                            @if(isset($track->artist_ids))
                                @forelse(explode(",",str_replace('"','',$track->artist_ids)) as $aii)
                                    {!!  getArtistRole($aii, date('Y-m-d',strtotime($release->created_at))) !!}
                                @empty
                                @endforelse
                            @endif

                        </div>
                    </div>

                    <div class="py-4 px-lg-4 px-2 border-bottom">
                        <div class="release-data">
                            <div class="release-data mt-3">
                                @if($track->contains_1 == 'Contain Vocals')
                                <p class="m-0">Contain Vocals - <span>My Song contain lyrics and vocals</span></p>
                                @elseif($track->contains_1 == 'Instrumental')
                                <p class="m-0">Instrumental - <span>My Song contains no lyrics and vocals</span></p>
                                @endif

                                @if($track->contains_2 == "Clean")
                                    <p class="m-0">Clean - <span>My Song doesn't contain any profanity (Includes title & artwork)</span></p>
                                @elseif($track->contains_2 == "Explicit")
                                    <p class="m-0">Explicit - <span>My Song contain any profanity (Includes title & artwork)</span></p>
                                @elseif($track->contains_2 == "Radio Edit")
                                    <p class="m-0">Radio Edit - <span>The track is clean/censored, but have a explict version.</span></p>
                                @endif

                                <p class="m-0">Language - <span>{{$track->language}}</span></p>


                                @if(!empty($track->p_copyright_year))
                                    <p class="m-0">&#8471; Copyright - <span>{{$track->p_copyright_year}} | {{$track->p_copyright_name }}</span></p>
                                @endif

                            </div>

                        </div>
                    </div>

                    <div class="py-4 px-lg-4 px-2 border-bottom">
                        <div class="release-data">
                            <div class="col-12">
                                <p class="tab-title mt-0 mb-2">Songwriters</p>
                            </div>

                            @if(json_decode($track->songwriter) >0)
                                @forelse (json_decode($track->songwriter) as $item)
                                    <p><span class="text-uppercase">{{ucwords($item->type)}} - {{$item->name}}</span></p>
                                @empty
                                @endforelse
                            @endif

                        </div>
                    </div>

                    <div class="py-4 px-lg-4 px-2  border-bottom">
                        <div class="release-data">
                            <div class="release-data mt-3">
                                <p class="tab-title mt-0 mb-2">Audio</p>
                                <p class="m-0">Audio File - {{$track->title}}</p>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div id="showAudio_{{$track->id}}">
                                            <a href="javascript:;"><button type="button" class="btn btn-primary rounded" onClick="playAudio('{{$track->id}}')">Play Audio <i class="ms-2 fa-solid fa-play"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-4 px-lg-4 px-2  ">
                        <div class="release-data">
                            <div class="release-data mt-3">
                                <p class="tab-title mt-0 mb-2">Lyrics</p>
                                <p class="m-0">Lyrics - {{$track->title}}</p>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    @if($track->lyrics) ? {!! $track->lyrics !!} @else - @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @empty
        @endforelse
    </div>


</div>
@endsection
@push('scripts')
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
