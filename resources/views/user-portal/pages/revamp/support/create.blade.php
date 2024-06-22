@extends('layouts.portal_revamp_scaffold')
@push('title')
    Support
@endpush
@push('button')
<div>
    <a href="{{route('user.supports.index')}}">
        <button class="btn btn-primary rounded">View Past Request</button>
    </a>
</div>
@endpush
@push('buttonContent')
<div class="col-md-12 text-center">
    <div>
        <h2 class="user-name">
            <span>Get In Touch</span>
        </h2>
        <p class="tag">For General Inquiries and Support. We will respond within 24 Hours.</p>
    </div>
</div>
@endpush
@section('content')

<div class="row mt-2 px-lg-4">

    <div class="col-12">
        <form class="w-100 d-block" action="{{route('user.supports.store')}}" method="POST">
            @csrf
            <div class="auth-form">
                <div class="card">
                    <div class="card-body py-4 px-lg-4 px-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Subject</label>
                                    <input type="text" name="subject" id="subject" value="{{old('subject')}}" placeholder="Subject" requried class="form-control custom-control" required>
                                    @error('subject')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Message</label>
                                    <textarea name="message" id="message" rows="7" spellcheck="false"  placeholder="Message" requried class="form-control custom-control h-auto" rows="4">{{old('message')}}</textarea>
                                    @error('message')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded">Send Message</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
@endsection
