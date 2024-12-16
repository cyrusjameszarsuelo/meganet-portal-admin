@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Banner Questions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/main">Home</a></li>
                            <li class="breadcrumb-item "><a href="/main/view-all-corporateoffice">Banner Questions</a></li>
                            <li class="breadcrumb-item active">Manage Banner Questions</li>
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
                                    Banner Questions
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ url($bannerQuestions ? '/manageBannerQuestion/' . $bannerQuestions->id : '/manageBannerQuestion') }}"
                                    enctype="multipart/form-data">
                                    {{ $bannerQuestions ? method_field('PUT') : '' }}
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Title"
                                                    name="title"
                                                    value="{{ $bannerQuestions ? $bannerQuestions->title : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <input type="text" class="form-control" placeholder="Enter Title"
                                                    name="question"
                                                    value="{{ $bannerQuestions ? $bannerQuestions->question : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image" accept="image/*">
                                                        <label class="custom-file-label" for="image">
                                                            {{ $bannerQuestions ? $bannerQuestions->image : 'Choose File' }}

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
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
