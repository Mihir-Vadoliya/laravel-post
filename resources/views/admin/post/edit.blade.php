@extends('layouts.app')

@section('title', 'Admin - Edit Post')

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
							<h3 class="page-title">Post</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Edit Post</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-12 col-lg-8 col-md-8 col-sm-12">
						<form method="POST" action="{{ route('posts.update',$data->id) }}" name="login-form" id="add-post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="edit" value="{{ $data->id}}">
                            <div class="row">
								<div class="col-12 form-group">
									<label>Post Title</label>
									<input type="text" class="form-control" name= "title" value="{{ $data->title}}">
									@if($errors->has('title'))
									    <div class="error">{{ $errors->first('title') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<label>Description</label>
									<input type="text" class="form-control" name="description" value="{{ $data->description}}">
									@if($errors->has('description'))
									    <div class="error">{{ $errors->first('description') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<input type="file" name="image" class="form-control">
									@if($errors->has('image'))
									    <div class="error">{{ $errors->first('image') }}</div>
									@endif
									<img src="{{ asset('postImages/'. $data->image) }}" class="mt-2 " height="100px" width="100px">
								</div>
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