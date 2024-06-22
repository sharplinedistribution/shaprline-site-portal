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
                    <div class="col-12">
                        <p class="tab-title mt-0 mb-4 ms-2">Statements List</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Statement </th>
                                    <th> Release Date </th>
                                    <th> Royality Collection </th>
                                    <th> Download Statement </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records) && $records->count()>0)
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td>{{isset($value->statement_month) && !empty($value->statement_month) ? date('M Y' , strtotime($value->statement_month)) : '-'}}</td>
                                    <td>{{isset($value->release_date) && !empty($value->release_date) ? getDateFormat($value->release_date)  : '-'}}</td>
                                    <td>
                                        {{isset($value->collection_start_date) && !empty($value->collection_start_date) ? getDateFormat($value->collection_start_date) : '-'}}
                                        -
                                        {{isset($value->collection_end_date) && !empty($value->collection_end_date) ? getDateFormat($value->collection_end_date) : '-'}}

                                    </td>
                                    <td class=" align-items-center">
                                        @if(statementExcel($value->id) != false)
                                            <a href="javascript:;" data-toggle="modal" data-target="#statement_{{$value->id}}">
                                                <i class="mdi mdi-arrow-down"></i> CSV
                                            </a> &nbsp;
                                            <div class="modal fade" id="statement_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Spreadsheets</h4>
                                                        <table class="table table-stripped">
                                                            <tr>
                                                                <td>#</td>
                                                                <td>File</td>
                                                            </tr>
                                                            @forelse(statementExcel($value->id) as $index=>$file)
                                                                <tr>
                                                                    <td>{{++$index}}</td>
                                                                    <td ><a href="{{asset(config('upload_path.csv') . $file->file)}}">{{$file->file}}</a></td>
                                                                </tr>
                                                            @empty
                                                            @endforelse

                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if(!empty($value->pdf))
                                        <a href="{{asset(config('upload_path.pdf') . $value->pdf)}}">
                                            <i class="mdi mdi-arrow-down"></i> PDF
                                        </a>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>
@push("scripts")
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

<script type="">
    $(document).ready(function () { $('#example').DataTable(); });
        </script>
@endpush
@endsection
