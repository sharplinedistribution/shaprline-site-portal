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
                    <!-- - @auth {{Auth::guard('admin')->user()->name}} @endauth -->
                        <h4 class="card-title">Add Statements</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="subject">Statements</label>
                                <input type="month" class="form-control" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="username"> Released Date</label>
                                <input type="date" class="form-control" id="" placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message"> Royalty Collection</label>
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="" placeholder="Contact">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="" placeholder="Contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username"> Upload CSV</label>
                                <input type="file" class="form-control" id="" placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username"> Upload PDF</label>
                                <input type="file" class="form-control" id="" placeholder="Contact">
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
        </div>
    </div>
    <div class="row d-none">
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
                                    <th> Released Date</th>
                                    <th> Royalty Collection</th>
                                    <th>Download Statement (Zip)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td> 1 </td>
                                    <td> May 2022</td>
                                    <td> 15 July 2022</td>
                                    <td> 01 May 2022 - 31 May 2022</td>
                                    <td><a href="#"><i class="mdi mdi-arrow-down"></i> CSV</a> &nbsp;<a href="#"><i class="mdi mdi-arrow-down"></i> PDF</a></td>

                                </tr>

                                <tr>

                                    <td> 1 </td>
                                    <td> May 2022</td>
                                    <td> 15 July 2022</td>
                                    <td> 01 May 2022 - 31 May 2022</td>
                                    <td><a href="#"><i class="mdi mdi-arrow-down"></i> CSV</a> &nbsp;<a href="#"><i class="mdi mdi-arrow-down"></i> PDF</a></td>

                                </tr>

                                <tr>

                                    <td> 1 </td>
                                    <td> May 2022</td>
                                    <td> 15 July 2022</td>
                                    <td> 01 May 2022 - 31 May 2022</td>
                                    <td><a href="#"><i class="mdi mdi-arrow-down"></i> CSV</a> &nbsp;<a href="#"><i class="mdi mdi-arrow-down"></i> PDF</a></td>

                                </tr>

                                <tr>

                                    <td> 1 </td>
                                    <td> May 2022</td>
                                    <td> 15 July 2022</td>
                                    <td> 01 May 2022 - 31 May 2022</td>
                                    <td><a href="#"><i class="mdi mdi-arrow-down"></i> CSV</a> &nbsp;<a href="#"><i class="mdi mdi-arrow-down"></i> PDF</a></td>

                                </tr>

                                <tr>

                                    <td> 1 </td>
                                    <td> May 2022</td>
                                    <td> 15 July 2022</td>
                                    <td> 01 May 2022 - 31 May 2022</td>
                                    <td><a href="#"><i class="mdi mdi-arrow-down"></i> CSV</a> &nbsp;<a href="#"><i class="mdi mdi-arrow-down"></i> PDF</a></td>

                                </tr>

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