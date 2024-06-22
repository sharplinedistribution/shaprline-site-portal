@extends('layouts.portal_revamp_scaffold')
@push('title')
{{isset($title) && !empty($title) ? $title : ''}} -
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">

@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6 ">
                            <p class="tab-title mt-0 mb-4 ms-2">{{ $title }}</p>

                        </div>


                        <div class="col-md-6 " >
                            <a href="{{route('user.campaigns.create')}}"><button  type="button" class="btn btn-primary rounded"  style=" float:right; ">Create New</button></a>
                        </div>

                </div>
                    <div class="table-responsive ">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="campaign">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Artist Name </th>
                                    <th> Email </th>
                                    <th> Release Title </th>
                                    <th> Contact </th>
                                    <th> Release Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td>{{isset($value->artist_name) && !empty($value->artist_name) ? $value->artist_name : '-'}}</td>
                                    <td>{{isset($value->email) && !empty($value->email) ? $value->email : '-'}}</td>
                                    <td>{{isset($value->release_title) && !empty($value->release_title) ? $value->release_title : '-'}}</td>
                                    <td>{{isset($value->contact) && !empty($value->contact) ? $value->contact : '-'}}</td>
                                    <td>{{isset($value->release_date) && !empty($value->release_date) ? date('d/m/Y' , strtotime($value->release_date)) : '-'}}</td>
                                    <td class=" align-items-center">
                                        <a href="{{route('user.campaigns.show', $value->id)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                        <a href="{{route('user.campaigns.edit', $value->id)}}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <!-- @if(isset($value->is_accepted_by_admin) && !empty($value->is_accepted_by_admin) && $value->is_accepted_by_admin == 1 ) <span class="text-success">Accepted</span> @else <span class="text-danger">Pending</span>@endif -->
                                        <a href="{{route('user.campaigns.delete',$value->id)}}" class="btn btn-outline-danger delete_record " data-id="{{$value->id}}" onClick="return confirm('Do you want to delete?');" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No record found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>

@endsection
@push("scripts")
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#campaign').DataTable({
            "pageLength": 100
        });
        $("#campaign_paginate").hide();
    });
</script>
@endpush
