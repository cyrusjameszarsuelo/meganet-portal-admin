@extends('manageSiteTemplate')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Engagement</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/main') }}">Home</a></li>
                            <li class="breadcrumb-item active">Engagement</li>
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
                                    Engagement
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
                                                    <h4 class="mt-3 ">No. of users who liked and commented on:</h4>
                                                    <br>

                                                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active"
                                                                id="custom-content-above-megagood-vibes-tab"
                                                                data-toggle="pill"
                                                                href="#custom-content-above-megagood-vibes" role="tab"
                                                                aria-controls="custom-content-above-megagood-vibes"
                                                                aria-selected="true">MegaGood Vibes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-meganews-tab"
                                                                data-toggle="pill" href="#custom-content-above-meganews"
                                                                role="tab" aria-controls="custom-content-above-meganews"
                                                                aria-selected="false">MegaNews</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-content-above-banner-tab"
                                                                data-toggle="pill" href="#custom-content-above-banner"
                                                                role="tab" aria-controls="custom-content-above-banner"
                                                                aria-selected="false">Banner</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Intranet Analytics</p>
                                                    </div>
                                                    <div class="tab-content p-3" id="custom-content-above-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="custom-content-above-megagood-vibes" role="tabpanel"
                                                            aria-labelledby="custom-content-above-megagood-vibes-tab">

                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Content</th>
                                                                                <th>Likes</th>
                                                                                <th>Comments</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($megaGoodVibes as $megaGoodVibe)
                                                                                <tr>
                                                                                    <td>{{ $megaGoodVibe->id }}</td>
                                                                                    <td>{{ strip_tags($megaGoodVibe->content) }}
                                                                                    </td>
                                                                                    <td>{{ $megaGoodVibe->megagoodVibeLikes->count() }}
                                                                                    </td>
                                                                                    <td>{{ $megaGoodVibe->megagoodVibeComments->count() }}
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
                                                                                    <h3>{{ $megagoodVibesLikes->count() }}
                                                                                    </h3>
                                                                                    <p>Total Likes in MegaGood Vibes</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="small-box bg-success">
                                                                                <div class="inner">
                                                                                    <h3>{{ $megagoodVibesComments->count() }}
                                                                                    </h3>
                                                                                    <p>Total Comments in MegaGood Vibes</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-comment"></i>
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
                                                                                <th>Title</th>
                                                                                <th>Likes</th>
                                                                                <th>Comments</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($meganews as $meganewsData)
                                                                                <tr>
                                                                                    <td>{{ $meganewsData->id }}</td>
                                                                                    <td>{{ $meganewsData->title }}</td>
                                                                                    <td>{{ $meganewsData->meganewsLikes->count() }}
                                                                                    </td>
                                                                                    <td>{{ $meganewsData->meganewsComments->count() }}
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
                                                                                    <h3>{{ $meganewsLikes->count() }}</h3>
                                                                                    <p>Total Likes in MegaNews</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="small-box bg-success">
                                                                                <div class="inner">
                                                                                    <h3>{{ $meganewsComments->count() }}
                                                                                    </h3>
                                                                                    <p>Total Comments in MegaNews</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-comment"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-content-above-banner"
                                                            role="tabpanel"
                                                            aria-labelledby="custom-content-above-banner-tab">

                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <table id="example1"
                                                                        class="table table-bordered table-striped tableUsage">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Content</th>
                                                                                <th>Likes</th>
                                                                                <th>Comments</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($bannerQuestions as $bannerQuestion)
                                                                                <tr>
                                                                                    <td>{{ $bannerQuestion->id }}</td>
                                                                                    <td>{{ strip_tags($bannerQuestion->question) }}
                                                                                    </td>
                                                                                    <td>{{ $bannerQuestion->bannerQuestionLikes->count() }}
                                                                                    </td>
                                                                                    <td>{{ $bannerQuestion->bannerQuestionComments->count() }}
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
                                                                                    <h3>{{ $bannerQuestionLikes->count() }}
                                                                                    </h3>
                                                                                    <p>Total Likes in Banner Comments</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="small-box bg-success">
                                                                                <div class="inner">
                                                                                    <h3>{{ $bannerQuestionComments->count() }}
                                                                                    </h3>
                                                                                    <p>Total Comments in Banner</p>
                                                                                </div>
                                                                                <div class="icon">
                                                                                    <i class="fa-solid fa-comment"></i>
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
                <form action="/main/engagement" method="GET">
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
