@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@push("styles")
<style>
    .packages-box {
        border: 1px solid #fbda03;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px
    }
</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 w-100 align-items-center">
                        <div class="col-md-6">
                            <h3 class="card-title mb-0">Packages</h3>
                        </div>
                        <div class="col-md-6 text-left text-md-right">
                            <a href="{{route('admin.packages.create')}}" class="btn btn-lg text-dark" style="background-color:#fbda03;">Add Package</a>
                        </div>
                    </div>
                    <div class="row w-100">
                        @if(isset($records) && !empty($records) )
                        @foreach($records as $index=>$value)
                        <div class="col-md-6 col-lg-4">
                            <div class="packages-box">
                                <h3 class="title">{{$value->name}}</h3>
                                <p class="mb-2">Price - ${{$value->price}}</p>
                                <ul class="pricing-content">
                                    @if(isset($value->details) && !empty($value->details))
                                    @foreach($value->details as $i=>$v)
                                    <li>{{$v->feature}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                                <div>
                                    <a class="btn btn-outline-primary" href="{{route('admin.packages.edit', $value->id)}}">Edit</a> &nbsp;&nbsp;
                                    @if($value->status == 1)
                                    <a class="btn btn-outline-warning" href="{{route('admin.packages.changestatus', $value->id)}}">Disable</a> &nbsp;&nbsp;
                                    @else
                                    <a class="btn btn-outline-info mr-3" href="{{route('admin.packages.changestatus', $value->id)}}">Enable</a>
                                    @endif
                                    <a class="btn btn-outline-danger delete_record" data-id="{{$value->id}}" onclick="event.preventDefault();" data-toggle="tooltip" title="Delete" href="javascript:;">Delete</a>
                                    <form id="destroyForm_{{$value->id}}" action="{{ route('admin.packages.destroy', $value->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

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