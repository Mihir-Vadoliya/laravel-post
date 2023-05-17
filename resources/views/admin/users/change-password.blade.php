@extends('layouts.app')
@if(Auth()->user()->type == '1')
	@section('title', 'Admin - Change Password')
@else
	@section('title', 'Change Password')
@endif

@push('styles')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
@endpush
@section('content')

		<div class="page-wrapper">
			@include('layouts.flash-message')
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Change Password</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Change Password</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-12 col-lg-8 col-md-8 col-sm-12">
						<form method="POST" action="{{ route('change-password-post') }}" name="login-form" id="add-user">
                            @csrf
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" value="{{ $data->email}}" disabled>
									@if($errors->has('email'))
									    <div class="error">{{ $errors->first('email') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Old Password</label>
									<input type="password" class="form-control" name="old_password" value="">
									@if($errors->has('old_password'))
									    <div class="error">{{ $errors->first('old_password') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>New Password</label>
									<input type="password" class="form-control" name="new_password" value="">
									@if($errors->has('new_password'))
									    <div class="error">{{ $errors->first('new_password') }}</div>
									@endif
								</div>
							</div>
							<div class="submit-section">
								<button type="submit" class="btn btn-primary submit-btn">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

		</div>
@endsection

@push('scripts')
	<!-- select2 -->
	<script src="{{asset('assets/js/select2.min.js')}}"></script>

	<!--  jquery.validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('assets/js/custom-function.js')}}"></script>

    <script>
    	$(document).ready(function(){
    
			var SITE_IMG_JS = "{{ asset('assets/img/')}}";
			hidePopup('alert','3000');
	
    		$('#add-user').validate({
    			errorElement:'div',
                errorClass:'error',

                rules:{
                    old_password:{
                    	required:true,
                    	maxlength:9,
                    	minlength:8
                    },
                    new_password:{
                    	required:true,
                    	maxlength:8,
                    	minlength:8
                    },
                    email:{
                    	required:true,
                    	email:true
                    }
                },
                messages:{
                    old_password: {
                    	required: "This field is required",
                        maxlength: "This field must not be greater than 8 characters.",
                        minlength: "This field must be at least 8 characters."
                    },
                    new_password: {
                    	required: "This field is required",
                        maxlength: "This field must not be greater than 8 characters.",
                        minlength: "This field must be at least 8 characters."
                	},
                    email: {
                    	required: "The email field is required",
                    	email: "Enter valid email address"
                    }
                },
    		});
    	});

    </script>

@endpush