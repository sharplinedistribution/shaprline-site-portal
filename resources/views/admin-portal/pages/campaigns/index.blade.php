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
                <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> User Name </th>
                                    <th> Artist name </th>
                                    <th> Email </th>
                                    <th> Request Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records) && !empty($records))
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> {{isset($value->user->name) && !empty($value->user->name) ? $value->user->name : '-'}} </td>
                                    <td>
                                        {{isset($value->artist_name) && !empty($value->artist_name) ? $value->artist_name : ' '}}
                                    </td>
                                    <td> {{isset($value->email) && !empty($value->email) ? $value->email : '-'}} </td>
                                    <td> {{$value->created_at->format('d/m/Y')}} </td>
                                    <td class=" align-items-center">
                                        <a href="{{route('admin.campaigns.show', $value->id)}}" class="btn btn-outline-primary">View</a>
                                        @if($value->status != 1)
                                        <span class="text-danger">Pending</span> @else <span class="text-success">Completed</span>
                                        @endif
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