<?php

namespace App\Http\Controllers;

use App\Models\Megaproject;
use Illuminate\Http\Request;

class MegaprojectSegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $megaprojectSegment = Megaproject::all();

        return view('pages.admin.view-all-megaprojectsegments')
            ->withMegaprojectSegment($megaprojectSegment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $megaprojectSegment = Megaproject::find($id);
        
        return view('pages.admin.manageMegaprojectSegment')
            ->withMegaprojectSegment($megaprojectSegment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $megaprojectSegment = new Megaproject();
        $megaprojectSegment->segments = $request->segments;
        $megaprojectSegment->save();

        return redirect('main/view-all-megaprojectsegments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MegaprojectSegment  $megaprojectSegment
     * @return \Illuminate\Http\Response
     */
    public function show(MegaprojectSegment $megaprojectSegment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MegaprojectSegment  $megaprojectSegment
     * @return \Illuminate\Http\Response
     */
    public function edit(MegaprojectSegment $megaprojectSegment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MegaprojectSegment  $megaprojectSegment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $megaprojectSegment = Megaproject::find($id);

        $megaprojectSegment->segments = $request->segments;
        $megaprojectSegment->save();

        return redirect('main/view-all-megaprojectsegments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MegaprojectSegment  $megaprojectSegment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $megaprojectSegment = Megaproject::find($id);
        $megaprojectSegment->delete();

        return redirect('main/view-all-megaprojectsegments');

    }
}
