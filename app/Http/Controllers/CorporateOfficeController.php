<?php

namespace App\Http\Controllers;

use App\Models\CorporateOffice;
use Illuminate\Http\Request;

class CorporateOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporateOffice = CorporateOffice::all();

        return view('pages.admin.view-all-corporateoffice')
            ->withCorporateOffice($corporateOffice);
    }

    public function create($id = null)
    {   
        $corporateOffice = CorporateOffice::find($id);

        return view('pages.admin.manageCorporateOffice')
            ->withCorporateOffice($corporateOffice);
    }

    public function store(Request $request)
    {
        $corporate_office = new CorporateOffice;

        if ($request->hasFile('organizational_structure')) {
            $filename = cloudinary()->upload(request()->organizational_structure->getRealPath())->getSecurePath();
        } else {
            $filename = '';
        }

        $corporate_office->department = $request->department;
        $corporate_office->organizational_structure = $filename;

        $corporate_office->save();

        return redirect('/main/view-all-corporateoffice');
    }

    public function update(Request $request, CorporateOffice $corporate_Office, $id)
    {
        $corporate_office = CorporateOffice::find($id);

        if ($request->hasFile('organizational_structure')) {
            $filename = cloudinary()->upload(request()->organizational_structure->getRealPath())->getSecurePath();
            $corporate_office->organizational_structure = $filename;
        }

        $corporate_office->department = $request->department;

        $corporate_office->save();

        return redirect('/main/view-all-corporateoffice');
    }

    public function destroy(CorporateOffice $corporate_Office, $id)
    {
        $corporateOffice = CorporateOffice::find($id);

        $corporateOffice->delete();

        return redirect()->back();
    }

}
