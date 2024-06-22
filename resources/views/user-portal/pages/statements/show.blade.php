@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{url()->previous()}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; Back</h4>

                    <h4 class="card-title mt-4">Information</h4>

                    <p class="mb-2">{{$show->created_at->format('d/m/Y')}}</p>
                    <p class="mb-2">@if(!empty($show->is_accepted_by_admin)) <span class="text-success"> Accept by Admin</span> @else <span class="text-danger">Not Accepted</span> @endif</p>
                    <p class="mb-2">Subject
                        <br>
                        {{isset($show->subject) && !empty($show->subject) ? $show->subject : '-'}}
                    </p>
                    <p class="mb-2">Message <br>
                        {{isset($show->message) && !empty($show->message) ? $show->message : '-'}}
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection