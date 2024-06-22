@extends('layouts.admin_scaffold')
@push('title')
    View Release -
@endpush
@push('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <style>
        audio{
            width: 100%;
        }
        audio::-webkit-media-controls-panel{
            background-color:#fbda03 !important;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row mt-2 px-lg-4">
        <div class="col-12">
            <div class="mt-1">
                <div>
                    <h2 class="user-name">
                        <span class="me-2"><a href="{{route('admin.video-release.index')}}"><-</a></span> {{$release->video_title}}
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
                            <div class="">
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
                            <div class="">
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
                            <p class="mb-2">
                                <span class="badge bg-default" style="background:#fbda03 !important;"><a href="{{ route('admin.release.VideoalbumArtWork',$release->video_thumbnail) }}" style="color:black;text-decoration:none">Download Video Thumbnail</a></span>
                              </p>
                            <div class="col-12">
                                <img src="{{asset(config('upload_path.video_thumbnail').$release->video_thumbnail)}}" style="height:300px; width:600px;">
                            </div>

                        </div>


                        <div class="release-data mt-3">
                            <div class="col-12">
                                <p class="tab-title mt-0 mb-2">Video Track</p>
                            </div>
                            <p class="mb-2">
                                <span class="badge bg-default" style="background:#fbda03 !important;"><a href="{{ route('admin.release.VideodownloadTrack',$release->video_track) }}" style="color:black;text-decoration:none">Download Video </a></span>
                              </p>
                            <div class="col-12">
                                <video src="{{route('user.release.videoTrackPath',$release->video_track)}}"   id="audio_1" type="video/mp4" width="auto" height="auto" controls style="background:rgb(255 243 1); width:100%">>
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                        </div>
                        <div class="release-data mt-3">
                            <div class="col-12">
                                <p class="tab-title mt-0 mb-2">Video Description</p>
                            </div>
                            <p class="mb-2">
                                {{ $release->video_description }}
                              </p>


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

    <div class="mt-4">
        <button type="button" class="btn btn-success" onClick="changeStatus({{$release->id}},1)">Accept</button> &nbsp;&nbsp; <button type="button" class="btn btn-danger" onClick="changeStatus({{$release->id}},2)">Reject</button>
        @if($release->status == 3)
       <br><button type="button" class="btn btn-warning mt-3" onClick="changeStatus({{$release->id}},4)">Takedown Request</button>
        <br>Reason : {{ $release->takedown_reason }}
        @endif
        @if($release->status == 4)
       <br><button type="button" class="btn btn-danger mt-3" disabled>Takedown Request Confirmed</button>
        @endif
    </div>
    <div class="mt-4">
        @if($release->status == 1 || $release->status == 2)
        <p class="mb-0 text-success" @if($release->status == 1) @else style="display:none"@endif>   Accepted - {{getDateFormat($release->approved_at)}}</p>
        <p class="mb-0 text-danger" @if($release->status == 2) @else style="display:none"@endif>Rejected - {{getDateFormat($release->approved_at)}}</p>
        <small class="text-white">Comment : {{$release->rejection_comments}}</small>

        @else
        <p class="mb-0 text-success"  style="display:none">   Accepted - {{getDateFormat($release->approved_at)}}</p>
        <p class="mb-0 text-danger"   style="display:none" >Rejected - {{getDateFormat($release->approved_at)}}</p>
        @endif
    </div>
    <!-- Music Plateforms -->
    <!-- partial -->
</div>

<div class="modal fade" id="rejectionComments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rejection Comments</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="">Comment</label>
          <input type="hidden" id="releaseID">
          <textarea name=""  cols="30" rows="10" class="form-control text-white" class="color:white;" id="rejectionComment"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onClick="closeModal($(this))">Close</button>
          <button type="button" class="btn btn-danger" onClick="rejectionComment($(this))">Reject</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="acceptanceComments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Comments</h5>

        </div>
        <div class="modal-body">
          <label for="">Comment</label>
          <input type="hidden" id="releaseID">
          <textarea name=""  cols="30" rows="10" class="form-control text-white" class="color:white;" id="acceptanceComment"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onClick="acceptanceComment($(this))">Accept</button>
        </div>
      </div>
    </div>
  </div>


@endsection
@push('scripts')
    <script>

        function changeStatus(id,status){
            var conf = confirm('Are you sure?');
            if(conf == true){
                if(status == 2){
                    $("#releaseID").val(id);
                    $("#rejectionComments").modal('show');
                    }
                else if(status == 1){
                    $("#releaseID").val(id);
                    $("#acceptanceComments").modal('show');
                    // changeStatusAjax(id,status,null);
                }
                else if(status == 4){
                    $("#releaseID").val(id);
                    changeStatusAjax(id,status,null);
                }
            }
            else{

            }
        }
        function rejectionComment(elm){
            var id = $("#releaseID").val();
            var comment = $("#rejectionComment").val();
            var status = 2;
            if(comment != ""){
                changeStatusAjax(id,status,comment);
            }
            else{
                notify('Comment is required','error');
            }
        }
        function acceptanceComment(elm){
            var id = $("#releaseID").val();
            var comment = $("#acceptanceComment").val();
            var status = 1;
            if(comment != ""){
                changeStatusAjax(id,status,comment);
            }
            else{
                notify('Comment is required','error');
            }
        }
        function changeStatusAjax(id,status,comment){
            var comment = comment;
            $.ajax({
                type : "POST",
                url  : "{{url('admin/video-release-status/')}}"+"/"+id+"/"+status,
                data : {
                    '_token' : "{{csrf_token()}}",
                    'comment' : comment,
                },
                beforeSend : function(res){
                    $('.loader').show();
                },
                success : function(res){
                    $('.loader').hide();
                    if(res.success == true){
                        if(res.status == 1){
                            $("#acceptanceComments").modal('hide');
                            $('.text-danger').hide();
                            $('.text-success').show().html('Approved - '+res.date);
                            notify(res.msg, 'success');
                            location.reload();
                        }
                        else if(res.status == 2){
                            $("#rejectionComments").modal('hide');
                            $('.text-success').hide();
                            $('.text-danger').show().html('Rejected - '+res.date);
                            notify(res.msg, 'danger');
                            location.reload();
                        }
                        else if(res.status == 3){
                            $('.text-danger').show().html('Takedown Request Confirmed - '+res.date);
                            notify(res.msg, 'danger');
                            location.reload();
                        }
                    }
                    else{
                        notify('Something Went Wrong', 'danger');
                    }
                },
                error : function(res){
                    $('.loader').hide();
                    notify('Something Went Wrong', 'danger');
                }
            });
        }
        function closeModal(){
            $("#rejectionComments").modal('hide');
        }
    </script>
@endpush
