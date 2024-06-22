@extends('layouts.revamp_scaffold')
@push('title')
    Register
@endpush
@push('styles')
    <style>
        .btn.disabled, .btn:disabled, fieldset:disabled .btn {
            background-color: #fbda03;
            border-color: #fbda03;
        }
    </style>
@endpush
@section('content')
<section class="auth">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h1 class="text-white text-center">Welcome to <span class="text-color-primary">Sharpline Distro</span></h1>
                <p class="text-white text-center">Sign Up For A Free 30 Day Trial With Sharpline Distro. No Credit Or Debit Card Required.</p>
            </div>

            <div class="col-md-10 mx-auto mt-4">
                <div class="auth-form">
                    {!! Form::open(['route' => 'register', 'class' => 'mt-3', 'id' => 'form']) !!}
                        <div class="mb-4">
                            <label for="" class="form-label text-white">First Name</label>
                            {!! Form::text('first_name', null, ['class' => 'form-control form-control-lg custom-control', 'id' => 'first_name', 'placeholder' => 'First Name', 'required', 'maxlength' => 100]) !!}
                        </div>

                        <div class="mb-4">
                            <label for="" class="form-label text-white">Last Name</label>
                            {!! Form::text('last_name', null, ['class' => 'form-control form-control-lg custom-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'required', 'maxlength' => 100]) !!}
                        </div>

                        <div class="mb-4">
                            <label for="" class="form-label text-white">Email</label>
                            {!! Form::email('email', null, ['class' => 'form-control form-control-lg custom-control', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190]) !!}
                        </div>

                        <div class="mb-4">
                            <label for="" class="form-label text-white">Country</label>
                            <select name="country" required class="form-control form-control-lg custom-control" id="country" onchange="print_state('state',this.selectedIndex);">
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="" class="form-label text-white">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg custom-control" placeholder="Password" required minlength="8">
                        </div>

                        <div class="mb-4">
                            <label for="" class="form-label text-white">Repeat Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-lg custom-control" placeholder="Repeat Password" required minlength="8">
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value=""  id="defaultCheck1" onChange='agree($(this))'>
                            <label class="form-check-label text-white" for="defaultCheck1">
                                I agree to <span class="text-color-primary">Sharpline Distro</span> Terms & Conditions and Privacy Policy
                                <span class="text-danger" id="msg" style="display:none"></span>
                            </label>
                          </div>

                        <div class="mb-1">
                            <button type="submit" class="btn btn-primary w-100" disabled id="submit">Create Account</button>
                        </div>

                        <div class="d-md-flex justify-content-between">
                            <p>Already have <span class="text-color-primary">Sharpline</span> Account <a class="text-color-primary" href="{{route('login')}}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('web/js/payment-related.js')}}"></script>
    <script>
        print_country("country");
        $('.hideNav').hide();


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
