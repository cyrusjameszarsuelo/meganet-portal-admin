<?php

namespace App\Http\Controllers;

use App\Models\SiglaNominee;
use Illuminate\Http\Request;

class SiglaNomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $siglaNominee = new SiglaNominee;

        $siglaNominee->name = $request->name;
        $siglaNominee->email = $request->email;

        $siglaNominee->save();

        return redirect('/main/award');
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
        $siglaNominee = SiglaNominee::find($id);
        
        $siglaNominee->name = $request->name;
        $siglaNominee->email = $request->email;

        $siglaNominee->save();

        return redirect('/main/award');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siglaNominee = SiglaNominee::find($id);
        $siglaNominee->delete();

        return redirect('/main/award');
    }
}
