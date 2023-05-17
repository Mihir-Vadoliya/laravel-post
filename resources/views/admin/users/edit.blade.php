@extends('layouts.app')

@section('title', 'Admin - Edit User')

@push('styles')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
@endpush
@section('content')

		<div class="page-wrapper">
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">User</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Edit User</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-12 col-lg-8 col-md-8 col-sm-12">
						<form method="POST" action="{{ route('users.update',$data->id) }}" name="login-form" id="add-user">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="edit" value="{{ $data->id}}">
                            <div class="row">
								<div class="col-12 col-sm-12 col-lg-12 form-group">
									<label>User Name</label>
									<input type="text" class="form-control" name= "name" value="{{ $data->name}}">
									@if($errors->has('name'))
									    <div class="error">{{ $errors->first('name') }}</div>
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
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" value="">
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Type</label>
									<select class="form-select" name="type">
										<option value="">Select User Type</option>
										<option value="1" @if( $data->type == 1) selected @endif>Admin</option>
										<option value="2" @if( $data->type == 2) selected @endif>User</option>
									</select>
									@if($errors->has('type'))
									    <div class="error">{{ $errors->first('type') }}</div>
									@endif
								</div>
							</div>
							<div class="col-12 col-sm-6 col-lg-6 form-group">
									<label>Status</label>
									<select class="form-select" name="status">
										<option value="">Select User Status</option>
										<option value="1" @if( $data->type == 1) selected @endif>Active</option>
										<option value="0" @if( $data->type == 0) selected @endif>Inactive</option>
									</select>
									@if($errors->has('status'))
									    <div class="error">{{ $errors->first('status') }}</div>
									@endif
								</div>
							<div class="submit-section">
								<button type="submit" class="btn btn-primary submit-btn">Submit</button>
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

    <script>
    	$(document).ready(function(){
    		$('#add-user').validate({
    			errorElement:'div',
                errorClass:'error',

                rules:{
                    name:{required:true},
                    email:{
                    	required:true,
                    	email:true,
                    	remote: {url: "{{ route('check-email-exist',$data->id )}}",type:"post",data:{'_token': '{{ csrf_token() }}' }},
                    },
                    type:{required:true},
                },
                messages:{
                    name: {required: "The name field is required"},
                    email: {
                    	required: "The email field is required",
                    	email: "Enter valid email address",
                    	remote: "This Email address already taken"
                    },
                    type: {required: "The type field is required"},
                },
    		});
    	});

    </script>

@endpush