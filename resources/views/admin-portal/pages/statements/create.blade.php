@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@section('content')
<div class="content-wrapper">


    <div class="row ">
        <div class="col-12 grid-margin">
            <form action="{{route('admin.statements.store')}}" class="w-100 d-block" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{request()->user}}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-2"><a href="{{route('admin.statements.index')}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; Back</h4>
                        <div class="d-flex  align-items-center">
                            <h4 class="card-title">Add Statements</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subject">Statements</label>
                                    <input type="month" name="statement_month" class="form-control" id="" placeholder="">
                                    @error('statement_month') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message"> Royalty Collection</label>
                                    <div class="row w-100">
                                        <div class="col-md-6">
                                            <input type="date" name="collection_start_date" class="form-control" id="" placeholder="Contact">
                                            @error('collection_start_date') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="collection_end_date" class="form-control" id="" placeholder="Contact">
                                            @error('collection_end_date') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="username"> Upload Spreadsheets</label>
                                    <input type="file" class="form-control" name="csv[]" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="" placeholder="Contact" multiple require>
                                    @error('csv') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg" style="background-color:#fbda03 ; color:#333;">Submit</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>









    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statement added</h4>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Statement </th>
                                    <th>User</th>
                                    <th>Royalty Collection</th>
                                    <th>Download Statement (Zip)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($statements) && !empty($statements))
                                @foreach($statements as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> {{date('M Y' , strtotime($value->statement_month))}}</td>
                                    <td>{{isset($value->user) ? $value->user->name : null}}</td>
                                    <td> {{getDateFormat($value->collection_start_date)}} - {{getDateFormat($value->collection_end_date)}}</td>
                                    <td>
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
