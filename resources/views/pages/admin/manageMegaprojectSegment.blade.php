@extends('manageSiteTemplate')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage MegaProject Segment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/main">Home</a></li>
                        <li class="breadcrumb-item "><a href="/main/view-all-megaprojects">Manage MegaProject Segment</a></li>
                        <li class="breadcrumb-item active">Manage MegaProject Segment</li>
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
                                <i class="fa fa-newspaper"></i>
                                Manage MegaProject Segment
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" 
                                action="{{url( $megaprojectSegment ? 'manageMegaprojectsegmentsUpdate/' . $megaprojectSegment->id  : '/manageMegaprojectsegments' )}}"
                                enctype="multipart/form-data">
                                {{ $megaprojectSegment ? method_field('PUT') : '' }}
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Segment</label>
                                            <input type="text" class="form-control" placeholder="Enter Title"
                                                name="segments" value="{{$megaprojectSegment ? $megaprojectSegment->segments : ''}}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
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
<script src="{{asset('js/manageMeganews.js')}}"></script>
@endsection