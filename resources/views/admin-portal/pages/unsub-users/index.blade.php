@extends('layouts.admin_scaffold')
@push('title')
 {{isset($title) && !empty($title)  ? $title : '-'}} -
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}
                        <button id="sendEmail" class="btn btn-lg text-dark float-right mb-2    " style="background-color:#fbda03;"  onClick="sendEmail($(this))">Send Email</button>
                    </h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example" width="100%">
                            <thead>
                                <tr>
                                    <th width="7%" ><input type="checkbox" id="checkAll">&nbsp;All</th>
                                    <th width="10%"> # </th>
                                    <th width="25%"> Full name </th>
                                    <th width="25%"> Email </th>
                                    <th width="18%"> User Since </th>
                                    <th  width="15%" class="text-center">Total sent email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index=>$user)
                                    <tr>
                                        <td><input type="checkbox" class="checkbox" value="{{ $user->id }}"></td>
                                        <td>{{++$index}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{getDateFormat($user->created_at)}}</td>
                                        <td class="text-center"><a href="javascript:;"><span class="badge bg-primary text-white" onClick="emailLogs('{{$user->id}}')">{{campaignLogs($user->id)}}</span></a></td>
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

<div class="modal fade " id="emailLogs" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-modal="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"> Email Logs</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="content">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
    $('#checkAll').click(function() {
        $('input:checkbox').prop('checked', this.checked);
        if(this.checked == true){
            // $("#sendEmail").attr('disabled',false);
        }
        else{
            // $("#sendEmail").attr('disabled',true);
        }
    });

    function sendEmail(elm){
        var ids = $.map($('.checkbox:checked'), function(c) {
            return c.value;
        })
        if(ids.length > 0){
            $.ajax({
                type : "POST",
                url  : "{{route('admin.unsubscribe.sendEmail')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'ids'    : ids,
                },
                beforeSend : function(res){
                    $('.loader').show();
                },
                success : function(res) {
                    $('.loader').hide();
                    if(res.success == true){
                        notify('Campaign Sent to selected Users','success');
                    }
                    else{
                        notify('Something Went Wrong','error');
                    }
                    location.reload();
                },
                error : function(res) {
                    $('.loader').hide();
                    notify('Something Went Wrong','error');
                },
            });
        }
        else{
            notify('Select at least 1 user','danger');
        }

    }

    function emailLogs(id){
        $.ajax({
            type : "GET",
            url  : "{{route('admin.unsubscribe.emailLogs')}}",
            data : {
                'id' : id,
            },
            success : function(res){
                if(res.success == true){
                    $("#content").html(res.content);
                    $("#emailLogs").modal('show');
                }

            },
            error  : function(res){
                notify('Something Went Wrong','error');
            }
        })
    }

    </script>
@endpush
