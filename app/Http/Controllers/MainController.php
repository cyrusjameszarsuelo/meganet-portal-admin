<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\CorporateOffice;
use App\Models\Meganews;
use App\Models\MeganewsLike;
use App\Models\MeganewsComment;
use App\Models\MegagoodVibe;
use App\Models\MegagoodVibesLike;
use App\Models\MegagoodVibesComment;
use App\Models\BannerQuestion;
use App\Models\BannerQuestionComment;
use App\Models\BannerQuestionLike;
use App\Models\MegatriviaAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use MsGraph;
use DateTime;
use DB;
use \Carbon\Carbon;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerQuestions = BannerQuestion::all();

        return view('pages.admin.view-all-bannerQuestions')
            ->withBannerQuestions($bannerQuestions);
    }


    public function create($id = null)
    {
        $bannerQuestions = BannerQuestion::find($id);

        return view('pages.admin.manageBannerQuestions')
            ->withBannerQuestions($bannerQuestions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bannerQuestion = new BannerQuestion;

        // if ($request->hasFile('image')) {
        //     $filename = cloudinary()->upload(request()->image->getRealPath())->getSecurePath();
        // } else {
        //     $filename = '';
        // }

        if ($request->hasFile('image')) {

            // $filename = cloudinary()->uploadVideo($request->file('file')->getRealPath(), [
            // 'folder' => 'videos'
            // ])->getSecurePath();

            $filename = $request->file;
            $filenameVideo = date('YmdHis') . '.' . $request->file->extension();
            $filename->move(public_path('/uploads/Banner'), $filenameVideo);

        } else {
            $filenameVideo = '';
        }

        $bannerQuestion->title = $request->title;
        $bannerQuestion->question = $request->question;
        $bannerQuestion->image = $filenameVideo;

        $bannerQuestion->save();

        return redirect('/main/view-all-bannerQuestions');
    }

    public function usage()
    {
        // $_GET['dateRange'];
        if (isset($_GET['dateRange'])) {
            list($date1, $date2) = explode(' - ', $_GET['dateRange']);
        } else {
            $date1 = '';
            $date2 = '';
        }

        $metrics = Metric::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->groupBy('user')
            ->get();

        $corporateOffices = CorporateOffice::all();

        return view('pages.admin.usage')
            ->withCorporateOffices($corporateOffices)
            ->withMetrics($metrics);
    }

    public function conversionRate()
    {

        if (isset($_GET['dateRange'])) {
            list($date1, $date2) = explode(' - ', $_GET['dateRange']);
        } else {
            $date1 = '';
            $date2 = '';
        }

        $metricAllMeganews = Metric::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->where('action', 'Meganews')
            ->whereNotNull('action_val')
            ->groupBy('user', 'action_val')
            ->get();

        // dd($metrics->where('action', 'Meganews')->whereNotNull('action_val')->groupBy('user'));


        $megatriviaAnswers = MegatriviaAnswer::orderBy('created_at', 'DESC')
            ->groupBy('user', 'megatrivia_id')
            ->where(function ($query) use ($date1, $date2) {
                if ($date1) {
                    $query->where('created_at', '>=', $date1 . ' 00:00:00');
                    $query->where('created_at', '<=', $date2 . ' 23:59:59');
                }
            })
            ->get();

        $metricMeganews = Metric::select(DB::raw('count(*) as totalVisitor'), 'm.title as title')
            ->leftJoin('meganews as m', 'm.id', '=', 'metrics.action_val')
            ->where(function ($query) use ($date1, $date2) {
                if ($date1) {
                    $query->where('metrics.created_at', '>=', $date1 . ' 00:00:00');
                    $query->where('metrics.created_at', '<=', $date2 . ' 23:59:59');
                }
            })
            ->where('action', 'Meganews')
            ->whereNotNull('action_val')
            ->groupBy('action_val')
            ->get();

        $meganewsGroups = Metric::select('*', DB::raw('count(*) as totalVisitor'), DB::raw('count(m.id) as `data`'), DB::raw("DATE_FORMAT(m.created_at, '%m-%Y') new_date"), DB::raw('YEAR(m.created_at) year, MONTH(m.created_at) month'))
            ->leftJoin('meganews as m', 'm.id', '=', 'metrics.action_val')
            ->where(function ($query) use ($date1, $date2) {
                if ($date1) {
                    $query->where('metrics.created_at', '>=', $date1 . ' 00:00:00');
                    $query->where('metrics.created_at', '<=', $date2 . ' 23:59:59');
                }
            })
            ->where('action', 'Meganews')
            ->whereNotNull('action_val')
            ->groupby('year', 'month')
            ->get();

        $metrics = Metric::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        return view('pages.admin.conversionRate')
            ->withMetricAllMeganews($metricAllMeganews)
            ->withMetrics($metrics)
            ->withMetricMeganews($metricMeganews)
            ->withMeganewsGroups($meganewsGroups)
            ->withMegatriviaAnswers($megatriviaAnswers);
    }

    public function engagement()
    {
        if (isset($_GET['dateRange'])) {
            list($date1, $date2) = explode(' - ', $_GET['dateRange']);
        } else {
            $date1 = '';
            $date2 = '';
        }

        $meganewsLikes = MeganewsLike::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $meganewsComments = MeganewsComment::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $megagoodVibesLikes = MegagoodVibesLike::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $megagoodVibesComments = MegagoodVibesComment::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $bannerQuestionComments = BannerQuestionComment::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $bannerQuestionLikes = BannerQuestionLike::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $megaGoodVibes = MegagoodVibe::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $meganews = Meganews::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();

        $bannerQuestions = BannerQuestion::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->get();


        return view('pages.admin.engagement')
            ->withMeganews($meganews)
            ->withMeganewsLikes($meganewsLikes)
            ->withMeganewsComments($meganewsComments)
            ->withMegaGoodVibes($megaGoodVibes)
            ->withMegagoodVibesLikes($megagoodVibesLikes)
            ->withMegagoodVibesComments($megagoodVibesComments)
            ->withBannerQuestions($bannerQuestions)
            ->withBannerQuestionComments($bannerQuestionComments)
            ->withBannerQuestionLikes($bannerQuestionLikes);


    }

    public function totalVisits()
    {
        if (isset($_GET['dateRange'])) {
            list($date1, $date2) = explode(' - ', $_GET['dateRange']);
        } else {
            $date1 = '';
            $date2 = '';
        }

        $users = User::where(function ($query) use ($date1, $date2) {
            if ($date1) {
                $query->where('created_at', '>=', $date1 . ' 00:00:00');
                $query->where('created_at', '<=', $date2 . ' 23:59:59');
            }
        })
            ->groupBy('email')
            ->get();

        // $users = User::all();
        $usersMonth = User::where('created_at', 'LIKE', '%' . date('Y-m') . '%')
            ->groupBy('email')
            ->get();

        $usersDay = User::where('created_at', 'LIKE', '%' . date('Y-m-d') . '%')
            ->groupBy('email')
            ->get();

        return view('pages.admin.view-all-total-visits')
            ->withUsers($users)
            ->withUsersDay($usersDay)
            ->withUsersMonth($usersMonth);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bannerQuestion = BannerQuestion::find($id);

        if ($request->hasFile('image')) {
            $filename = cloudinary()->upload(request()->image->getRealPath())->getSecurePath();
            $bannerQuestion->image = $filename;
        }

        $bannerQuestion->title = $request->title;
        $bannerQuestion->question = $request->question;

        $bannerQuestion->save();

        return redirect('/main/view-all-bannerQuestions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannerQuestion = BannerQuestion::find($id);

        $bannerQuestion->delete();

        return redirect()->back();
    }
}
