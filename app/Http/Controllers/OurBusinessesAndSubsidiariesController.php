<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurBusinessesAndSubsidiary;

class OurBusinessesAndSubsidiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourBas = OurBusinessesAndSubsidiary::all();

        return view('pages/admin/view-all-our-businesses-and-subsidiaries')
            ->withOurBas($ourBas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $ourBas = OurBusinessesAndSubsidiary::find($id);

        return view('pages/admin/manageOurBusinessesAndSubsidiaries')
            ->withOurBas($ourBas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ourBas = new OurBusinessesAndSubsidiary;
        
        $ourBas->name = $request->name;

        $filename = $request->image;
        $filenameImage = date('YmdHis') . '.' . $request->image->extension();
        $filename->move(public_path('/uploads/Our-Businesses-and-Subsidiaries'), $filenameImage);

        $ourBas->image = $filenameImage;
   
        $ourBas->save();


        return redirect('/main/view-all-our-businesses-and-subsidiaries');
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
        $ourBas = OurBusinessesAndSubsidiary::find($id);
        
        $ourBas->name = $request->name;
        
        if($request->image) {
            $filename = $request->image;
            $filenameImage = date('YmdHis') . '.' . $request->image->extension();
            $filename->move(public_path('/uploads/Our-Businesses-and-Subsidiaries'), $filenameImage);

            $ourBas->image = $filenameImage;
        }

        $ourBas->save();


        return redirect('/main/view-all-our-businesses-and-subsidiaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourBas = OurBusinessesAndSubsidiary::find($id);

        $ourBas->delete();

        return redirect()->back();
    }
}
