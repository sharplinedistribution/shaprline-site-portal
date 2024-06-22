@extends('layouts.admin_scaffold')
@push('title')
    - Settings
@endpush
@push('styles')
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row mt-2 px-lg-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Settings</div>
                <div class="card-body">
                    {!! Form::model($settings, ['route' => ['admin.settings.update', $settings->id]]) !!}
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Analytics Note</label>
                            {!! Form::select('is_analytic_note', [1 => 'Show', 0 => 'Hide'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="col-md-9"></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>


    </div>

</div>

@endsection
@push('scripts')
@endpush
