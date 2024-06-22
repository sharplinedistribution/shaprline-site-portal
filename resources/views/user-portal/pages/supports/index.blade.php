{{-- @extends('layouts.user_scaffold') --}}
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
                   <div class="col-md-">
                      <p class="tab-title mt-0 mb-4 ms-2">{{ $title }}</p>
                   </div>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Subject </th>
                                    <th> Request Date </th>
                                    <th> Accept by Admin</th>
                                    <th> Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records) && $records->count()>0)
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td>{{isset($value->subject) && !empty($value->subject) ? $value->subject : '-'}}</td>
                                    <td> {{$value->created_at->format('d/m/Y')}}</td>
                                    <td> {{isset($value->accepted_date) && !empty($value->accepted_date) ? $value->accepted_date : '-'}}</td>
                                    <td>
                                        @if(isset($value->is_accepted_by_admin) && !empty($value->is_accepted_by_admin) && $value->is_accepted_by_admin == 1 )  <span class="badge bg-success">Accepted</span> @else <span class="badge bg-danger">Pending</span>@endif
                                    </td>
                                    <td class=" align-items-center">
                                        <a href="{{route('user.supports.show', $value->id)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>

@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();

    });
</script>
@endpush
