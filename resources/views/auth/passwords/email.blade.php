@extends('layouts.auth_revamp_scaffold')
@push('title')
Forget Password -
@endpush
@section('content')
<main>
    <section class="auth-container position-relative overflow-hidden">
       <div class="partical-top-right">
          <img src="{{asset('assets/portal-revamp/img/partical.png')}}" class="w-100" width="200" alt="">
       </div>
       <div class="col-12 mb-3">
          <h1 class=" text-center">Reset your <span class="text-color-primary">Password</span></h1>
       </div>
       <div class="auth">
          <div class="row">
             <div class="text-center">
                <a href="{{url('/')}}"><img src="{{asset('images/logoSharpline.png')}}" alt="" style="width:240px; height:110px;"></a>
             </div>
             @if (session('status'))
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
             <div class="col-md-12 mx-auto mt-4">
                <div class="auth-form">
                   <form action="{{url('password/email')}}" method="POST">
                    @csrf
                      <div class="mb-4">
                         <label for="" class="form-label">Email</label>
                         <input type="email" name="email" class="form-control  custom-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"   placeholder="Email" required autocomplete="email" autofocus>
                         @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

                      </div>
                      <div class="mb-1 text-center">
                         <button type="submit" class="btn btn-primary">Reset Password</button>
                      </div>
                      <div class="text-center text-white">
                         <p>Don't have an Account
                            <a class="text-color-primary" href="{{route('register')}}">Sign Up</a>
                            <span class="d-block my-3">or</span>
                            <a class="text-color-primary" href="{{route('login')}}">Login</a>
                         </p>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
       <div class="partical-bottom-left">
          <img src="{{asset('assets/portal-revamp/img/partical.png')}}" class="w-100" width="200" alt="">
       </div>
    </section>
 </main>
@endsection
