@extends('layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap.min.css') }}">

@endpush
@section('content')
			
	<!-- Page Wrapper -->
    <div class="page-wrapper">
		@include('layouts.flash-message')
		<!-- Page Content -->
        <div class="content container-fluid">
		
			<!-- Page Header -->
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">User</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Users</li>
						</ul>
					</div>
					<div class="col-auto float-end ms-auto">
						<a href="{{ route('users.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add User</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable" id="dataTable">
							<thead>
								<tr>
									<th>User Name </th>
									<th>Email </th>
									<th>Type</th>
									<th class="text-end">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $user)
								<tr>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									@if($user->type == 1)
										<td>Admin</td>
									@else
										<td>User</td>
									@endif
									
									<td class="text-end">
                                        <a class="edit-overview" href="{{ route('users.edit',$user->id) }}" title="Edit"><i class="fa fa-pencil m-r-5"></i> </a>
                                       	<a href="javascript:void(0);" data-id='{{ $user->id }}' class="delete" data-bs-toggle="modal" data-bs-target="#delete" title="Delete"><i class="fa fa-trash-o m-r-5"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
		<!-- /Page Content -->
		
		<!-- Delete Modal -->
		<div class="modal custom-modal fade" id="delete" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete overview</h3>
							<p>Are you sure want to delete?</p>
						</div>
						<div class="modal-btn delete-action">
							<div class="row">
								<div class="col-6">

									<form action="" method="post" id="delete-form">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-primary continue-btn delete-btn">Delete</button>
									</form>
								</div>
								<div class="col-6">
									<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->
    </div>
	<!-- /Page Wrapper -->

@endsection
@push('scripts')
	<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/js/responsive.bootstrap.min.js') }}"></script>

	<script type="text/javascript">
		var SITE_IMG_JS = "{{ asset('assets/img/')}}";

	</script>
	<script src="{{asset('assets/js/custom-function.js')}}"></script>

	<script type="text/javascript">
		hidePopup('alert','3000');

		$('#dataTable').DataTable({
			responsive: true,
			scrollY: false,
			columnDefs: [
				{ orderable: false, targets: -1 }
			]

		});

		// Status change
		$(".status").on('click', function () {
		    var id = $(this).attr('data-id');
		    var status = $(this).attr('data-status');

		    if (id > 0) {
		        var url = "{{ route('user-status')}}";
		        var method = "GET";
		        ajaxResponse = ajaxCall(url,method,{"id":id,'status':status,'_token': '{{csrf_token()}}' });
		        
		        setTimeout(function(){
		        	stopLoaderAjax();
		        },300);

		        if(ajaxResponse){
		            window.location.replace(ajaxResponse.redirect);
		        }
		    }
		});

		$("#dataTable").on('click', '.delete', function () {
            let id = $(this).attr('data-id');
            let url = "{{ route('users.destroy',[':id']) }}";
            url = url.replace(':id', id);
            $("#delete-form").attr("action", url);
        });
	</script>
@endpush