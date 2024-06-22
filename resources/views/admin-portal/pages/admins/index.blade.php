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
                    <h4 class="card-title">Create Admin</h4>
                    @if(isset($admin))
                    <form method="POST" action="{{route('admin.admins.update',$admin->id)}}">
                    {{ method_field('PUT') }}
                    @else
                    <form method="POST" action="{{route('admin.admins.store')}}">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id=""  class="form-control" required value="{{isset($admin) ? $admin->name : null}}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Email</label>
                                <input type="email" name="email" id=""  class="form-control" required value="{{isset($admin) ? $admin->email : null}}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Password</label>
                                <input type="text" name="password" id=""  class="form-control" required value="{{isset($admin) ? $admin->password_clear : null}}">
                            </div>
                            <div class="col-md-3">
                                <div style="margin-top:35px;">
                                    <button type="submit" name="search_type" value="result" class="btn btn-success">SUBMIT</button>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('admin.admins.index') }}" type="button" name="search_type" value="pdf" class="btn btn-danger">CANCEL</a>
                                    
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Password </th>
                                    <th> Created at </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($admins as $index=>$admin)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->password_clear}}</td>
                                        <td>{{$admin->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.admins.edit',$admin->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a  onClick="return confirm('Are you sure? This will not be restored');" href="{{route('admin.admins.show',$admin->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
</script>
@endpush
