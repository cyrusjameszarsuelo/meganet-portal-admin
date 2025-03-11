@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sigla Award</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sigla Award</li>
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
                                    Sigla Award Content
                                </h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('award.create') }}" class="btn btn-primary">Create New Content</a>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="example1"
                                                        class="table table-bordered table-striped tableUsage">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Content</th>
                                                                <th>Image</th>
                                                                <th>Date Created</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($siglaAwards as $sigla)
                                                                <tr>
                                                                    <td>{{ $sigla->id }}</td>
                                                                    <td>{{ $sigla->content }}</td>
                                                                    <td><img src="{{ asset('uploads/sigla-awards-image/' . $sigla->image) }}"
                                                                            alt="" width="20%"></td>
                                                                    <td>{{ $sigla->created_at }}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a class="btn btn-primary"
                                                                                href="{{ route('award.edit', $sigla) }}">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-users mr-1"></i>
                                    Sigla Nominees
                                </h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ url('main/nominee') }}" class="btn btn-primary">Add Nominee</a>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="example1"
                                                        class="table table-bordered table-striped tableUsage">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($siglaNominees as $siglaNominee)
                                                                <tr>
                                                                    <td>{{ $siglaNominee->name }}</td>
                                                                    <td>{{ $siglaNominee->email }}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a class="btn btn-primary btn-sm" type="button"
                                                                                href="{{ url('/main/nominee', $siglaNominee) }}">Edit</a>
                                                                            <button class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#deleteSiglaNominee"
                                                                                onclick="deleteNomineeFunction({{ $siglaNominee->id }});">Remove</button>
                                                                            {{-- <a class="btn btn-danger btn-sm"
                                                                                    href="{{ route('siglaNominee.destroy', $siglaNominee) }}">Delete</a> --}}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-users mr-1"></i>
                                    Sigla Department
                                </h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ url('/main/department') }}" class="btn btn-primary">Add Department</a>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="example1"
                                                        class="table table-bordered table-striped tableUsage">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($siglaDepartments as $siglaDepartment)
                                                                <tr>
                                                                    <td>{{ $siglaDepartment->id }}</td>
                                                                    <td>{{ $siglaDepartment->name }}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a class="btn btn-primary btn-sm"
                                                                                href="{{ url('/main/department', $siglaDepartment) }}">Edit</a>
                                                                            <button class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#deleteSiglaDepartment"
                                                                                onclick="deleteDepartmentFunction({{ $siglaDepartment->id }});">Remove</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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
    <div class="modal fade" id="deleteSiglaDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST" id="deleteSiglaDepartmentForm">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteSiglaNominee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST" id="deleteSiglaNomineeForm">
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
    <script src="{{ asset('js/manageSigla.js') }}"></script>
@endsection
