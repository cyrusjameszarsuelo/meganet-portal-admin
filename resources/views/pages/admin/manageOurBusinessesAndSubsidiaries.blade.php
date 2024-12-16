@extends('manageSiteTemplate')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Our Businesses and Subsidiaries</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/main">Home</a></li>
                        <li class="breadcrumb-item "><a href="/main/view-all-our-businesses-and-subsidiaries">Our Businesses and Subsidiaries</a></li>
                        <li class="breadcrumb-item active">Manage Our Businesses and Subsidiaries</li>
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
                                Megatrivia
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{url( $ourBas ? '/manageOurBusinessesAndSubsidiaries/' . $ourBas->id : '/manageOurBusinessesAndSubsidiaries' )}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name"
                                                name="name" value="{{$ourBas ? $ourBas->name : ''}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="imageFile">Image</label>
                                            <div class="input-group">

                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imageFile"
                                                        name="image" accept="image/*">
                                                    <label class="custom-file-label" for="imageFile">
                                                    </label>
                                                </div>
                                            </div>
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
<script src="{{ asset('js/manageMegaGoodVibes.js') }}"></script>
@endsection