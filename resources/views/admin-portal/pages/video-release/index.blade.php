@extends('layouts.admin_scaffold')
@push('title')
Releases -
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Release Request</h4>

                <div class="table-responsive" >
                  <table class="table dataTables_wrapper dt-bootstrap4 no-footer"  id="table">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Full name </th>
                        <th> Email </th>
                        <th> Album Title </th>
                        <th> Release Date </th>
                        <th> Request Date </th>
                        <th>Status</th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($releases as $index=>$item)
                        <tr>
                            <td>{{++$index}} </td>
                            <td>{{isset($item->user) ? $item->user->name : '-'}}</td>
                            <td>{{isset($item->user) ? $item->user->email : '-'}}</td>
                            <td>{{$item->video_title}}</td>
                            <td>{{getDateFormat($item->release_date)}}</td>
                            <td>{{getDateFormat($item->created_at)}}</td>
                            <td>
                                {!! status($item->status) !!}
                            </td>
                            <td class=" align-items-center">
                            <button class="btn btn-outline-primary p-1 m-1" onclick='window.location.href="{{route('admin.video-release.show', $item->id)}}"' ><i class="fa fa-eye"></i></button>&nbsp;
                            <a class="btn btn-outline-danger p-1 m-1"  href="{{route('admin.deleteVideoRelease', $item->id)}}" onclick='return confirm("Are you sure?")'  ><i class="fa fa-trash"></i></a>&nbsp;
                            </td>
                        </tr>
                      @empty

                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

  <div class="modal fade" id="streamModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title releaseDetail"></h5>

        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" id="userIDStreams">
                    <input type="hidden" id="releaseIDStreams">
                    <label for="">Add Streams</label>
                    <input type="text" class="form-control" id="addStreams" >
                </div>
                <div class="col-md-12">
                    <div class="float-right mt-3">
                        <button class="btn btn-danger" onClick="cancelModal('streamModal')">CANCEL</button>
                        <button class="btn btn-success" onClick="storeStreams($(this))">ADD</button>
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
$(document).ready(function () {
    $('#table').DataTable();

});
function addStreams(id,elm,user_id){
    var track = elm.attr('data-track');
    var artist = elm.attr('data-artist');

    $("#userIDStreams").val(user_id);
    $("#releaseIDStreams").val(id);

    $(".releaseDetail").html(track+' - '+artist);
    $("#streamModal").modal('show');
}
function cancelModal(value){
    $("#"+value).modal('hide');
}
function storeStreams(elm){
    var streams = $("#addStreams").val();
    var user_id = $("#userIDStreams").val();
    var release_id = $("#releaseIDStreams").val();

    if(streams != ""){
        $.ajax({
            type : "GET",
            url : "{{route('admin.addStreams')}}",
            data : {
                'streams' : streams,
                'user_id' : user_id,
                'release_id' : release_id,
            },
            beforeSend : function(res){
                $('.loader').show();
            },
            success : function(res){
                $('.loader').hide();
                if(res.success == true){
                    notify('Streams added','success');
                    $("#streamModal").modal('hide');
                    $("#addStreams").val('');
                    $("#userIDStreams").val('');
                    $("#releaseIDStreams").val('');
                }
                else{
                    $("#addStreams").val('');
                    notify('Something Went Wrong','danger');
                }
            },
            error : function(res){
                $('.loader').hide();
                notify('Something Went Wrong','danger');
            }
        });
    }
    else{
        notify('Please add streams','danger');
    }
}
</script>
@endpush
