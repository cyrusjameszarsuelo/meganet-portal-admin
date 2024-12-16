<?php

namespace App\Http\Controllers;

use App\Models\Meganews;
use App\Models\MeganewsImage;
use App\Models\Megatrivia;
use Illuminate\Http\Request;
use MsGraph;


class MeganewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $meganews = Meganews::with(['meganews_images'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.admin.view-all-meganews')
            ->withMeganews($meganews);
    }

    public function store(Request $request)
    {
        $meganews = new Meganews;
        
        $meganews->title = $request->title;
        $meganews->content = $request->content;
        if($request->created_at) {
            $meganews->created_at = $request->created_at;
        }

        $meganews->save();

        if ($request->hasFile('image')) {

            foreach ($request->image as $key => $image) {

                // $filename = cloudinary()->upload($image->getRealPath())->getSecurePath();

                $filename = $image;
                $filenameImage = date('YmdHis'). $key . '.' . $image->extension();
                $filename->move(public_path('/uploads/Meganews-Images'), $filenameImage);

                $meganews_image = new MeganewsImage;

                $meganews_image->meganews_id = $meganews->id;
                $meganews_image->image = $filenameImage;

                $meganews_image->save();

                
            }
            
        } else {
            $filename = '';
        }


        return redirect('/main/view-all-meganews');
    }

    public function update(Request $request, meganews $meganews, $id)
    {
        $meganews = Meganews::find($id);

        $meganews->title = $request->title;
        $meganews->content = $request->content;

        if($request->created_at) {
            $meganews->created_at = $request->created_at;
        }

        $meganews->save();

        if ($request->hasFile('image')) {

            $deleteMeganewsImages = MeganewsImage::where('meganews_id', $id);

            $deleteMeganewsImages->delete();

            foreach (request()->image as $key => $image) {

                $filename = cloudinary()->upload($image->getRealPath())->getSecurePath();

                $meganews_image = new MeganewsImage;

                $meganews_image->meganews_id = $meganews->id;
                $meganews_image->image = $filename;

                $meganews_image->save();
            }
            
        } else {
            $filename = '';
        }

        return redirect('/main/view-all-meganews');
    }

    public function managemeganews($id = null) 
    {

        $meganewsDataId = Meganews::find($id);

        return view('pages.admin.manageMeganews')
            ->withMeganewsDataId($meganewsDataId);
    }

    public function destroy($id)
    {
        $meganews = Meganews::find($id);

        $meganews->delete();

        return redirect()->back();
    }
}
