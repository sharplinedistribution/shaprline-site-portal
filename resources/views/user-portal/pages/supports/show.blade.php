{{-- @extends('layouts.user_scaffold') --}}
@extends('layouts.portal_revamp_scaffold')
@push('title')
{{isset($title) && !empty($title) ? $title : ''}} -
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{url()->previous()}}"><i class="	fa-solid fa-arrow-left" style="color: var(--primary);"></i></a>&nbsp; Back</h4>

                    <h4 class="card-title mt-4">Information</h4>

                    <p class="mb-2">
                        <p>Created at
                            <br>
                            {{$show->created_at->format('d/m/Y')}}
                        </p>
                    </p>
                    <hr>
                    <p class="mb-2">
                        Stauts<br>
                        @if(!empty($show->is_accepted_by_admin)) <span class="text-success"> Accept by Admin</span> @else <span class="text-danger">Not Accepted</span> @endif</p>
                    <hr>

                    <p class="mb-2">Subject
                        <br>
                        {{isset($show->subject) && !empty($show->subject) ? $show->subject : '-'}}
                    </p>
                    <hr>

                    <p class="mb-2">Message <br>
                        {{isset($show->message) && !empty($show->message) ? $show->message : '-'}}
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection