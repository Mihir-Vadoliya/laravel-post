@extends('layouts.app')

@section('title', 'User - Dashboard')

@section('content')
	
	<!-- Page Wrapper -->
    <div class="page-wrapper">
		<!-- Page Content -->
        <div class="content container-fluid">
					
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Welcome {{ ucfirst(auth()->user()->name)}}</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
			
				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<a class="card dash-widget align-items-center text-decoration-none" href="{{ route('users.index') }}">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
							</div>
							<div class="dash-widget-info">
								<h4>Manage User</h4>
							</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection