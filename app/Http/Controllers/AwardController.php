<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\SiglaDepartment;
use App\Models\SiglaNominee;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siglaAwards = Award::all();
        $siglaDepartments = SiglaDepartment::all();
        $siglaNominees = SiglaNominee::all();


        return view('pages.admin.sigla-award')
            ->withSiglaNominees($siglaNominees)
            ->withSiglaDepartments($siglaDepartments)
            ->withSiglaAwards($siglaAwards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.manageSiglaAwards');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siglaAwardsContent = new Award;

        $siglaAwardsContent->content = $request->content;

        $thumbnail = $request->image;
        $filenameImage = date('YmdHis') . '.' . $request->image->extension();
        $thumbnail->move(public_path('/uploads/sigla-awards-image'), $filenameImage);

        $thumbnail2 = $request->bgImage;
        $filenameImage2 = date('YmdHis') . '.' . $request->bgImage->extension();
        $thumbnail2->move(public_path('/uploads/sigla-awards-image'), $filenameImage2);


        $siglaAwardsContent->image = $filenameImage;
        $siglaAwardsContent->bgImage = $filenameImage2;

        $siglaAwardsContent->save();

        return redirect('/main/award');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view('pages.admin.manageSiglaAwards')
            ->withAward($award);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {

        $award->content = $request->content;

        // $thumbnail = $request->image;
        // $filenameImage = date('YmdHis'). '.' . $request->image->extension();
        // $thumbnail->move(public_path('/uploads/sigla-awards-image'), $filenameImage);


        // $award->image = $filenameImage;

        $award->save();

        return redirect('/main/award');
    }

    public function updateNominee(Request $request, $id = null)
    {
        $siglaNominee = SiglaNominee::find($id);

        return view('pages.admin.manageNominee')
            ->withSiglaNominee($siglaNominee);
    }

    public function updateDepartment(Request $request, $id = null)
    {
        $siglaDepartment = SiglaDepartment::find($id);

        return view('pages.admin.manageDepartment')
            ->withSiglaDepartment($siglaDepartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        //
    }
}
