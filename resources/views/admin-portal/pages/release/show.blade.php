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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h1 mb-4 mt-2 d-inline-block mr-3"><a href="{{route('admin.release.index')}}"><i class="mdi mdi-keyboard-return"></i></a>{{$release->album_title}} <small class="user"
                    style="color: #fbda03;">(No. of Songs - {{count(json_decode($release->track_ids))}})</small></h1>

        </div>
        <div class="col-12">
            <p class="mb-2">UPC CODE  - {{$release->upc_code}}&nbsp;<a href="javascript:;" onClick="updateRelease($(this),{{ $release->id }})"><i class="fa fa-edit" style="color:#fbda03"></i></a></p>
            <p class="mb-2">LABEL - {{isset($release->label) ? $release->label : ''}}</p>
            <p class="mb-2">Version?  - {{$release->version}}</p>
            <hr class="hr-releases">
            <p class="mb-2 mt-2" style="color: #fbda03;">Previous Released</p>
            <p><span class="mb-2">@if($release->is_previous_released == 1) {{ $release->previous_release_date }} @else No, It's a new release @endif</span></p>

             <hr class="hr-releases">
            <p class="mb-2 mt-2" style="color: #fbda03;">Artist</p>
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
             <hr class="hr-releases">
              <p class="mb-2 mt-2">Release Date?  -  {{getDateFormat($release->release_date)}}</p>
              <p class="mb-2 mt-2">Album Artwork</p>
              <div class="row w-100 mb-2">
                <div class="col-8 col-md-3 col-lg-2">
                     <img src="{{asset(config('upload_path.album_artwork').$release->album_artwork)}}" class="card-img-top" alt="...">
                </div>
              </div>
              <p class="mb-2">Primary Language  - {{$release->language}}</p>
              <p class="mb-2">Primary Genre  - {{$release->primary_genre}}</p>
              @isset($release->secondary_genre)
              <p class="mb-2">Secondary Genre  - {{$release->secondary_genre}}</p>
              @endif
              @if(!empty($release->catalog_id))
                <p class="mb-2">Catalog ID - {{$release->catalog_id}}</p>
              @endif
              @if(!empty($release->p_copyright_year))
                    <p class="m-0">&#8471; Copyright - <span>{{$release->p_copyright_year}} | {{$release->p_copyright_name }}</span></p>
                @endif
                @if(!empty($release->c_copyright_year))
                <p class="m-0">&#8471; Copyright - <span>{{$release->c_copyright_year}} | {{$release->c_copyright_name }}</span></p>
                @endif
              <p class="mb-2">
                <span class="badge bg-default" style="background:#fbda03 !important;"><a href="{{route('admin.release.albumArtWork',$release->album_artwork)}}" style="color:black;text-decoration:none">Download Art work</a></span>
              </p>
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
    @include('admin-portal.pages.release.tracks')
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


  <div id="updateReleaseModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.updateRelease',$release->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Update UPC CODE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModal($(this))">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="upcCode">
                            <label for="">UPC CODE</label>
                            <input type="text" id="upc_code" name="upc_code" class="form-control" value="{{ $release->upc_code }}">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #fbda03; color: black; border-color: #fbda03;">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>


  <div id="updateTrackModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.updateTrack') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Update ISRC CODE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModal($(this))">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="upcCode">
                            <label for="">ISRC CODE</label>
                            <input type="hidden" id="track_id" name="track_id" class="form-control" >
                            <input type="text" id="isrc_code" name="isrc_code" class="form-control" value="{{ $release->upc_code }}">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #fbda03; color: black; border-color: #fbda03;">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>




@endsection
@push('scripts')
    <script>
        function playAudio(id){
            $.ajax({
                type : "GET",
                url  : "{{route('admin.playTrack')}}",
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
                url  : "{{url('admin/release-status/')}}"+"/"+id+"/"+status,
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
        function updateRelease(elm,id){
            $("#updateReleaseModal").modal('show');
        }
        function closeModal(elm){
            $(".modal").modal('hide');
        }
        function updateTrack(elm,isrc_code,id){
            $("#isrc_code").val(isrc_code);
            var track_id = $("#track_id").val(id);
            $("#updateTrackModal").modal('show');
        }
    </script>
@endpush
