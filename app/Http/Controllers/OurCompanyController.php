<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurCompany;

class OurCompanyController extends Controller
{
    public function index() {

        $ourCompany = OurCompany::all();

        return view('pages/admin/view-all-our-company')
            ->withOurCompany($ourCompany);

    }

    public function create($id = null) {
        
        $ourCompany = ourCompany::find($id);

        return view('pages/admin/manageOurCompany')
            ->withOurCompany($ourCompany);
    }

    public function store(Request $request) {

        $ourCompany = new OurCompany();

        $ourCompany->content = $request->content;

        $ourCompany->save();

        return redirect('main/view-all-our-companies');

    } 

    public function update(Request $request, $id) {

        $ourCompany = OurCompany::find($id);

        $ourCompany->content = $request->content;

        $ourCompany->save();

        return redirect('main/view-all-our-companies');

    }

    public function destroy($id) {

        $ourCompany = OurCompany::find($id);

        $ourCompany->delete();

        return redirect('main/view-all-our-companies');

    }
}
