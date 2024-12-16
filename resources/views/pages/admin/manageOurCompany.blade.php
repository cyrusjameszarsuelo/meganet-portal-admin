@extends('manageSiteTemplate')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Our Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/main">Home</a></li>
                        <li class="breadcrumb-item "><a href="/main/view-all-our-companies">Our Company</a></li>
                        <li class="breadcrumb-item active">Manage Our Company</li>
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
                            <form method="POST" action="{{url( $ourCompany ? '/manageOurCompanies/' . $ourCompany->id : '/manageOurCompanies' )}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea id="summernote" name="content" required>
                                                {!! $ourCompany ? $ourCompany->content : '' !!}
                                            </textarea>
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
<script src="{{ asset('js/ourCompany.js') }}"></script>
@endsection