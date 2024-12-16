<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteVisitor;
use DB;
use Carbon\Carbon;


class SiteVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filter) {
            
            if ($request->filter == 'Weekly') {
                $now = Carbon::now();
                $start = $now->startOfWeek()->format('Y-m-d H:i');
                $end = $now->endOfWeek()->format('Y-m-d H:i');
                $websiteVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', 'homepage')
                 ->groupBy('name')
                 ->get();
            } else if ($request->filter == 'Monthly') {
                $now = Carbon::now();
                $start = $now->startOfMonth()->format('Y-m-d H:i');
                $end = $now->endOfMonth()->format('Y-m-d H:i');
                $websiteVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', 'homepage')
                 ->groupBy('name')
                 ->get();
            } else if ($request->filter == 'Reset') {
                $websiteVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('purpose', 'homepage')
                 ->groupBy('name')
                 ->get();

                 return view('pages.admin.visitorsWebsite')
                ->withWebsiteVisitors($websiteVisitors);
            } else {
                $explodedDate = explode('-',$request->filter);
                $start = Carbon::parse($explodedDate[0])->format('Y-m-d');
                $end = Carbon::parse($explodedDate[1])->format('Y-m-d');

                $websiteVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', 'homepage')
                 ->groupBy('name')
                 ->get();
            }
        } else {
            $websiteVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('purpose', 'homepage')
                 ->groupBy('name')
                 ->get();
        }
        

        return view('pages.admin.visitorsWebsite')
            ->withWebsiteVisitors($websiteVisitors);
    }

    public function view(Request $request)
    {
        if ($request->filter) {
            
            if ($request->filter == 'Weekly') {
                $now = Carbon::now();
                $start = $now->startOfWeek()->format('Y-m-d H:i');
                $end = $now->endOfWeek()->format('Y-m-d H:i');
                $corporateVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', '<>', 'homepage')
                 ->groupBy('name', 'purpose')
                 ->get();
            } else if ($request->filter == 'Monthly') {
                $now = Carbon::now();
                $start = $now->startOfMonth()->format('Y-m-d H:i');
                $end = $now->endOfMonth()->format('Y-m-d H:i');
                $corporateVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', '<>', 'homepage')
                 ->groupBy('name', 'purpose')
                 ->get();
            } else if ($request->filter == 'Reset') {
                $corporateVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('purpose', '<>', 'homepage')
                 ->groupBy('name', 'purpose')
                 ->get();

                 return view('pages.admin.visitorsWebsite')
                ->withCorporateVisitors($corporateVisitors);
            } else {
                $explodedDate = explode('-',$request->filter);
                $start = Carbon::parse($explodedDate[0])->format('Y-m-d');
                $end = Carbon::parse($explodedDate[1])->format('Y-m-d');

                $corporateVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('created_at', '>=', $start)
                 ->where('created_at', '<=', $end)
                 ->where('purpose', '<>', 'homepage')
                 ->groupBy('name', 'purpose')
                 ->get();
            }
        } else {
            $corporateVisitors = DB::table('site_visitor')
                 ->select('*', DB::raw('count(*) as no_of_visits'))
                 ->where('purpose', '<>', 'homepage')
                 ->groupBy('name', 'purpose')
                 ->get();
        }

        return view('pages.admin.visitorsCorporate')
            ->withCorporateVisitors($corporateVisitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
