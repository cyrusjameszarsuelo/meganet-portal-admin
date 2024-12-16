<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Megatrivia;
use MsGraph;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

class MegatriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $megatrivia = Megatrivia::all();

        return view('pages.admin.view-all-megatrivia')
            ->withMegatrivia($megatrivia);
    }

    public function create($id = null)
    {
        $megatrivia = Megatrivia::find($id);

        return view('pages.admin.manageMegatrivia')
            ->withMegatrivia($megatrivia);
    }

    public function store(Request $request)
    {

        $megatrivia_active = Megatrivia::where('is_active', 1)->get();

        foreach ($megatrivia_active as $key => $active) {

            $active->is_active = 0;

            $active->save();
        }


        $megatrivia = new Megatrivia;

        $image = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        $megatrivia->title = $request->title;
        $megatrivia->image = $image;
        $megatrivia->answer = $request->answer;
        $megatrivia->content = $request->content;
        $megatrivia->is_active = ($request->active == 'on') ? 1 : 0;

        $megatrivia->save();

        return redirect('/main/view-all-megatrivia');
    }

    public function update(Request $request, $id)
    {
        $megatrivia_active = Megatrivia::where('is_active', 1)->get();

        foreach ($megatrivia_active as $key => $active) {

            $active->is_active = 0;

            $active->save();
        }

        $megatrivia = Megatrivia::find($id);

        if($request->file('image')) {
            $image = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $megatrivia->image = $image;
        }

        $megatrivia->title = $request->title;
        $megatrivia->answer = $request->answer;
        $megatrivia->content = $request->content;
        $megatrivia->is_active = ($request->active == 'on') ? 1 : 0;

        $megatrivia->save();

        return redirect('/main/view-all-megatrivia');
    }

    public function destroy($id)
    {
        $megaTrivia = Megatrivia::find($id);

        $megaTrivia->delete();

        return redirect()->back();
    }

}
