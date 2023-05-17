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
                    <form method="POST" action="{{ route('register') }}" name="register-form" id="register-form">
                    @csrf
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placehoder="Name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placehoder="Email">
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

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placehoder="Confirm Password" >
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit"><i class="la la-key"></i><span class="px-2">Register</span></button>
                        </div>
                        <div class="account-footer">
                            <p>
                            @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Already you have Account!
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
                    name:{required:true},
                    email:{required:true},
                    password:{required:true},
                    password_confirmation:{required:true}
                },
                messages:{
                    name: {
                        required: "The email field is required"
                    },
                    email: {
                        required: "The email field is required"
                    },
                    password:{
                        required: "The password field is required",
                    },
                    password_confirmation:{
                        required: "The password field is required",
                    }
                },
            });
        });
    </script>
@endpush
