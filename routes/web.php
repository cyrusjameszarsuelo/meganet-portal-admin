<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\SiglaDepartmentController;
use App\Http\Controllers\SiglaNomineeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeganewsController;
use App\Http\Controllers\MegatriviaController;
use App\Http\Controllers\MegagoodVibesController;
use App\Http\Controllers\MegaProjectController;
use App\Http\Controllers\MegaprojectSegmentController;
use App\Http\Controllers\CorporateOfficeController;
use App\Http\Controllers\RunningCreditController;
use App\Http\Controllers\OurBusinessesAndSubsidiariesController;
use App\Http\Controllers\OurCompanyController;
use Dcblogdev\MsGraph\Models\MsGraphToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest'], 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated']], function () {

    // Meganews Controller
    Route::get('main/view-all-meganews', [MeganewsController::class, 'index']);
    Route::get('main/view-all-meganews/manageMeganews/{id?}', [MeganewsController::class, 'managemeganews']);

    Route::post('/manageMeganews', [MeganewsController::class, 'store']);
    Route::put('/manageMeganewsUpdate/{id}', [MeganewsController::class, 'update']);
    Route::post('/removeMeganews/{id}', [MeganewsController::class, 'destroy']);


    // Megatrivia Controller
    Route::get('/main/view-all-megatrivia', [MegatriviaController::class, 'index']);
    Route::get('main/view-all-megatrivia/manageMegatrivia/{id?}', [MegatriviaController::class, 'create']);

    Route::post('/manageMegatrivia', [MegatriviaController::class, 'store']);
    Route::put('/manageMegatriviaUpdate/{id}', [MegatriviaController::class, 'update']);
    Route::post('/removeMegatrivia/{id}', [MegatriviaController::class, 'destroy']);


    // MegagoodVibes Controller
    Route::get('main/view-all-megagoodvibes', [MegagoodVibesController::class, 'index']);
    Route::get('main/view-all-megagoodvibes/manageMegagoodvibes/{id?}', [MegagoodVibesController::class, 'create']);

    Route::post('/manageMegagoodVibes', [MegagoodVibesController::class, 'store']);
    Route::put('/manageMegagoodVibes/{id}', [MegagoodVibesController::class, 'update']);
    Route::post('/removeMegaGoodVibes/{id}', [MegagoodVibesController::class, 'destroy']);

    // MegaProject Controller
    Route::get('main/view-all-megaprojects', [MegaProjectController::class, 'index']);
    Route::get('/main/view-all-megaprojects/manageMegaprojects/{id?}', [MegaProjectController::class, 'create']);

    Route::post('/manageMegaprojects', [MegaProjectController::class, 'store']);
    Route::put('/manageMegaprojectsUpdate/{id}', [MegaProjectController::class, 'update']);
    Route::post('/removeMegaproject/{id}', [MegaProjectController::class, 'destroy']);

    // MegaprojectSegment Controller
    Route::get('main/view-all-megaprojectsegments', [MegaprojectSegmentController::class, 'index']);
    Route::get('main/view-all-megaprojectsegments/manageMegaprojectsegments/{id?}', [MegaprojectSegmentController::class, 'create']);

    Route::post('/manageMegaprojectsegments', [MegaprojectSegmentController::class, 'store']);
    Route::put('/manageMegaprojectsegmentsUpdate/{id}', [MegaprojectSegmentController::class, 'update']);
    Route::post('/removeMegaprojectsegment/{id}', [MegaprojectSegmentController::class, 'destroy']);


    // CorporateOffice Controller
    Route::get('/main/view-all-corporateoffice', [CorporateOfficeController::class, 'index']);
    Route::get('/main/view-all-corporateoffice/manageCorporateoffice/{id?}', [CorporateOfficeController::class, 'create']);

    Route::post('/manageCorporateoffice', [CorporateOfficeController::class, 'store']);
    Route::put('/manageCorporateoffice/{id}', [CorporateOfficeController::class, 'update']);
    Route::post('/removeCorporateOffice/{id}', [CorporateOfficeController::class, 'destroy']);


    // Main Controller
    Route::get('main/view-all-bannerQuestions', [MainController::class, 'index']);
    Route::get('main/view-all-bannerQuestions/manageBannerQuestion/{id?}', [MainController::class, 'create']);
    Route::get('main/usage', [MainController::class, 'usage']);
    Route::get('main/conversionRate', [MainController::class, 'conversionRate']);
    Route::get('main/engagement', [MainController::class, 'engagement']);
    Route::get('main/total-visits', [MainController::class, 'totalVisits']);


    Route::post('/manageBannerQuestion', [MainController::class, 'store']);
    Route::put('/manageBannerQuestion/{id}', [MainController::class, 'update']);
    Route::post('/removeBannerQuestion/{id}', [MainController::class, 'destroy']);


    // Running Credit Controller
    Route::get('main/view-all-runningCredits', [RunningCreditController::class, 'index']);
    Route::get('main/view-all-runningCredits/manageRunningCredits/{id?}', [RunningCreditController::class, 'create']);

    Route::post('/manageRunningCredits', [RunningCreditController::class, 'store']);
    Route::put('/manageRunningCredits/{id}', [RunningCreditController::class, 'update']);
    Route::post('/removeRunningCredits/{id}', [RunningCreditController::class, 'destroy']);

    // Our Business Controller
    Route::get('main/view-all-our-businesses-and-subsidiaries', [OurBusinessesAndSubsidiariesController::class, 'index']);
    Route::get('/main/view-all-our-businesses-and-subsidiaries/manageOurBusinessesAndSubsidiaries/{id?}', [OurBusinessesAndSubsidiariesController::class, 'create']);

    Route::post('/manageOurBusinessesAndSubsidiaries', [OurBusinessesAndSubsidiariesController::class, 'store']);
    Route::post('/manageOurBusinessesAndSubsidiaries/{id}', [OurBusinessesAndSubsidiariesController::class, 'update']);
    Route::post('/removeOurBas/{id}', [OurBusinessesAndSubsidiariesController::class, 'destroy']);

    // Our Company Controller 
    Route::get('main/view-all-our-companies', [OurCompanyController::class, 'index']);
    Route::get('/main/view-all-our-company/manageOurCompanies/{id?}', [OurCompanyController::class, 'create']);

    Route::post('/manageOurCompanies', [OurCompanyController::class, 'store']);
    Route::post('/manageOurCompanies/{id}', [OurCompanyController::class, 'update']);
    Route::post('/removeOurCompany/{id}', [OurCompanyController::class, 'destroy']);


    // Nominees Controller
    Route::get('/main/individual-nominees', [NomineeController::class, 'index']);
    Route::get('/main/team-nominees', [NomineeController::class, 'team']);
    Route::resource('/main/award', AwardController::class);
    Route::get('/main/nominee/{id?}', [AwardController::class, 'updateNominee']);
    Route::get('/main/department/{id?}', [AwardController::class, 'updateDepartment']);

    // Sigla Nominee Controller
    Route::resource('/siglaNominee', SiglaNomineeController::class);
    Route::post('/removeSiglaNominee/{id}', [SiglaNomineeController::class, 'destroy']);

    // Sigla Department Controller
    Route::resource('/siglaDepartment', SiglaDepartmentController::class);
    Route::post('/removeSiglaDepartment/{id}', [SiglaDepartmentController::class, 'destroy']);



    Route::get('/main', function () {
        return view('pages.admin.main');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});