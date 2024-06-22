@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row m-0 mb-4 align-items-center">
        <div class="col-md-6 mb-md-0">
            <h1 class="h1 mb-1 mt-2"> <span class="user" style="color: #fbda03;">Get In Touch</span>
            </h1>
            <p>For General Inquiries and Support</p>
        </div>
        <div class="col-md-6 text-left text-md-right">
            <a class="btn btn-lg" href="{{route('user.supports.index')}}" style="background-color:#fbda03; color: #333;;">View Past Request</a>
        </div>

    </div>

    <!-- Free Support  -->
    <div class="container-fluid">
        <form class="w-100 d-block" action="{{route('user.supports.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" value="{{old('subject')}}" placeholder="Subject" requried>
                        @error("subject") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Contact</label>
                        <input type="number" name="contact" class="form-control" id="username" value="{{old('contact')}}" placeholder="Contact" requried>
                        @error("contact") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="7" spellcheck="false"  placeholder="Message" requried>{{old('message')}}</textarea>
                        @error("message") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg" style="background-color:#fbda03 ; color:#333;">Send Message</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @endsection
    @push('scripts')
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

    @endpush
