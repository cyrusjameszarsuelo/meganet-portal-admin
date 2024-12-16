    


    // Main Controller

    Route::get('/home', [MainController::class, 'index']);

    Route::get('/content/{id}', [MainController::class, 'contentIndex']);


    // Blog Controller

    Route::get('/blog-details/{id}', [BlogController::class, 'view']);

    Route::get('/view-all-blogs', [BlogController::class, 'index']);

    Route::get('/main/blogs', [BlogController::class, 'adminIndex']);

    Route::get('/main/blogs/edit-blog/{id}', [BlogController::class, 'edit']);

    Route::get('/getCommentBlog/{id}', [BlogController::class, 'getComments']);

    Route::get('/editBlog/{id}', [BlogController::class, 'edit']);



    // Meganews Controller

    Route::any('/meganews', [MeganewsController::class, 'meganews']);

    Route::get('/meganews/{id}', [MeganewsController::class, 'viewMeganewsDetails']);

    Route::get('main/view-all-meganews', [MeganewsController::class, 'allmeganews']);

    Route::get('main/view-all-meganews/manageMeganews/{id?}', [MeganewsController::class, 'managemeganews']);

    Route::get('/editMeganews/{id}', [MeganewsController::class, 'edit']);



    Route::get('main/view-all-megatrivia', [MegaTriviaController::class, 'index']);

    Route::get('main/view-all-megatrivia/manageMegatrivia/{id?}', [MegaTriviaController::class, 'create']);


    Route::get('main/view-all-megagoodvibes', [MegaGoodVibesController::class, 'index']);

    Route::get('main/view-all-megagoodvibes/manageMegagoodvibes/{id?}', [MegaGoodVibesController::class, 'create']);



    Route::get('/mega-good-vibes-primary', [MegaGoodVibesController::class, 'megagoodvibesprimary']);

    Route::get('/mega-good-vibes/{id?}', [MegaGoodVibesController::class, 'megagoodvibes']);


    Route::get('/mega-trivia', [MegaTriviaController::class, 'megatrivia']);

    Route::get('/megatrivia/all-mega-trivia', [MegaTriviaController::class, 'allmegatrivia']);



    Route::get('/mega-gram', [MegagramController::class, 'megagram']);

    Route::get('main/view-all-megagram', [MegagramController::class, 'index']);

    Route::get('/main/view-all-megagram/manageMegagram/{id?}', [MegagramController::class, 'create']);





    Route::get('/our-company', [MeganewsController::class, 'ourcompany']);

    Route::get('/our-company/details', [MeganewsController::class, 'ourcompanydetails']);

    Route::get('/who-we-are', [MeganewsController::class, 'ourcompany']);





    // Survey Controller

    Route::get('/view-all-surveys', [SurveyController::class, 'index']);

    Route::get('/add-survey', [SurveyController::class, 'create']);

    // Route::get('/main/survey', [SurveyController::class, 'addSurvey']);

    // Route::get('/main/view-all-surveys', [SurveyController::class, 'view']);

    Route::get('/edit-survey/{id}', [SurveyController::class, 'edit']);





    // TimelineController

    Route::get('/view-all-forum', [TimelineController::class, 'index']);

    Route::get('/editForum/{id}', [TimelineController::class, 'edit']);



    // HumanResourceController

    Route::get('/human-resources', [HumanResourceController::class, 'index']);

    Route::get('/view-all-announcements/{id?}', [HumanResourceController::class, 'view']);

    Route::get('/view-all-hires', [HumanResourceController::class, 'getNewEmployee']);

    Route::get('/job-vacancies', [HumanResourceController::class, 'getJobVacancies']);

    Route::get('/demographics/{id?}', [HumanResourceController::class, 'getHrWebsite']);

    Route::get('/how-tos/{id?}', [HumanResourceController::class, 'getHrWebsite']);

    Route::get('/megawide-university/{id?}', [HumanResourceController::class, 'getHrWebsite']);

    Route::get('/did-you-know/{id?}', [HumanResourceController::class, 'getHrWebsite']);




    // CompanyEventsController

    Route::get('/company-events', [CompanyEventsController::class, 'index']);

    Route::get('/meganet-holidays', [CompanyEventsController::class, 'holidays']);




    // PhotoGalleryController

    Route::get('/photo-gallery', [PhotoGalleryController::class, 'index']);




    // CorporateOfficeController

    Route::get('/main/view-all-corporateoffice', [CorporateOfficeController::class, 'index']);

    Route::get('/main/view-all-corporateoffice/manageCorporateoffice/{id?}', [CorporateOfficeController::class, 'create']);

    Route::get('/corporate-office/{val}', [CorporateOfficeController::class, 'viewCorpoffice']);



    // SiteVisitorController

    Route::get('/main/view-all-visitors-website', [SiteVisitorController::class, 'index']);

    Route::get('/main/view-all-visitors-corporate', [SiteVisitorController::class, 'view']);







    
    
    Route::get('/who-we-are', function () { 
        return view('pages.who_we_are');
    });

    Route::get('/holidays', function () {
        return view('pages.holidays');
    });

    Route::get('/covid-19', function () {
        return view('pages.covid_19');
    });

    Route::get('/ccab', function () {
        return view('pages.ccab');
    });

    Route::get('/hr-organizational-structure', function () {
        return view('pages.hr_org_structure');
    });

    Route::get('/our-business-and-subsidiaries', function () {
        return view('new_main.pages.our-business-and-subsidiaries');
    });


    // POST


    Route::post('/submitSiteVisitor', [MainController::class, 'store']);



    Route::post('/submitPost', [TimelineController::class, 'store']);

    Route::post('/submitCommentTimeline', [TimelineController::class, 'create']);

    Route::put('/updateForum/{id}', [TimelineController::class, 'update']);

    Route::post('/removeForum/{id}', [TimelineController::class, 'destroy']);



    Route::post('/submitCommentBlog', [BlogController::class, 'addComment']);

    Route::post('/blogFilter', [BlogController::class, 'blogFilter']);

    Route::post('/updateBlog/{id}', [BlogController::class, 'update']);

    Route::post('/removeBlog/{id}', [BlogController::class, 'destroy']);



    Route::post('/submitSurvey', [SurveyAnswerController::class, 'store']);



    Route::post('/addSurveyStore', [SurveyController::class, 'store']);

    Route::post('/updateSurvey/{id}', [SurveyController::class, 'update']);

    Route::post('/removeSurvey/{id}', [SurveyController::class, 'destroy']);




    Route::post('/submitBlog', [BlogController::class, 'store']);

    Route::put('/updateBlog/{id}', [BlogController::class, 'update']);



    Route::post('/storeCommunityBoard', [CommunityController::class, 'store']);

    Route::post('/editCommBoard/{id}', [CommunityController::class, 'update']);

    Route::post('/removeCommBoard/{id}', [CommunityController::class, 'destroy']);



    Route::post('/addAnnouncement', [HumanResourceController::class, 'store']);

    Route::post('/editAnnouncement/{id}', [HumanResourceController::class, 'update']);

    Route::post('/removeAnnouncement/{id}', [HumanResourceController::class, 'destroy']);

    Route::post('/addNewHire', [HumanResourceController::class, 'storeNewHire']);

    Route::post('/removeHire/{id}', [HumanResourceController::class, 'DestroyHire']);

    Route::post('/addJob', [HumanResourceController::class, 'storeNewJob']);

    Route::post('/addHrWebsite', [HumanResourceController::class, 'storeHrWebsite']);

    Route::post('/removeHrWebsite/{id}', [HumanResourceController::class, 'destroyHrWebsite']);

    Route::post('/removeJobVacancies/{id}', [HumanResourceController::class, 'destroyJobVacancies']);




    Route::post('/addPhotos', [PhotoGalleryController::class, 'store']);

    Route::post('/deletePhoto/{id}', [PhotoGalleryController::class, 'destroy']);




    Route::post('/manageMeganews', [MeganewsController::class, 'store']);

    Route::put('/manageMeganewsUpdate/{id}', [MeganewsController::class, 'update']);

    // Route::put('/updateMeganews/{id}', [MeganewsController::class, 'update']);

    Route::post('/removeMeganews/{id}', [MeganewsController::class, 'destroy']);




    Route::post('/manageMegatrivia', [MegaTriviaController::class, 'store']);

    Route::put('/manageMegatriviaUpdate/{id}', [MegaTriviaController::class, 'update']);

    Route::post('/submitAnswer', [MegaTriviaController::class, 'submitAnswer']);

    Route::post('/removeMegatrivia/{id}', [MegaTriviaController::class, 'destroy']);




    Route::post('/manageMegagoodVibes', [MegaGoodVibesController::class, 'store']);

    Route::put('/manageMegagoodVibes/{id}', [MegaGoodVibesController::class, 'update']);

    Route::post('/removeMegaGoodVibes/{id}', [MegaGoodVibesController::class, 'destroy']);

    Route::post('/submitCommentMegagoodvibes', [MegaGoodVibesController::class, 'addComment']);

    Route::post('/submitLikeMegagoodvibes', [MegaGoodVibesController::class, 'like']);

    Route::post('/submitDislikeMegagoodvibes', [MegaGoodVibesController::class, 'dislike']);

    Route::post('/editCommentValue/{id}', [MegaGoodVibesController::class, 'editComment']);

    Route::post('/deleteCommentValue/{id}', [MegaGoodVibesController::class, 'deleteComment']);





    Route::get('/community-board', [CommunityController::class, 'index']);






    Route::post('/like', [MegagramController::class, 'like']);

    Route::post('/dislike', [MegagramController::class, 'dislike']);

    Route::post('/addComment', [MegagramController::class, 'addComment']);

    Route::post('/manageMegagram', [MegagramController::class, 'store']);

    Route::put('/manageMegagram/{id}', [MegagramController::class, 'update']);

    Route::post('/removeMegagram/{id}', [MegagramController::class, 'destroy']);




    Route::post('/manageCorporateoffice', [CorporateOfficeController::class, 'store']);

    Route::put('/manageCorporateoffice/{id}', [CorporateOfficeController::class, 'update']);

    Route::post('/removeCorporateOffice/{id}', [CorporateOfficeController::class, 'destroy']);








    Route::post('/storeCompanyEvents', [CompanyEventsController::class, 'store']);

    Route::post('/updateCompanyEvents/{id}', [CompanyEventsController::class, 'update']);

    Route::post('/removeEvent/{id}', [CompanyEventsController::class, 'destroy']);