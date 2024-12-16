@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Sigla Nominee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/main">Home</a></li>
                            <li class="breadcrumb-item "><a href="/main/awards">Sigla Nominee</a></li>
                            <li class="breadcrumb-item active">Manage Sigla Nominee</li>
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
                                    Sigla Nominee
                                </h3>
                            </div>
                            <div class="card-body">
                                {{-- <form method="POST" action="{{ isset($award) ? route('award.update', $award) : route('award.store') }}" enctype="multipart/form-data"> --}}
                                    <form method="POST" action="{{isset($siglaNominee) ? route('siglaNominee.update', $siglaNominee) : route('siglaNominee.store')}}">
                                    {{ isset($siglaNominee) ? method_field('PUT') : '' }}
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Name"
                                                    name="name"
                                                    value="{{ isset($siglaNominee) ? $siglaNominee->name : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Enter Email"
                                                    name="email"
                                                    value="{{ isset($siglaNominee) ? $siglaNominee->email : '' }}">
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
    <script src="{{ asset('js/manageSigla.js') }}"></script>
@endsection
