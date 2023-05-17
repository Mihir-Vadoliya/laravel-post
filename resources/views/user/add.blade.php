@extends('layouts.app')

@section('title', 'Admin - Add Post')

@push('styles')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush
@section('content')

		<div class="page-wrapper">
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Posts</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Post</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-12 col-lg-8 col-md-8 col-sm-12">
						<form method="POST" action="{{ route('posts.store') }}" name="login-form" id="add-post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
								<div class="col-12 form-group">
									<label>Post Title</label>
									<input type="text" class="form-control" name = "title">
									@if($errors->has('title'))
									    <div class="error">{{ $errors->first('title') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<label>Description</label>
									<textarea class="form-control" name="description"></textarea>
									@if($errors->has('description'))
									    <div class="error">{{ $errors->first('description') }}</div>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-lg-6 form-group">
									<input type="file" name="image" class="form-control">
									@if($errors->has('image'))
									    <div class="error">{{ $errors->first('image') }}</div>
									@endif
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
    		$('#add-post').validate({
    			errorElement:'div',
                errorClass:'error',

                rules:{
                    title:{
                    	required:true
                    },
                    description:{
                    	required:true,
                    },
                    image:{
                    	required:true,
                    }
                },
                messages:{
                    name: {required: "The post title field is required"},
                    description: {required: "The description field is required"},
                    image: {required: "Please select post image."},
                },
    		});
    	});

    </script>

@endpush