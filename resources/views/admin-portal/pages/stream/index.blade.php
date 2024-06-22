@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@push('styles')
<style>
    .dataTables_wrapper .dataTable .btn, .dataTables_wrapper .dataTable .fc button, .fc .dataTables_wrapper .dataTable button, .dataTables_wrapper .dataTable .ajax-upload-dragdrop .ajax-file-upload, .ajax-upload-dragdrop .dataTables_wrapper .dataTable .ajax-file-upload, .dataTables_wrapper .dataTable .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .dataTables_wrapper .dataTable .swal2-styled, .dataTables_wrapper .dataTable .wizard > .actions a, .wizard > .actions .dataTables_wrapper .dataTable a {
        padding: 0.2rem 0.4rem;
    }

</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> User Name </th>
                                    <th> Full name </th>
                                    <th> Email </th>
                                    <th> Password </th>
                                    <th> Subscription </th>
                                    <!-- <th> Request Date </th> -->
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records) && !empty($records))
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> {{isset($value->name) && !empty($value->name) ? $value->name : '-'}} </td>
                                    <td>
                                        {{isset($value->first_name) && !empty($value->first_name) ? $value->first_name : ' '}}
                                        {{isset($value->last_name) && !empty($value->last_name) ? $value->last_name : ' '}}
                                    </td>
                                    <td> {{isset($value->email) && !empty($value->email) ? $value->email : '-'}} </td>
                                    <td> {{isset($value->password_string) && !empty($value->password_string) ? $value->password_string : '-'}} </td>
                                    <td> {{ !empty(getLatestSubscribtion($value->id)) ? getLatestSubscribtion($value->id)->package : '-'  }}</td>
                                    <td class=" align-items-center">
                                        <a href="{{route('admin.stream.create', ['user' => $value->id ])}}" class="btn btn-outline-primary btn-sm p-1 m-1" data-toggle="tooltip" data-placement="top" title="Add Data"><i class="fa fa-user-plus"></i></a>
                                        <a href="{{route('admin.getLogin', $value->id)}}" class="btn btn-outline-success btn-sm p-1 m-1" target="_blank" data-toggle="tooltip" data-placement="top" title="Login"><i class="fa fa-sign-in"></i></a>
                                        {{-- <a href="javascript:;"  onClick="sendWarning({{ $value->id }})" class="btn btn-outline-warning btn-sm p-1 m-1"  data-toggle="tooltip" data-placement="top" title="Send Warning"><i class="fa fa-envelope"></i></a> --}}
                                        @if($value->is_ban == 0)
                                        <a href="javascript:;" onClick="banAccount({{ $value->id }})" class="btn btn-outline-danger btn-sm p-1 m-1"  data-toggle="tooltip" data-placement="top" title="Ban"><i class="fa fa-ban"></i></a>
                                        @elseif($value->is_ban == 1)
                                        <a href="javascript:;" onClick="banAccount({{ $value->id }})" class="btn btn-outline-success btn-sm p-1 m-1"  data-toggle="tooltip" data-placement="top" title="Un Ban"><i class="fa fa fa-check-square-o"></i></a>
                                        @endif
                                        <a href="{{route('admin.artist.index', $value->id)}}" class="btn btn-outline-warning btn-sm p-1 m-1" target="_blank" data-toggle="tooltip" data-placement="top" title="Add Artist"><i class="fa fa-user"></i></a>
                                        @if($value->block_release == 0)
                                            <a href="javascript:;" onClick="releaseBlockModal('{{ $value->id }}',$(this))" class="btn btn-outline-danger btn-sm p-1 m-1"  data-toggle="tooltip" data-placement="top" title="Block Create Release"><i class="fa fa-bell-slash"></i></a>
                                        @elseif($value->block_release == 1)
                                            <a href="javascript:;" onClick="releaseBlockModal('{{ $value->id }}',$(this))" class="btn btn-outline-success btn-sm p-1 m-1"  data-toggle="tooltip" data-placement="top" title="Un Block Create Release"><i class="fa fa-bell"></i></a>
                                        @endif
                                        <a href="javascript:;"  onClick="upgrade({{$value->id}})"  class="btn btn-outline-primary btn-sm p-1 m-1" data-toggle="tooltip" data-placement="top" title="Upgrade Package"><i class="fa fa-rocket"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="releaseBlockModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Reason to Block Create Release</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.release.blockRelease') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="user_id" id="user_id">
                        <label for="">Reason</label>
                        <textarea name="reason" id="" cols="30" rows="10" class="form-control" required id="reason" style="color:white"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="float-right mt-3">
                            <button type="button" class="btn btn-danger" onClick="closeModal($(this))">CANCEL</button>
                            <button type="submit" class="btn btn-success" >ADD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="upgrade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upgrade Package</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.upgrade')}}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="user_id" id="upgrade_user_id">
                    <div class="col-md-12">
                        <label for="">Package</label>
                        <select name="package" class="form-control" required>
                            <option value="">Select Package</option>
                            <option value="starters">Starters</option>
                            <option value="artists">Artists</option>
                            <option value="labels">Labels</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Expiry Date</label>
                        <input type="date" name="expiry_at" class="form-control" required value="{{ date('Y-m-d', strtotime('+1 year')) }}">
                    </div>
                    <div class="col-md-12">
                        <div class="float-right mt-3">
                            <button type="button" class="btn btn-danger" onClick="closeModal($(this))">CANCEL</button>
                            <button type="submit" class="btn btn-success" >UPGRADE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection
@push("scripts")
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('admin/js/chart.js')}}"></script>
<script type="">
    $(document).ready(function () { $('#example').DataTable(); });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    function sendWarning(id){
        var conf = confirm('Do you want to send Warning?');
        if(conf == true){
            $.ajax({
                type : "GET",
                url : "{{ route('admin.stream.warning') }}",
                data : {
                    'id' : id,
                },
                beforeSend : function(res){
                    $('.loader').show();
                },
                success : function(res){
                    $('.loader').hide();
                    if(res.success == true){
                        $.notify("Warning Email Sent","success");
                    }
                    location.reload();
                },
                error : function(res){
                    $('.loader').hide();
                    $.notify("Something Went Wrong","error");
                    location.reload();
                }
            });
        }
    }
    function banAccount(id){
        var conf = confirm('Do you want to Ban this account?');
        if(conf == true){
            $.ajax({
                type : "GET",
                url : "{{ route('admin.stream.ban') }}",
                data : {
                    'id' : id,
                },
                beforeSend : function(res){
                    $('.loader').show();
                },
                success : function(res){
                    $('.loader').hide();
                    if(res.status == 1){
                        $.notify("Account has been banned","error");
                    }
                    else if(res.status == 0){
                        $.notify("Account has been un banned","error");
                    }
                    location.reload();
                },
                error : function(res){
                    $('.loader').hide();
                    $.notify("Something Went Wrong","error");
                    location.reload();
                }
            });
        }
    }

    function closeModal(elm){
        $(".modal").modal('hide');
    }
    function releaseBlockModal(id,elm){
        $("#user_id").val(id);
        $("#releaseBlockModal").modal('show');
    }

    function upgrade(id){
        $("#upgrade_user_id").val(id);
        $("#upgrade").modal('show');
    }
</script>
@endpush
