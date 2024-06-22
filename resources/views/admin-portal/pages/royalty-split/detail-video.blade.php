@extends('layouts.admin_scaffold')
@push('title')
Royalty Split Detail
@endpush
@push('styles')
<style>
    hr {
        border: none; /* Remove default border */
        background-color: var(--primary); /* Set the desired color */
    }
    .border, .border-top, .border-bottom, .border-left, .border-right {
        border-color: yellow !important;
    }
    .text-primary {
        border-color: yellow !important;
    }
</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card mb-5">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('admin.royaltySplit.videoIndex') }}"><i class="fa fa-arrow-left" style="color:yellow"></i></a>&nbsp;Royalty Split Detail</h4>
                   <center>
                    <img src="{{asset(config('upload_path.video_thumbnail').$release->video_thumbnail)}}" class="card-img-top" alt="..." style="height:200px; width:200px;"><br>
                    <h3 class="mt-2">{{ $release->video_title }}</h3>
                   </center>
                   <hr>

                   @foreach($royaltySplits as $index=>$rs)
                    <div class="row mb-1">
                        <div class="col-12 border border-primary p-3">
                        <div class="row">
                            <div class="col-md-5">
                                <h5 style="color:yellow;">{{ $rs->release->video_title }}</h5>
                                <span>To <strong style="color:yellow;">{{ $rs->name }}</strong> - {{ $rs->email }} - {{date('d F Y | h:m',strtotime($rs->created_at))}} </span>

                            </div>
                            <div class="col-md-2 ">
                                <span style="color:yellow;">
                                    Status
                                </span>
                                @if($rs->status == 0) PENDING @elseif($rs->status == 1) ACCEPTED @elseif($rs->status == 2) REJECTED @endif
                            </div>
                            <div class="col-md-2 ">
                                Share : <strong style="color:yellow;">{{$rs->share}}%</strong>
                            </div>
                            <div class="col-md-3">
                                Earnings: $0.00
                            </div>
                        </div>
                        </div>
                    </div>
                 @endforeach

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
