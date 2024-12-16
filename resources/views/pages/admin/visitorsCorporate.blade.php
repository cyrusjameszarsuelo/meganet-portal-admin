@extends('manageSiteTemplate')


@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Corporate Visitors</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/main">Home</a></li>
							<li class="breadcrumb-item active">Corporate Visitors</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<section class="content">
	      	<div class="container-fluid">
		        <div class="row">
		        	<div class="col-md-9">
			        	<div class="card">
			        		<div class="card-header">
			        			<h3 class="card-title">
			        				<i class="fa fa-newspaper"></i>
			        				Corporate Visitors
			        			</h3>
			        		</div>
			        		<div class="card-body">
			        			<table id="visitorsTable" class="table table-bordered table-striped">
    								<thead>
    									<tr>
    										<th>ID</th>
    										<th>Email</th>
    										<th>Page Visit</th>
    										<th>No. of visits on page</th>
    										<th>Date Created</th>
    									</tr>
    								</thead>
    								<tbody>
    									@foreach($corporateVisitors as $corporateVisitorsData)
										<tr>
											<td>{{$corporateVisitorsData->id}}</td>
											<td>{{$corporateVisitorsData->name}}</td>
											<td>{{$corporateVisitorsData->purpose}}</td>
											<td>{{$corporateVisitorsData->no_of_visits}}</td>
											<td>{{$corporateVisitorsData->created_at}}</td>
										</tr>
										@endforeach
    								</tbody>
    							</table>
			        		</div>
			        	</div>
			        </div>
			        <div class="col-md-3">
			        	<div class="card">
			        		<div class="card-header">
			        			<h3 class="card-title">
			        				<i class="fa fa-newspaper"></i>
			        				Filter
			        			</h3>
			        		</div>
			        		<div class="card-body">
			        			<br>
			        			<form action="/main/view-all-visitors-corporate" method="GET">
		        					@csrf
				        			<div class="btn-group float-right btn-block">
				        				<input type="submit" name="filter" class="btn btn-primary" value="Weekly">
				        				<input type="submit" name="filter" class="btn btn-primary" value="Monthly">

				        			</div>
				        			<br>
				        			<br>
				        		</form>
		        				<a href="/main/view-all-visitors-corporate" class="btn btn-default btn-block">Reset</a>

			        			<br>
			        			<br>

			        			<form action="/main/view-all-visitors-corporate" method="GET">

				        			<h5 class="text-center">Custom Filter:</h5>
			        				<div class="form-group">
										<label>Date and time range:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											<span class="input-group-text"><i class="far fa-clock"></i></span>
											</div>
											<input type="text" class="form-control float-right" name="filter" id="reservation">
										</div>
										<br>
										<button  type="submit" class="btn btn-success btn-block">Filter</button>
									</div>
		        				</form>
			        		</div>
			        	</div>
			        </div>
		        </div>
		    </div>
		</section>
	</div>
@endsection

@section('extendedScript')
	<script src="{{asset('js/visitors.js')}}"></script>
@endsection