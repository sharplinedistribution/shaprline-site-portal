@extends('layouts.admin_scaffold')
@push('title')
Royalty Split
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card mb-5">
                <div class="card-body">
                    <h4 class="card-title">Royalty Split (Video)</h4>
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>RVID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Album Title</th>
                                <th>Release Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $index=>$video)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ isset($video->release->id) ? $video->release->id : '-' }}</td>
                                    <td>{{ isset($video->release->user->name) ? $video->release->user->name : '-' }}</td>
                                    <td>{{ isset($video->release->user->email) ? $video->release->user->email : '-' }}</td>
                                    <td>{{ isset($video->release->video_title) ? $video->release->video_title : '-' }}</td>
                                    <td>{{ isset($video->release->release_date) ? getDateFormat($video->release->release_date) : '-' }}</td>
                                    <td>
                                        <a  href="{{ route('admin.royaltySplit.videoDetail',isset($video->release->id) ? $video->release->id : 0) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
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
     $(document).ready(function () {
        $('#example').DataTable({
            "order": [[1, "desc"]] // Order by the second column (index 1) in descending order
        });
     });
</script>
@endpush
