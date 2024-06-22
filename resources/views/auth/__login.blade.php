@extends('layouts.revamp_scaffold')
@push('title')
    Login
@endpush
@push('styles')
<style>
    .error{
        color : red;
    }
</style>
@endpush
@section('content')
<section class="auth">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h1 class="text-white text-center">Welcome to <span class="text-color-primary">Sharpline Distro</span></h1>
            </div>

            <div class="col-md-10 mx-auto mt-4">
                <div class="auth-form">
                    {!! Form::open(['route' => 'login', 'id' => 'form']) !!}
                        <div class="mb-4">
                            <label for="password" class="text-white">Email</label>
                            {!! Form::email('email', null, ['class' => 'form-control form-control-lg custom-control', 'id' => 'email', 'placeholder' => 'Email', 'required','maxlength' => 190]) !!}
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="text-white">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg custom-control" placeholder="Password" required>
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="mb-1">
                            <button type="submit" class="btn btn-primary w-100">Login Account</button>
                        </div>

                        <div class="d-md-flex justify-content-between">
                            <p>Don't have <a  href="{{url('/')}}" class="text-color-primary">Sharpline</a> Account <a class="text-color-primary" href="{{route('register')}}">Sign Up</a></p>

                            <p><a class="text-color-primary" href="{{url('password/reset')}}">Forgot Password?</a></p>
                        </div>
                    </form>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.hideNav').hide();
    $("#form").validate({
    });
</script>
@endpush
