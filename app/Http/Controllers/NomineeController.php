<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;

use DB;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nominees = Nominee::whereNotNull('name')
            ->get();

        $topEmployee = Nominee::select(DB::raw('COUNT(*) as nomineeCount, name, department'))
            ->whereNotNull('name')
            ->where('created_at', '>=', '2025-03-10 00:00:00')
            ->orderBy('nomineeCount', 'DESC')
            ->groupBy('name')
            ->get();


        return view('pages.admin.individual-nomination')
            ->withNominees($nominees)
            ->withTopEmployee($topEmployee);
    }

    public function team()
    {
        $nominees = Nominee::whereNull('name')
            ->get();

        return view('pages.admin.team-nomination')
            ->withNominees($nominees);
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
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominee $nominee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        //
    }
}
