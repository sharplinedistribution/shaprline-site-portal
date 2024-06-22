@extends('layouts.admin_scaffold')
@push('title')
 - {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card mb-5">
                <div class="card-body">
                    <h4 class="card-title">Filter</h4>
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Start Date</label>
                                <input type="date" name="start_date" id=""  class="form-control" value="{{request('end_date')}}">
                            </div>
                            <div class="col-md-3">
                                <label for="">End Date</label>
                                <input type="date" name="end_date" id=""  class="form-control" value="{{request('end_date')}}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Type</label>
                                <select name="type" id="" class="form-control">
                                    <option value="" >All</option>
                                    <option value="1" >Paid</option>
                                    <option value="0" >Non Paid</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div style="margin-top:35px;">
                                    <button type="submit" name="search_type" value="result" class="btn btn-warning"><i class="fa fa-search"></i></button>
                                    &nbsp;&nbsp;
                                    <button type="submit" name="search_type" value="pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></button>
                                    &nbsp;&nbsp;
                                    <button type="submit" name="search_type" value="export" class="btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                                    &nbsp;&nbsp;
                                    <a href="{{route('admin.users.index')}}"><button type="button" name="search_type" value="export" class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}</h4>
                    <div style="float:right">
                        <a href="javascript:;" onClick="addUser($(this))" class="btn btn-success">ADD USER</a>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> First Name </th>
                                    <th> Last name </th>
                                    <th> Email </th>
                                    <th> Country </th>
                                    <th> Subscribtion </th>
                                    <th> Created Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records) && !empty($records))
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> {{isset($value->first_name) && !empty($value->first_name) ? $value->first_name : '-'}} </td>
                                    <td>
                                        {{isset($value->last_name) && !empty($value->last_name) ? $value->last_name : ' '}}
                                    </td>
                                    <td> {{isset($value->email) && !empty($value->email) ? $value->email : '-'}} </td>
                                    <td> {{isset($value->country) && !empty($value->country) ? $value->country : '-'}} </td>
                                    <td> {{ !empty(getLatestSubscribtion($value->id)) ? getLatestSubscribtion($value->id)->package : '-'  }} </td>
                                    <td> {{$value->created_at->format('d/m/Y')}} </td>
                                    <td class=" align-items-center">
                                        <a href="{{route('admin.users.show', $value->id)}}" class="btn btn-outline-primary m-1 p-1"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.users.ban', $value->id)}}" class="btn btn-outline-danger m-1 p-1" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
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


<div class="modal fade" id="addUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create User</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">First Name</label>
                       <input type="text" placeholder="First Name" name="first_name" required class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Last Name</label>
                       <input type="text" placeholder="Last Name" name="last_name" required class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>   
                        <input type="email" placeholder="Email" name="email" required class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Password</label>   
                        <input type="text" placeholder="Password" name="password" required class="form-control">
                    </div>
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
                        <label for="" class="form-label">Country</label>
                         <select name="country" required class="form-control custom-control" id="country" onchange="print_state('state',this.selectedIndex);">
                         </select>
                         <i class="fa-solid fa-chevron-down select-icon"></i>
                    </div>
                    <div class="col-md-12">
                        <div class="float-right mt-3">
                            <button type="button" class="btn btn-danger" onClick="closeModal($(this))">CANCEL</button>
                            <button type="submit" class="btn btn-success" >CREATE USER</button>
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
<script src="{{asset('web/js/payment-related.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('admin/js/chart.js')}}"></script>
<script type="">
     print_country("country");
    $(document).ready(function () { $('#example').DataTable(); });

    function addUser(elm){
        $("#addUser").modal('show');
    }

    function closeModal(elm){
        $("#addUser").modal('hide');
    }
</script>
@endpush
