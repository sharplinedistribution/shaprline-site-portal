@extends('layouts.auth_revamp_scaffold')
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

             <div class="col-md-12 mx-auto mt-4">
                <div class="auth-form">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                      <div class="mb-4">
                         <label for="" class="form-label">Email</label>
                         <input type="email" name="email" class="form-control  custom-control @error('email') is-invalid @enderror"  value="{{ $email ?? old('email') }}"    placeholder="Email" required autocomplete="email" autofocus>
                         @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

                      </div>
                      <div class="mb-4">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control  custom-control @error('password') is-invalid @enderror"  value=""   placeholder="Password" required autocomplete="password" autofocus>
                        @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

                     </div>
                     <div class="mb-4">
                        <label for="" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control  custom-control @error('password_confirmation') is-invalid @enderror"     placeholder="Confirm Password" required autocomplete="password_confirmation" autofocus>
                        @error('password_confirmation') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

                     </div>
                      <div class="mb-1 text-center">
                         <button type="submit" class="btn btn-primary">    {{ __('Change Password') }}</button>
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

@push('scripts')

@endpush
