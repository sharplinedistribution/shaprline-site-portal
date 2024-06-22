@extends('layouts.auth_revamp_scaffold')
@push('title') Register - @endpush
@push('styles')
    <style>
        .error{
            color:red;
        }

        .btn.disabled, .btn:disabled, fieldset:disabled .btn {
            background-color: #FFF301;
            border-color: #FFF301;
        }

        .form-check-input[type=checkbox]:checked {
            background-color: black;
        }
    </style>
@endpush
@section('content')
<main>
    <section class="auth-container position-relative overflow-hidden">
       <div class="partical-top-right">
          <img src="{{asset('assets/portal-revamp/img/partical.png')}}" class="w-100" width="200" alt="">
       </div>
       <div class="col-12 mb-3">
          <h1 class=" text-center">Welcome to <span class="text-color-primary">Sharpline Distro</span></h1>
       </div>
       <div class="auth">
          <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{url('/')}}"><img src="{{asset('images/logoSharpline.png')}}" alt="" style="width:240px; height:110px;"></a>
            </div>
             <div class="col-md-12 mx-auto mt-4">
                <div class="auth-form">
                    {!! Form::open(['route' => 'register', 'class' => 'mt-3', 'id' => 'form']) !!}
                        {!! Form::hidden('memref', request('memref'), []) !!}
                      <div class="mb-4">
                         <label for="" class="form-label">First Name</label>
                         {!! Form::text('first_name', null, ['class' => 'form-control custom-control', 'id' => 'first_name', 'placeholder' => 'First Name', 'required', 'maxlength' => 100]) !!}
                      </div>
                      <div class="mb-4">
                         <label for="" class="form-label">Last Name</label>
                         {!! Form::text('last_name', null, ['class' => 'form-control custom-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'required', 'maxlength' => 100]) !!}
                      </div>
                      <div class="mb-4">
                         <label for="" class="form-label">Email</label>
                         {!! Form::email('email', !empty(request('royalty_splits')) ? request('royalty_splits') : null, ['class' => 'form-control  custom-control', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190, !empty(request('royalty_splits')) ? 'readonly' : null ]) !!}
                         @if(!empty(request('royalty_splits')))
                         <small class="text-danger">Royalty share will not be linked to  your accountif you registered with another email address</small>
                         @endif
                      </div>
                      <div class="mb-4 input-icon position-relative">
                         <label for="" class="form-label">Country</label>
                         <select name="country" required class="form-control custom-control" id="country" onchange="print_state('state',this.selectedIndex);">
                         </select>
                         <i class="fa-solid fa-chevron-down select-icon"></i>
                      </div>
                      <div class="mb-4 position-relative input-icon">
                         <label for="" class="form-label">Password</label>
                         <input type="password" name="password" id="password" class="form-control pass custom-control" placeholder="Password" required minlength="8">
                         <i onclick="showPassword()" id="passIcon1" class="fa-solid fa-eye"></i>
                      </div>
                      <div class="mb-4 position-relative input-icon">
                         <label for="" class="form-label">Repeat Password</label>
                         <input type="password" name="password_confirmation" id="password-confirm" class="form-control pass2 custom-control" placeholder="Repeat Password" required minlength="8">
                         <i onclick="showPassword2()" id="passIcon2" class="fa-solid fa-eye"></i>
                      </div>
                      <div class="form-check mb-4">
                         <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onChange='agree($(this))'>
                         <label class="form-check-label" for="flexCheckDefault">&nbsp;
                         I agree to <span class="text-color-primary">Sharpline Distro</span> <a href="{{route('site.termsOfService')}}" style="color:#FFF301" target="_blank">Terms & Conditions</a> and <a href="{{route('site.privacyPolicy')}}" style="color:#FFF301" target="_blank">Privacy Policy</a>
                         </label>
                      </div>
                      <small class="text-danger" id="msg"></small>
                      <div class="mb-1 text-center">
                         <button type="submit" class="btn btn-primary" id="submit">Create Account</button>
                      </div>
                      <div class="text-center text-white">
                         <p>Already have an Account <a class="text-color-primary" href="{{route('login')}}">Login</a></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('web/js/payment-related.js')}}"></script>
    <script>
        print_country("country");
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    }
                }
            });
        });
        function agree(elm){
            var ch = elm.is(':checked');
            if(ch == true){
                $("#submit").attr('disabled',false);
                $("#msg").html('').hide();
            }
            else{
                $("#submit").attr('disabled',true);
                $("#msg").html('<br>Please check Terms & Conditions and Privacy Policy').show();
            }
        }
    </script>
@endpush
