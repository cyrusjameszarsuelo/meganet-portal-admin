@extends('manageSiteTemplate')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">MegaProjects</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
						<li class="breadcrumb-item active">MegaProjects</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-users mr-1"></i>
								Manage MegaProjects
							</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">List of MegaProjects</h3>
										</div>

										<div class="card-body">
											<div class="row">
												<a class="btn btn-primary"
													href="{{ url('/main/view-all-megaprojects/manageMegaprojects') }}">Add
													MegaProjects</a>
											</div>
											<br>


											<div class="row">

												<div class="col-5 col-sm-3">
													<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab"
														role="tablist" aria-orientation="vertical">

														@foreach ($megaprojects as $megaproject)
														<a class="nav-link" id="vert-tabs-{{$megaproject->id}}-tab"
															data-toggle="pill" href="#vert-tabs-{{$megaproject->id}}"
															role="tab" aria-controls="vert-tabs-{{$megaproject->id}}"
															aria-selected="true">{{$megaproject->segments}}</a>
														@endforeach

													</div>
												</div>

												<div class="col-7 col-sm-9">
													<div class="tab-content" id="vert-tabs-tabContent">
														@foreach ($megaprojects as $project)
														<div class="tab-pane text-left fade"
															id="vert-tabs-{{$project->id}}" role="tabpanel"
															aria-labelledby="vert-tabs-{{$project->id}}-tab">
															<table class="table table-bordered table-striped example1">
																<thead>
																	<tr>
																		<th>ID</th>
																		<th>Title</th>
																		<th>Segment</th>
																		<th>Details</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($segments as $megaprojectData)
																		@if ($project->id ==$megaprojectData->megaproject_id)

																		<tr>
																			<td>{{$megaprojectData->id}}</td>
																			<td>{{$megaprojectData->title}}</td>
																			<td>{{$megaprojectData->segments}}</td>
																			<td>{!!$megaprojectData->details!!}</td>
																			<td>
																				<div class="btn-group">
																					<a class="btn btn-primary"
																						href="{{ url('/main/view-all-megaprojects/manageMegaprojects') .'/'.$megaprojectData->id }}">Edit</a>
																					<button class="btn btn-danger"
																						data-toggle="modal"
																						data-target="#deleteMegaproject"
																						onclick="deleteFunction({{$megaprojectData->id}});">Remove</button>
																				</div>
																			</td>
																		</tr>
																		@endif
																	@endforeach
																</tbody>
															</table>
														</div>
														@endforeach
													</div>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteMegaproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body bg-white text-center">
				<br>
				<h3>Are you sure to delete this?</h3>
				<br>
			</div>
			<div class="modal-footer bg-white">
				<form method="POST" id="deleteMegaprojectForm">
					@csrf
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('extendedScript')
<script src="{{asset('js/manageMegaproject.js')}}"></script>
@endsection