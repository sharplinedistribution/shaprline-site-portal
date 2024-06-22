@extends('layouts.web_scaffold')
@push('styles')
    <style>
        .error {
            color: red;
        }
        .darkInput:focus{
            background-color: black;
        }
    </style>
@endpush
@push('title')
Register -
@endpush
@section('content')
<div class="container login-container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <!-- <img src="images/logoSharpline.png" alt="" class="brand-img"> -->
            <h2 class="h2 text-white mt-0">Welcome to <span class="brand-color">Sharpline Distro</span></h2>
        </div>
    </div>

    {!! Form::open(['route' => 'register', 'class' => 'mt-3', 'id' => 'form']) !!}
        <div class="col-lg-12">
            <div class="form-group">
                <label for="username">First Name</label>
                {!! Form::text('first_name', null, ['class' => 'form-control form-control-lg darkInput', 'id' => 'first_name', 'placeholder' => 'First Name', 'required', 'maxlength' => 100]) !!}
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label for="lastName">Last Name</label>
                {!! Form::text('last_name', null, ['class' => 'form-control form-control-lg darkInput', 'id' => 'last_name', 'placeholder' => 'Last Name', 'required', 'maxlength' => 100]) !!}

            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label for="email">Email</label>
                {!! Form::email('email', null, ['class' => 'form-control form-control-lg darkInput', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190]) !!}
            </div>
        </div>


        <div class="col-lg-12">
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" required class="form-control form-control-lg darkInput" id="country" onchange="print_state('state',this.selectedIndex);">
                </select>
            </div>
        </div>



        <div class="col-lg-12">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg darkInput" placeholder="Password" required minlength="8">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="confirmPass">Repeat Password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-lg darkInput" placeholder="Repeat Password" required minlength="8">
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="form-check">
                <input class="form-check-input checkInput" type="checkbox" value="" id="defaultCheck1" onChange='agree($(this))'>
                <label class="form-check-label" for="defaultCheck1">
                    I agree to
                    <span class="brand-color">Sharpline Distro</span>
                    Terms & Conditions and Privacy Policy
                    <span class="text-danger" id="msg" style="display:none"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-lg btn-block btn_cst" disabled id="submit">Create Account</button>
        </div>
        <div class="col-lg-12 mt-2">
            <p class="text-white">Already have a <span class="brand-color">Sharpline</span> Account? <a
                    href="{{route('login')}}" class="link" style="color: #fbda03;">Login</a></p>
        </div>
    {!! Form::close() !!}
</div>
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
