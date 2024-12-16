@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Coversion Rate</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Coversion Rate</li>
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
                                    Manage Coversion Rate
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
                                                    <h4 class="mt-3 ">Monthly no of Users who:</h4>
                                                    <br>
                                                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active"
                                                                id="custom-content-above-meganews-stories-tab"
                                                                data-toggle="pill"
                                                                href="#custom-content-above-meganews-stories" role="tab"
                                                                aria-controls="custom-content-above-meganews-stories"
                                                                aria-selected="true">Viewed MegaNews Stories</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-megatrivia-tab"
                                                                data-toggle="pill" href="#custom-content-above-megatrivia"
                                                                role="tab"
                                                                aria-controls="custom-content-above-megatrivia"
                                                                aria-selected="false">Answered MegaTrivia Questions</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-all-megatrivia-tab"
                                                                data-toggle="pill"
                                                                href="#custom-content-above-all-megatrivia" role="tab"
                                                                aria-controls="custom-content-above-all-megatrivia"
                                                                aria-selected="false">Viewed previous MegaTrivia
                                                                Questions</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Intranet Analytics</p>
                                                    </div>
                                                    <div class="tab-content p-3" id="custom-content-above-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="custom-content-above-meganews-stories" role="tabpanel"
                                                            aria-labelledby="custom-content-above-meganews-stories-tab">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Site</th>
                                                                                <th>Viewer</th>
                                                                                <th>Article</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($metricAllMeganews as $metric)
                                                                                <tr>
                                                                                    <td>{{ $metric->id }}</td>
                                                                                    <td>{{ $metric->action }}</td>
                                                                                    <td>{{ $metric->user }}</td>
                                                                                    <td>{{ $metric->leftJoin('meganews as m', 'metrics.action_val', '=', 'm.id')->where('m.id', $metric->action_val)->first()->title }}
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
                                                                                    <h3>{{ $metricAllMeganews->count() }}
                                                                                    </h3>
                                                                                    <p>Total Users who Viewed</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="card card-info">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">Stories</h3>
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
                                                                                                <th>Headline</th>
                                                                                                <th>Views</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @forelse ($metricMeganews as $metric)
                                                                                                <tr>
                                                                                                    <td>{{ $metric->title }}
                                                                                                    </td>
                                                                                                    <td>{{ $metric->totalVisitor }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @empty
                                                                                            @endforelse
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="card card-info">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">Montly Issued
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
                                                                                                <th>Date</th>
                                                                                                <th>Total Viewer</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @forelse ($meganewsGroups as $metric)
                                                                                                <tr>
                                                                                                    <td>{{ $metric->month }}
                                                                                                        {{ $metric->year }}
                                                                                                    </td>
                                                                                                    <td>{{ $metric->totalVisitor }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @empty
                                                                                            @endforelse
                                                                                        </tbody>
                                                                                    </table>
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
                                                                                <th>MegaTrivia</th>
                                                                                <th>User</th>
                                                                                <th>Answer</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($megatriviaAnswers as $megatriviaAnswer)
                                                                                <tr>
                                                                                    <td>{{ $megatriviaAnswer->id }}</td>
                                                                                    <td>{{ $megatriviaAnswer->megatrivia->title }}
                                                                                    </td>
                                                                                    <td>{{ $megatriviaAnswer->user }}</td>
                                                                                    <td>{{ $megatriviaAnswer->answer }}
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
                                                                                    <h3>{{ $megatriviaAnswers->count() }}
                                                                                    </h3>
                                                                                    <p>Total Users Answered MegaTrivia
                                                                                    </p>
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
                                                        <div class="tab-pane fade"
                                                            id="custom-content-above-all-megatrivia" role="tabpanel"
                                                            aria-labelledby="custom-content-above-all-megatrivia-tab">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Site</th>
                                                                                <th>Viewer</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($metrics->where('action', 'All Megatrivia') as $metric)
                                                                                <tr>
                                                                                    <td>{{ $metric->id }}</td>
                                                                                    <td>{{ $metric->action }}</td>
                                                                                    <td>{{ $metric->user }}</td>
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
                                                                                    <h3>{{ $metrics->where('action', 'All Megatrivia')->count() }}
                                                                                    </h3>
                                                                                    <p>Total Viewed previous MegaTrivia
                                                                                        Questions</p>
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
                <form action="/main/conversionRate" method="GET">
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
