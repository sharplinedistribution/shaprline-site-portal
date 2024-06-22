@extends('layouts.admin_scaffold')
@push('title')
- Video Takedown Requests
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Video Takedown Requests</h4>

                <div class="table-responsive" >
                  <table class="table dataTables_wrapper dt-bootstrap4 no-footer"  id="table">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Full name </th>
                        <th> Email </th>
                        <th> Video Title </th>
                        <th> Release Date </th>
                        <th> Request Date </th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($releases as $index=>$item)
                        <tr id="row_{{ $item->id }}">
                            <td>{{++$index}} </td>
                            <td>{{isset($item->user) ? $item->user->name : '-'}}</td>
                            <td>{{isset($item->user) ? $item->user->email : '-'}}</td>
                            <td>{{$item->video_title}}</td>
                            <td>{{getDateFormat($item->release_date)}}</td>
                            <td>{{getDateFormat($item->created_at)}}</td>
                            <td>{{ $item->takedown_reason }}</td>
                            <td>
                                {!! status($item->status) !!}
                            </td>
                            <td class=" align-items-center">
                            <a class="btn btn-outline-danger"  href="javascript:;" onclick='changeStatus("{{ $item->id }}",$(this))'  ><i class="fa fa-chevron-circle-down"></i></a>
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

function changeStatus(id,elm){
    var conf = confirm("Do you want to takedown this track?");
    if(conf == true){
        $.ajax({
            type : "GET",
            url  : "{{ route('admin.Videotakedown.status') }}",
            data  : {
                'id' : id,
            },
            success : function(res){
                if(res.success == true){
                    $.notify('Status Changed','success');
                    $("#row_"+id).remove();
                }
            },
            error : function(res){

            }
        });
    }
    else{
    }
}
</script>
@endpush
