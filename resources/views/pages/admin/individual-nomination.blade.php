@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Individual Nomination</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Individual Nomination</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{$topEmployee->first()->name}}</h3>
                                <p class="text-muted text-center">Department - <strong>{{$topEmployee->first()->department}}</strong></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Total Nominate</b> <a class="float-right">{{$topEmployee->first()->nomineeCount}}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{$topEmployee->first()->leftJoin('users', 'users.email', '=', 'nominees.name')->first()->name}}</h3>
                                        <p>Most Voted Nominee</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-user"></i>

                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-6">

                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{$topEmployee->first()->nomineeCount}}<sup style="font-size: 20px">%</sup></h3>
                                        <p>Total Nominate</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-users mr-1"></i>
                                    Individual Nomination
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-three-q1-tab"
                                                        data-toggle="pill" href="#custom-tabs-three-q1" role="tab"
                                                        aria-controls="custom-tabs-three-q1" aria-selected="true">Q1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-three-q2-tab" data-toggle="pill"
                                                        href="#custom-tabs-three-q2" role="tab"
                                                        aria-controls="custom-tabs-three-q2" aria-selected="false">Q2</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-three-q1"
                                                    role="tabpanel" aria-labelledby="custom-tabs-three-q1-tab">
                                                    <table class="table table-bordered table-striped nomination">
                                                        <thead>
                                                            <tr>
                                                                <th>Nominee</th>
                                                                <th>Department</th>
                                                                <th>Values</th>
                                                                <th>Behaviors</th>
                                                                <th>Critical Incidents</th>
                                                                <th>Result/Impact</th>
                                                                <th>Created By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($nominees->where('created_at', '>=', '2025-03-10 00:00:00') as $nominee)
                                                                <tr>
                                                                    <td>{{ $nominee->name }}</td>
                                                                    <td>{{ $nominee->department }}</td>
                                                                    <td>
                                                                        @foreach ($nominee->nomineeValue as $value)
                                                                            <span
                                                                                class="right badge badge-primary">{{ $value->ourValue->value }}</span>
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
                                                <div class="tab-pane fade" id="custom-tabs-three-q2" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-q2-tab">
                                                    <table class="table table-bordered table-striped nomination">
                                                        <thead>
                                                            <tr>
                                                                <th>Nominee</th>
                                                                <th>Department</th>
                                                                <th>Values</th>
                                                                <th>Behaviors</th>
                                                                <th>Critical Incidents</th>
                                                                <th>Result/Impact</th>
                                                                <th>Created By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($nominees->where('created_at', '<', '2025-03-10 00:00:00') as $nominee)
                                                                <tr>
                                                                    <td>{{ $nominee->name }}</td>
                                                                    <td>{{ $nominee->department }}</td>
                                                                    <td>
                                                                        @foreach ($nominee->nomineeValue as $value)
                                                                            <span
                                                                                class="right badge badge-primary">{{ $value->ourValue->value }}</span>
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
                                        <!-- /.card -->

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
