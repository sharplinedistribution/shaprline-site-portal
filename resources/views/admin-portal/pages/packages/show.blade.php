@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{route('admin.supports.index')}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; Back</h4>

                    <h4 class="card-title mt-4">Information</h4>

                    <p class="mb-2">Request Date - {{$show->created_at->format('d/m/Y')}}</p>
                    @if(!empty($show->is_accepted_by_admin) && $show->is_accepted_by_admin == 1)
                    <p class="mb-2 text-success">Accept by Admin</p>
                    @else
                    <p class="mb-2 text-danger">Pending</p>
                    @endif
                    <p class="mb-2">Subject <br>{{!empty($show->subject) ? $show->subject : '-'}}</p>
                    <p class="mb-2">Message <br> {{!empty($show->message) ? $show->message : '-'}}</p>
                    <hr class="hr-releases mt-2 mb-2">
                    <div>
                        @if($show->status == 1)
                        <a class="btn btn-success" href="{{route('admin.supports.statusChange' , $show->id)}}" title="Complete">Complete</a>

                        @else
                        <a class="btn btn-danger" href="{{route('admin.supports.statusChange' , $show->id)}}" title="Pending">Pending</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection