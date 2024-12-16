@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Running Credits</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/main">Home</a></li>
                            <li class="breadcrumb-item "><a href="/main/view-all-runningCredits">Running Credits</a></li>
                            <li class="breadcrumb-item active">Manage Running Credits</li>
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
                                    Running Credits
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ url($runningCredits ? '/manageRunningCredits/' . $runningCredits->id : '/manageRunningCredits') }}"
                                    enctype="multipart/form-data">
                                    {{ $runningCredits ? method_field('PUT') : '' }}
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea id="summernote" name="content" required placeholder="Enter Content">
                                                    {{ $runningCredits ? $runningCredits->content : '' }}
                                                </textarea>
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
