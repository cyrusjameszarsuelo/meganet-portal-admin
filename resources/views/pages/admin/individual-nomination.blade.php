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
                                        @php
                                            $quarters = [
                                                ['label' => 'Q1', 'start' => '2024-01-10 00:00:00', 'end' => '2025-03-10 23:59:59'],
                                                ['label' => 'Q2', 'start' => '2025-03-10 00:00:00', 'end' => '2025-07-09 23:59:59'],
                                                ['label' => 'Q3', 'start' => '2025-07-10 00:00:00', 'end' => '2025-10-09 23:59:59'],
                                                ['label' => 'Q4', 'start' => '2025-10-10 00:00:00', 'end' => '2026-01-09 23:59:59'],
                                            ];
                                        @endphp

                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-quarter-tab" role="tablist">
                                                @foreach ($quarters as $i => $quarter)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i === 0) active @endif"
                                                           id="custom-tabs-quarter-{{ $quarter['label'] }}-tab"
                                                           data-toggle="pill"
                                                           href="#custom-tabs-quarter-{{ $quarter['label'] }}"
                                                           role="tab"
                                                           aria-controls="custom-tabs-quarter-{{ $quarter['label'] }}"
                                                           aria-selected="{{ $i === 0 ? 'true' : 'false' }}">{{ $quarter['label'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-quarter-tabContent">
                                                @foreach ($quarters as $i => $quarter)
                                                    <div class="tab-pane fade @if($i === 0) show active @endif"
                                                         id="custom-tabs-quarter-{{ $quarter['label'] }}"
                                                         role="tabpanel"
                                                         aria-labelledby="custom-tabs-quarter-{{ $quarter['label'] }}-tab">
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
                                                                @foreach ($nominees->where('created_at', '>=', $quarter['start'])->where('created_at', '<=', $quarter['end']) as $nominee)
                                                                    <tr>
                                                                        <td>{{ $nominee->name }}</td>
                                                                        <td>{{ $nominee->department }}</td>
                                                                        <td>
                                                                            @foreach ($nominee->nomineeValue as $value)
                                                                                <span class="right badge badge-primary">{{ $value->ourValue->value }}</span>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($nominee->nomineeBehavior as $behavior)
                                                                                <span class="right badge badge-primary">{{ Str::limit($behavior->behavior->behavior, 20) }}</span>
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
                                                @endforeach
                                            </div>
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
