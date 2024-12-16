@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Team Nomination</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Team Nomination</li>
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
                                    Team Nomination
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table 
                                                        class="table table-bordered table-striped nomination">
                                                        <thead>
                                                            <tr>
                                                                <th>Department</th>
                                                                <th>Values</th>
                                                                <th>Behaviors</th>
                                                                <th>Critical Incidents</th>
                                                                <th>Result/Impact</th>
                                                                <th>Created By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($nominees as $nominee)
                                                                <tr>
                                                                    <td>{{ $nominee->department }}</td>
                                                                    <td>
                                                                        @foreach ($nominee->nomineeValue as $value)
                                                                            <span
                                                                                class="right badge badge-primary">{{$value->ourValue->value}}</span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @foreach ($nominee->nomineeBehavior as $behavior)
                                                                            <span
                                                                                class="right badge badge-primary">{{ Str::limit($behavior->behavior->behavior, 20) }}</span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>{{ $nominee->critical_incidents }}</td>
                                                                    <td>{{ $nominee->result_impact }}</td>
                                                                    <td>{{ $nominee->user_nominate }}</td>
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
@endsection

@section('extendedScript')
    <script src="{{ asset('js/individual-nominees.js') }}"></script>
@endsection
