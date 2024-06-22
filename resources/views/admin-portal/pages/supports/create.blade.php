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
                    <h4 class="card-title">Support</h4>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Full name </th>
                                    <th> Email </th>
                                    <th> Contact </th>
                                    <th> Subject </th>
                                    <th> Request Date </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td> 1 </td>
                                    <td> Niral Malani </td>
                                    <td> malaniniral21@gmail.com </td>
                                    <td>1234567890</td>
                                    <td>s simply dummy text of the printing and t</td>
                                    <td> 02/7/2020</td>
                                    <td class=" align-items-center">
                                        <button class="btn btn-outline-primary" onclick='window.location.href="support-details.html"'>View</button>&nbsp;&nbsp; <span class="text-danger">Pending</span>
                                    </td>
                                </tr>
                                <tr>

                                    <td> 2 </td>
                                    <td> Niral Malani </td>
                                    <td> malaniniral21@gmail.com </td>
                                    <td>1234567890</td>
                                    <td>s simply dummy text of the printing and t</td>
                                    <td> 02/7/2020</td>
                                    <td class=" align-items-center">
                                        <button class="btn btn-outline-primary" onclick='window.location.href="support-details.html"'>View</button>&nbsp;&nbsp; <span class="text-success">Completed</span>
                                    </td>
                                </tr>
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