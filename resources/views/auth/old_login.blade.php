@extends('layouts.web_scaffold')
@push('title')
    Login -
@endpush
@push('styles')
    <style>
        .error {
            color: red;
        }
    </style>
@endpush
@section('content')
<div class="container login-container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <!-- <img src="{{asset('web/images/logoSharpline.png')}}" alt="" class="brand-img"> -->
            <h1 class="h1 text-white m-0">Welcome to <span class="brand-color">Sharpline Distro</span></h1>
        </div>
    </div>
    {!! Form::open(['route' => 'login', 'class' => 'mt-3', 'id' => 'form']) !!}
        <div class="col-lg-12">
            <div class="form-group">
                <label for="email">Email</label>
                {!! Form::email('email', null, ['class' => 'form-control form-control-lg darkInput', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190]) !!}
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg darkInput" placeholder="Password" required>
                @error('password')<span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-lg btn-block btn_cst">Login Account</button>
        </div>
        <div class="col-lg-12 mt-2 d-flex justify-content-between">
            <p class="text-white">Don't have <span style="color:#fbda03;">Sharpline</span> Account <a
                    href="{{route('register')}}" style="color: #fbda03;">Sign Up</a></p>

            <p><a href="{{url('password/reset')}}" style="color:#fbda03;">Forgot Password?</a></p>
        </div>
    {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
		$("#form").validate({
        });
	});
</script>
@endpush
