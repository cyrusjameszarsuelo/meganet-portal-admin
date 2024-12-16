@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usage</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Usage</li>
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
                                    Usage
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary float-right m-3"
                                                        data-toggle="modal" data-target="#exampleModal">Custom Date
                                                        Range</button>
                                                    <h4 class="mt-3 ">No. of users who clicked on:</h4>
                                                    <br>
                                                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active"
                                                                id="custom-content-above-dept-sites-tab" data-toggle="pill"
                                                                href="#custom-content-above-dept-sites" role="tab"
                                                                aria-controls="custom-content-above-dept-sites"
                                                                aria-selected="true">Dept Sites.</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-meganews-tab"
                                                                data-toggle="pill" href="#custom-content-above-meganews"
                                                                role="tab" aria-controls="custom-content-above-meganews"
                                                                aria-selected="false">MegaNews</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-megatrivia-tab"
                                                                data-toggle="pill" href="#custom-content-above-megatrivia"
                                                                role="tab"
                                                                aria-controls="custom-content-above-megatrivia"
                                                                aria-selected="false">MegaTrivia</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Intranet Analytics</p>
                                                    </div>
                                                    <div class="tab-content p-3" id="custom-content-above-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="custom-content-above-dept-sites" role="tabpanel"
                                                            aria-labelledby="custom-content-above-dept-sites-tab">

                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Site</th>
                                                                                <th>Clicker</th>
                                                                                <th>Department</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($metrics->where('action', 'Department Site') as $metric)
                                                                                <tr>
                                                                                    <td>{{ $metric->id }}</td>
                                                                                    <td>{{ $metric->action }}</td>
                                                                                    <td>{{ $metric->user }}
                                                                                    </td>
                                                                                    <td>{{ $metric->leftJoin('corporate_offices as c', 'metrics.action_val', '=', 'c.id')->where('c.id', $metric->action_val)->first()->department }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <div class="small-box bg-info">
                                                                                <div class="inner">
                                                                                    <h3>{{ $metrics->where('action', 'Department Site')->count() }}
                                                                                    </h3>
                                                                                    <p>Total Clicks in Corporate Office
                                                                                    </p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="card card-info">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">Total Clicks in
                                                                                        each Corporate Office Department
                                                                                    </h3>
                                                                                    <div class="card-tools">
                                                                                        <button type="button"
                                                                                            class="btn btn-tool"
                                                                                            data-card-widget="collapse"
                                                                                            title="Collapse">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Department</th>
                                                                                                <th>Total Clicks</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @php
                                                                                                $counter = 0;
                                                                                            @endphp
                                                                                            @foreach ($corporateOffices as $corporateOffice)
                                                                                                @forelse ($metrics->where('action', 'Department Site') as $metric)
                                                                                                    @if ($metric->action_val == $corporateOffice->id)
                                                                                                        @php
                                                                                                            $counter++;
                                                                                                        @endphp
                                                                                                    @endif
                                                                                                @empty
                                                                                                @endforelse
                                                                                                <tr>
                                                                                                    <td>{{ $corporateOffice->department }}
                                                                                                    </td>
                                                                                                    <td>{{ $counter }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @php
                                                                                                    $counter = 0;
                                                                                                @endphp
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
                                                        <div class="tab-pane fade" id="custom-content-above-meganews"
                                                            role="tabpanel"
                                                            aria-labelledby="custom-content-above-meganews-tab">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Site</th>
                                                                                <th>Clicker</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($metrics->where('action', 'Meganews')->whereNull('action_val') as $metric)
                                                                                <tr>
                                                                                    <td>{{ $metric->id }}</td>
                                                                                    <td>{{ $metric->action }}</td>
                                                                                    <td>{{ $metric->user }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <div class="small-box bg-info">
                                                                                <div class="inner">
                                                                                    <h3>{{ $metrics->where('action', 'Meganews')->whereNull('action_val')->count() }}
                                                                                    </h3>
                                                                                    <p>Total Clicks in MegaNews</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-content-above-megatrivia"
                                                            role="tabpanel"
                                                            aria-labelledby="custom-content-above-megatrivia-tab">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Site</th>
                                                                                <th>Clicker</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($metrics->where('action', 'Megatrivia') as $metric)
                                                                                <tr>
                                                                                    <td>{{ $metric->id }}</td>
                                                                                    <td>{{ $metric->action }}</td>
                                                                                    <td>{{ $metric->user }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <div class="small-box bg-info">
                                                                                <div class="inner">
                                                                                    <h3>{{ $metrics->where('action', 'Megatrivia')->count() }}
                                                                                    </h3>
                                                                                    <p>Total Clicks in MegaTrivia</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Custom</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/main/usage" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation"
                                    name="dateRange">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extendedScript')
    <script src="{{ asset('js/usage.js') }}"></script>
@endsection
