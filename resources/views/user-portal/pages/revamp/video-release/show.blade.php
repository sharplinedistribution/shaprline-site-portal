@extends('layouts.portal_revamp_scaffold')
@push('title') My Video - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        <div class="mt-1">
            <div>
                <h2 class="user-name">
                    <span class="me-2"><a href="{{route('user.video-release.index')}}"><i class="fa-solid fa-arrow-left" style="color:#FFF301"></i></a></span> {{$release->video_title}}
                </h2>
            </div>

        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="py-4 px-lg-4 px-2 border-bottom">
                <div class="release-data mt-1">
                    <p>Release Date - <span class="text-uppercase">{{getDateFormat($release->release_date)}}</span></p>

                </div>
            </div>
                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Artist</p>
                        </div>
                        @if(json_decode($release->artist))
                        @forelse (json_decode($release->artist) as $item)
                            <p><span class="text-uppercase">{{ucwords($item->type)}} - {{$item->name}}</span></p>
                        @empty
                        @endforelse
                        @endif
                    </div>
                </div>



                <div class="py-4 px-lg-4 px-2 border-bottom">
                        <div class="release-data mt-1">
                            <p class="m-0 mt-2">Primary Language - <span> {{$release->language}}</span></p>
                            <p class="m-0 mt-2">Primary Genre - <span>{{$release->primary_genre}}</span></p>
                            <p class="m-0 mt-2">Secondary Genre - <span>{{$release->secondary_genre}}</span></p>
                            <p class="m-0 mt-2">Label & Coptyright - <span>{{isset($release->label) ? $release->label : ''}}</span></p>
                            <p class="m-0 mt-2">UPC CODE - <span>{{isset($release->upc_code) ? $release->upc_code : ''}}</span></p>
                            <p class="m-0 mt-2">ISRC CODE - <span>{{isset($release->upc_code) ? $release->upc_code : ''}}</span></p>
                            <p class="m-0 mt-2">Vevo Link - <span>{{isset($release->vevo_link) ? $release->vevo_link : ''}}</span></p>
                            <p class="m-0 mt-2">Video Made for Kids? - <span>{{isset($release->is_video_made_for_kids) ? ucwords($release->is_video_made_for_kids) : ''}}</span></p>
                            <p class="m-0 mt-2">YouTube Link - <span>{{isset($release->youtube_link) ? $release->youtube_link : ''}}</span></p>



                        </div>


                </div>


                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Songwriters</p>
                        </div>
                        @if(json_decode($release->songwriter))
                        @forelse (json_decode($release->songwriter) as $item)
                            <p><span class="text-uppercase">{{ucwords($item->type)}} - {{$item->name}}</span></p>
                        @empty
                        @endforelse
                        @endif
                    </div>
                </div>


                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Video Thumbnail</p>
                        </div>
                        <div class="col-12">
                            <img src="{{asset(config('upload_path.video_thumbnail').$release->video_thumbnail)}}" style="height:300px; width:600px;">
                        </div>

                    </div>


                    <div class="release-data mt-3">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Video Track</p>
                        </div>
                        <div class="col-12">
                            <video src="{{route('user.release.videoTrackPath',$release->video_track)}}"   id="audio_1" type="video/mp4" width="auto" height="auto" controls style="background:rgb(255 243 1); width:100%">>
                                Your browser does not support the video tag.
                            </video>
                        </div>

                    </div>


                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Video Description</p>
                        </div>
                        <div class="col-12">
                            {{$release->video_description}}
                        </div>

                    </div>

                </div>

                <div class="py-4 px-lg-4 px-2 border-bottom">
                    <div class="release-data">
                        <div class="col-12">
                            <p class="tab-title mt-0 mb-2">Lyrics</p>
                        </div>
                        <div class="col-12">
                            {!!  $release->lyrics !!}
                        </div>

                    </div>

                </div>

            </div>
        </div>


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
