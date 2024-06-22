@extends('layouts.auth_revamp_scaffold')
@push('title') Login - @endpush
@section('content')
<main>
    <section class="auth-container position-relative overflow-hidden">
       <div class="partical-top-right">
          <img src="{{asset('assets/portal-revamp/img/partical.png')}}" class="w-100" width="200" alt="">
       </div>
       <div class="col-12 mb-3">
          <h1 class=" text-center">Login to <span class="text-color-primary">Sharpline Distro</span></h1>
       </div>
       <div class="auth">
          <div class="row">
             <div class="col-md-12 text-center">
                <a href="{{url('/')}}"><img src="{{asset('images/logoSharpline.png')}}" alt="" style="width:240px; height:110px;"></a>
             </div>
             <div class="col-md-12 mx-auto mt-4">
                <div class="auth-form">
                    {!! Form::open(['route' => 'login', 'id' => 'form']) !!}
                      <div class="mb-4">
                         <label for="" class="form-label">Email</label>
                         {!! Form::email('email', null, ['class' => 'form-control custom-control', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190]) !!}
                         @error('email')<span class="text-danger">{{$message}}</span>@enderror
                      </div>
                      <div class=" position-relative input-icon">
                         <label for="" class="form-label">Password</label>
                         <input type="password" name="password" class="form-control pass custom-control"
                            placeholder="Password" id="">
                         <i onclick="showPassword()" id="passIcon1" class="fa-solid fa-eye" style="color:#FFF301"></i>
                      </div>
                      @error('password')<span class="text-danger">{{$message}}</span>@enderror
                      <p class=" text-end mb-4 mt-2"><a class="text-color-primary"  href="{{url('password/reset')}}">Forgot Password?</a></p>
                      <div class="mb-1 text-center">
                         <button type="submit" class="btn btn-primary">Login Account</button>
                      </div>
                      <div class="text-center text-white">
                         <p>Don't have an Account <a
                            class="text-color-primary" href="{{route('register')}}">Sign Up</a></p>
                      </div>
                   {!! Form::close() !!}
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
