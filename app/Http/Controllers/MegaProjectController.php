<?php

namespace App\Http\Controllers;

use App\Models\Megaproject;
use App\Models\MegaprojectSegment;
use App\Models\MegaprojectSegmentImage;
use Illuminate\Http\Request;

class MegaProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $megaprojects = Megaproject::all();
        $segments = MegaprojectSegment::all();

        return view('pages.admin.view-all-megaprojects')
            ->withMegaprojects($megaprojects)
            ->withSegments($segments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $megaprojectDetails = MegaprojectSegment::find($id);
        $megaprojects = Megaproject::all();

        return view('pages.admin.manageMegaprojects')
            ->withMegaprojects($megaprojects)
            ->withMegaprojectDetails($megaprojectDetails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $megaprojectSegment = new MegaprojectSegment;

        $megaprojectSegment->title = $request->title;
        $megaprojectSegment->megaproject_id = $request->megaproject_id;
        $megaprojectSegment->details = $request->details;

        $megaprojectSegment->save();
        
        if ($request->hasFile('image')) {

            // $deleteMegaprojectsImages = MegaprojectSegmentImage::where('megaproject_segment_id', $id);

            // $deleteMegaprojectsImages->delete();

            foreach (request()->image as $key => $image) {

                $filename = cloudinary()->upload($image->getRealPath())->getSecurePath();

                $megaprojectSegmentImages = new MegaprojectSegmentImage;

                $megaprojectSegmentImages->megaproject_segment_id = $megaprojectSegment->id;
                $megaprojectSegmentImages->image = $filename;

                $megaprojectSegmentImages->save();
            }
            
        } else {
            $filename = '';
        }

        return redirect('/main/view-all-megaprojects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Megaproject  $megaproject
     * @return \Illuminate\Http\Response
     */
    public function show(Megaproject $megaproject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Megaproject  $megaproject
     * @return \Illuminate\Http\Response
     */
    public function edit(Megaproject $megaproject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Megaproject  $megaproject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Megaproject $megaproject, $id)
    {
        $megaprojectSegment = MegaprojectSegment::find($id);

        $megaprojectSegment->title = $request->title;
        $megaprojectSegment->megaproject_id = $request->megaproject_id;
        $megaprojectSegment->details = $request->details;

        $megaprojectSegment->save();
        
        if ($request->hasFile('image')) {

            $deleteMegaprojectsImages = MegaprojectSegmentImage::where('megaproject_segment_id', $id);

            $deleteMegaprojectsImages->delete();

            foreach (request()->image as $key => $image) {

                $filename = cloudinary()->upload($image->getRealPath())->getSecurePath();

                $megaprojectSegmentImages = new MegaprojectSegmentImage;

                $megaprojectSegmentImages->megaproject_segment_id = $megaprojectSegment->id;
                $megaprojectSegmentImages->image = $filename;

                $megaprojectSegmentImages->save();
            }
            
        } else {
            $filename = '';
        }

        return redirect('/main/view-all-megaprojects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Megaproject  $megaproject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Megaproject $megaproject, $id)
    {
        $megaproject = MegaprojectSegment::find($id);

        $megaproject->delete();

        return redirect()->back();
    }
}
