@extends('layouts.app')
@if(Auth()->user()->type == '1')
	@section('title', 'Admin - My Profile')
@else
	@section('title', 'My Profile')
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
							<h3 class="page-title">My Profile</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">My Profile</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-12 col-lg-8 col-md-8 col-sm-12">
						<form method="POST" action="{{ route('my-profile-update',$data->id) }}" name="login-form" id="add-user">
                            @csrf
                            <input type="hidden" name="edit" value="{{ $data->id}}">
                            <div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>User Name</label>
									<input type="text" class="form-control" name= "name" value="{{ $data->name}}">
									@if($errors->has('name'))
									    <div class="error">{{ $errors->first('name') }}</div>
									@endif
								</div>
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>User ID</label>
									<input type="text" class="form-control" name="userid" value="{{ $data->userid}}">
									@if($errors->has('userid'))
									    <div class="error">{{ $errors->first('userid') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" value="{{ $data->email}}">
									@if($errors->has('email'))
									    <div class="error">{{ $errors->first('email') }}</div>
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
                    name:{required:true},
                    userid:{
                    	required:true,
                    	remote: {url: "{{ route('check-userid-exist',$data->id )}}",type:"post",data:{'_token': '{{ csrf_token() }}' }},
                    },
                    email:{
                    	required:true,
                    	email:true,
                    	remote: {url: "{{ route('check-email-exist',$data->id )}}",type:"post",data:{'_token': '{{ csrf_token() }}' }},
                    }
                },
                messages:{
                    name: {required: "The name field is required"},
                    userid: {
                    	required: "The userid field is required",
                    	remote: "This user id already taken"
                    },
                    email: {
                    	required: "The email field is required",
                    	email: "Enter valid email address",
                    	remote: "This Email address already taken"
                    }
                },
    		});
    	});

    </script>

@endpush