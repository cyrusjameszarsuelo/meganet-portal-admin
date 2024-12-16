<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MegagoodVibe;
// use App\Models\Megagoodvibes_Likes;
// use App\Models\Megagoodvibes_Comments;
use MsGraph;



class MegagoodVibesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $megaGoodVibes = MegagoodVibe::all();

        return view('pages.admin.view-all-megagoodvibes')
            ->withMegaGoodVibes($megaGoodVibes);
    }

    public function create($id = null)
    {
        $megaGoodVibes = MegagoodVibe::find($id);

        return view('pages.admin.manageMegagoodvibes')
            ->withMegaGoodVibes($megaGoodVibes);
    }

    public function store(Request $request)
    {
        $megaGoodVibes = new MegagoodVibe;

        $megaGoodVibes->content = $request->content;
        if($request->created_at) {
            $megaGoodVibes->created_at = $request->created_at;
        }

        if ($request->hasFile('file')) {

            // $filename = cloudinary()->uploadVideo($request->file('file')->getRealPath(), [
            // 'folder' => 'videos'
            // ])->getSecurePath();

            $filename = $request->file;
            $filenameVideo = date('YmdHis'). '.' . $request->file->extension();
            $filename->move(public_path('/uploads/MegaGoodVibes-Videos'), $filenameVideo);

        } else {
            $filenameVideo = '';
        }

        $thumbnail = $request->thumbnail;
        $filenameImage = date('YmdHis'). '.' . $request->thumbnail->extension();
        $thumbnail->move(public_path('/uploads/MegaGoodVibes-Thumbnail'), $filenameImage);
        // $thumbnail = cloudinary()->upload($request->file('thumbnail')->getRealPath())->getSecurePath();


        $megaGoodVibes->file = $filenameVideo;
        $megaGoodVibes->thumbnail = $filenameImage;

        $megaGoodVibes->save();
        

        return redirect('/main/view-all-megagoodvibes');
    }

    public function update(Request $request, $id)
    {
        $megaGoodVibes = MegagoodVibe::find($id);

        $megaGoodVibes->content = $request->content;
        if($request->created_at) {
            $megaGoodVibes->created_at = $request->created_at;
        }

        if ($request->hasFile('file')) {

            $filename = cloudinary()->uploadVideo($request->file('file')->getRealPath(), [
            'folder' => 'videos'
            ])->getSecurePath();


            $megaGoodVibes->file = $filename;

        }

        if ($request->hasFile('thumbnail')) {

            $thumbnail = cloudinary()->upload($request->file('thumbnail')->getRealPath())->getSecurePath();

            $megaGoodVibes->thumbnail = $thumbnail;

        }


        $megaGoodVibes->save();
        

        return redirect('/main/view-all-megagoodvibes');
    }

    public function destroy($id)
    {
        $megaGoodVibes = MegagoodVibe::find($id);

        $megaGoodVibes->delete();

        return redirect()->back();
    }

}
