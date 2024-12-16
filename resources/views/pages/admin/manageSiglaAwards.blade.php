@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Sigla Awards Content</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/main">Home</a></li>
                            <li class="breadcrumb-item "><a href="/main/sigla-awards">Sigla Awards</a></li>
                            <li class="breadcrumb-item active">Manage Sigla Awards Content</li>
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
                                    Sigla Awards Content
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ isset($award) ? route('award.update', $award) : route('award.store') }}"
                                    enctype="multipart/form-data">
                                    {{ isset($award) ? method_field('PUT') : '' }}
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Content</label>
                                                <input type="text" class="form-control" placeholder="Enter Content"
                                                    name="content"
                                                    value="{{isset($award) ? $award->content : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Sigla Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image" accept="image/*">
                                                        <label class="custom-file-label" for="image">
                                                            {{ isset($award) ? $award->image : 'Choose File' }}

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">Sigla Background Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="bgImage" accept="image/*">
                                                        <label class="custom-file-label" for="image">
                                                            {{ isset($award) ? $award->bgImage : 'Choose File' }}

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
