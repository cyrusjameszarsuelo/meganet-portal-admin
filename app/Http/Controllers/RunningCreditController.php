<?php

namespace App\Http\Controllers;
use App\Models\RunningCredit;
use Illuminate\Http\Request;
use MsGraph;

class RunningCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runningCredits = RunningCredit::all();

        return view('pages.admin.view-all-runningCredits')
            ->withRunningCredits($runningCredits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $runningCredits = RunningCredit::find($id);

        return view('pages.admin.manageRunningCredits')
            ->withRunningCredits($runningCredits);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = MsGraph::contacts()->get();

        $runningCredits = new RunningCredit;

        $runningCredits->content = $request->content; 
        $runningCredits->user = $user['contacts']['displayName']; 

        $runningCredits->save();

        return redirect('main/view-all-runningCredits');
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
        $user = MsGraph::contacts()->get();

        $runningCredits = RunningCredit::find($id);

        $runningCredits->content = $request->content; 
        $runningCredits->user = $user['contacts']['displayName']; 

        $runningCredits->save();

        return redirect('main/view-all-runningCredits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $runningCredits = RunningCredit::find($id);

        $runningCredits->delete();

        return redirect('main/view-all-runningCredits');
    }
}
