@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex  align-items-center">
                        <h4 class="card-title">Statements</h4>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Username </th>
                                    <th> Full name </th>
                                    <th> Email </th>
                                    <th> Last Added Date</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users) && !empty($users))
                                @foreach($users as $index=>$value)
                                <tr>
                                    <td> 1 </td>
                                    <td> {{isset($value->name) && !empty($value->name) ? $value->name : '-'}} </td>
                                    <td>
                                        {{isset($value->first_name) && !empty($value->first_name) ? $value->first_name : ' '}}
                                        {{isset($value->last_name) && !empty($value->last_name) ? $value->last_name : ' '}}
                                    </td>
                                    <td>{{isset($value->email) && !empty($value->email) ? $value->email : ' '}}</td>
                                    <td> {{getDateFormat($value->created_at)}}} </td>
                                    <td>
                                        <a class="btn btn-lg btn-info" href="{{route('admin.statements.create' ,['user' => $value->id] )}}">Add</a>
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