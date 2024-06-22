@extends('layouts.portal_revamp_scaffold')
@push('title') My Videos - @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
<style>
    .btn-primary {
    padding: 7px 7px;
    }
    .modal-content {
    background-color: #151515;
    color: white;
    }
    .release-card img{
        border : none !important;
    }
</style>
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body py-4 px-lg-4 px-2">
                <p>My Videos</p>

                <div class="row mt-3">
                    @forelse ($videoReleases as $item)
                    <div class="col-lg-6 col-md-6 mb-3">
                        <a href="{{route('user.video-release.show', $item->id)}}">
                            <div class="release-card">
                                <img src="{{asset(config('upload_path.video_thumbnail').$item->video_thumbnail)}}"  class="d-block w-100" alt="">

                                <h5 class="mt-4">{{strtoupper($item->video_title)}}</h5>
                                <span class="d-block">{{isset($item->user) ? $item->user->name : '-'}}</span>


                                @if($item->status == 1)
                                <p class=" mb-0">Accepted - {{getDateFormat($item->approved_at)}}</p>
                                <span class="" style="text-transform:none">{{ $item->rejection_comments}}</span>
                                @elseif($item->status == 2)
                                <p class=" mb-0 text-danger">Rejected - {{getDateFormat($item->approved_at)}}</p>
                                <span class="" style="text-transform:none">{{ $item->rejection_comments}}</span>
                                @elseif($item->status == 3)
                                <p class=" mb-0 text-warning">TD Request Sent - {{getDateFormat($item->updated_at)}}</p>
                                <span class="" style="text-transform:none">{{ $item->takedown_reason}}</span>
                                @elseif($item->status == 4)
                                <p class=" mb-0 text-danger">TD Request Confirmed - {{getDateFormat($item->updated_at)}}</p>
                                @else
                                <p class=" mb-0">Pending</p>
                                @endif
                            </div>
                        </a>
                        <div class="row">
                            <div class="col-6 ">
                                @if($item->status == 0)
                                    <a href="{{ route('user.video-release.edit',$item->id) }}"><button class=" btn btn-primary rounded" style="background-color: var(--primary); color: black; border : 1px solid var(--primary); font-size:10px; margin-top:10px;">Edit Release</button></a>
                                @else
                                    <button class=" btn btn-primary rounded" style="background-color: var(--primary); color: black; border : 1px solid var(--primary); font-size:10px; margin-top:10px;" disabled>Edit Release</button>
                                @endif
                            </div>

                            <div class="col-6 " style="">
                                @if($item->status == 3)
                                    <button type="button" class=" btn btn-primary rounded" style="float:right; background-color: var(--primary); color: black; border : 1px solid var(--primary); font-size:10px; margin-top:10px;" disabled>TD Request Sent</button>
                                @elseif($item->status == 4)
                                    <button type="button" class=" btn btn-primary rounded" style="float:right; background-color: var(--primary); color: black; border : 1px solid var(--primary); font-size:10px; margin-top:10px;" disabled>Request Confirmed</button>
                                @else
                                    <button type="button" class=" btn btn-primary rounded" onClick="requestTakedown('{{ $item->id }}',$(this))" style="float:right; font-size:10px; margin-top:10px;">Request Takedown</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        {{$videoReleases->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="modal fade" id="requestTakeDown" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h5 class="text-center">Reason For Taking Down This Release</h5>
          <label>Reason</label>
          <input type="hidden" name="release_id" id="release_id">
          <textarea class="form-control" name="reason" id="reason" style="height:70px"></textarea>
          <center>
              <button type="button" id="addReason" class="btn btn-primary btn-block rounded mt-3" style="padding: 12px; 12px;" onClick="addReason($(this))">ADD REASON</button>
          </center>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
        function requestTakedown(id,elm){
            $("#release_id").val(id);
            $("#requestTakeDown").modal('show');
        }
        function addReason(elm){
            var release_id = $("#release_id").val();
            var reason = $("#reason").val();
            if(reason != ""){
                $.ajax({
                    type : "POST",
                    url  : "{{ route('user.takedownVideo') }}",
                    data : {
                        '_token' : "{{ csrf_token() }}",
                        release_id : release_id,
                        reason     : reason,
                    },
                    beforeSend : function(res){
                        var html = '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>';
                        $("#addReason").html(html);
                    },
                    success : function(res){
                        $("#addReason").html('ADD REASON');
                        if(res.success == true){
                            $.notify("Please wait you will respond shortly",'success');
                            $("#requestTakeDown").modal('hide');
                        }
                        else{
                            $.notify("Something Went Wrong",'error');
                        }
                        location.reload();
                    },
                    error  : function(res){
                        $("#addReason").html('ADD REASON');
                        $.notify("Something Went Wrong",'error');
                    }
                });
            }
            else{
                $.notify('Reason is required','error');
            }
        }
    </script>
@endpush
