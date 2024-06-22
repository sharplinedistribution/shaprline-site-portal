@extends('layouts.web_scaffold')
@section('content')
<div class="container login-container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <!-- <img src="images/logoSharpline.png" alt="" class="brand-img"> -->
            <h1 class="h1 text-white m-0">Reset <span class="brand-colorr">Your Password</span></h1>
        </div>

        @if (session('status'))
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
        @endif
    </div>
    <form action="{{url('password/email')}}" id="" class="mt-3" method="POST">
        @csrf
        <div class="col-lg-12">
            <div class="form-group">
                <label for="email">Email</label>

                <input id="email" type="email" class="form-control form-control-lg darkInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-lg btn-block btn_cst">Reset Password</button>
        </div>
        <div class="col-lg-12 mt-2 d-flex justify-content-between">
            <a href="{{route('login')}}" style="color: yellow;">Sign In</a>
            <p class="text-white">Don't have an account? <a href="{{route('register')}}" style="color: yellow;">Sign Up</a>
            </p>
        </div>
    </form>
</div>

@endsection

@push('scripts')

@endpush
