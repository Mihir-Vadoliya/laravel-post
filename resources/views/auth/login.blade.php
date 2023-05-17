@extends('layouts.auth-layout')

@section('content')
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
        
            <!-- Account Logo -->
            <div class="account-logo">
                <a href=""><img src="{{asset('assets/img/logo2.png')}}" alt="Weblogico" width="100" height="100"></a>
                <h3 class="account-title pt-3 color-186ae5 fw-bold">My Demo Site</h3>
            </div>
            <!-- /Account Logo -->
            
            <div class="account-box">
                <div class="account-wrapper">
                    <p class="account-subtitle color-186ae5"> <i class="la la-lock"></i><span class="px-1">Please Enter Your Information</span></p>
                    <hr>
                    <!-- Account Form -->
                    <form method="POST" action="{{ route('login') }}" name="login-form" id="login-form">
                    @csrf
                        <div class="form-group">
                            <!-- <label>Email</label> -->
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <!-- <label>Password</label> -->
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit"><i class="la la-key"></i><span class="px-2">Login</span></button>
                        </div>
                        <div class="account-footer">
                            <p>
                            @if (Route::has('register'))
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Have not account yet?!
                                </a>
                            @endif
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            // login validation
            $("#login-form").validate({
                errorElement:'div',
                errorClass:'error',

                rules:{
                    email:{
                        required:true
                    },
                    password:{required:true},
                },
                messages:{
                    email: {
                        required: "The email field is required"
                    },
                    password:{
                        required: "The password field is required",
                    },
                },
            });
        });
    </script>
@endpush