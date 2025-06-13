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
                                        <div class="card card-primary card-outline card-tabs">
                                            @php
                                                $quarters = [
                                                    [
                                                        'label' => 'Q1',
                                                        'start' => '2024-01-10 00:00:00',
                                                        'end' => '2025-03-10 23:59:59',
                                                    ],
                                                    [
                                                        'label' => 'Q2',
                                                        'start' => '2025-03-10 00:00:00',
                                                        'end' => '2025-07-09 23:59:59',
                                                    ],
                                                    [
                                                        'label' => 'Q3',
                                                        'start' => '2025-07-10 00:00:00',
                                                        'end' => '2025-10-09 23:59:59',
                                                    ],
                                                    [
                                                        'label' => 'Q4',
                                                        'start' => '2025-10-10 00:00:00',
                                                        'end' => '2026-01-09 23:59:59',
                                                    ],
                                                ];
                                            @endphp
                                            <div class="card-body">
                                                <div class="card-header p-0 pt-1 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                        @foreach ($quarters as $index => $quarter)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                                    id="custom-tabs-three-{{ strtolower($quarter['label']) }}-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-three-{{ strtolower($quarter['label']) }}"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-three-{{ strtolower($quarter['label']) }}"
                                                                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                                    {{ $quarter['label'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    @foreach ($quarters as $index => $quarter)
                                                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                            id="custom-tabs-three-{{ strtolower($quarter['label']) }}"
                                                            role="tabpanel"
                                                            aria-labelledby="custom-tabs-three-{{ strtolower($quarter['label']) }}-tab">
                                                            <table class="table table-bordered table-striped nomination">
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
                                                                    @foreach ($nominees->where('created_at', '>=', $quarter['start'])->where('created_at', '<=', $quarter['end']) as $nominee)
                                                                        <tr>
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
                                                    @endforeach
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
            </div>
        </section>
    </div>
@endsection

@section('extendedScript')
    <script src="{{ asset('js/individual-nominees.js') }}"></script>
@endsection
