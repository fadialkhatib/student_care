<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


#########################    PUBLIC ROUTES    ##########################


Route::get('/test-online', function () {
    dd('i am online ^_^');
});
Route::get('sendemail' , [EmailController::class,'sendEmail'])->name('sendemail');



                        ######### Photo Routes ############
Route::post('/upload/'              , [PhotoController::class, 'upload']);
Route::get('/show_image/{filename}' , [PhotoController::class, 'show_image']);



                        ######### User Routes  ############
Route::post('register' , [UserController::class,'Register'])->name('register')->middleware('black');
Route::post('login'    , [UserController::class,'Login'   ])->name( 'login'  )->middleware('black');



                        ##########  Student Routes  ###########
Route::get('view_student_profile/{us_id}',   [StudentController::class,'View_student_profile'])->name('view_student_profile');
Route::get('show_subject_list'           ,   [StudentController::class,'Show_subject_list'   ])->name('show_subject_list');



                        ##########  Patient Routes  ###########
Route::get('view_patient_profile/{us_id}',   [PatientController::class,'View_patient_profile'])->name('view_patient_profile');




                        ##########  Post Routes     ############
Route::get('show_posts'               , [PostController::class,'Show_posts'        ])->name('show_posts');
Route::get('show_posts_details/{id}'  , [PostController::class,'Show_posts_details'])->name('show_posts_details');



                        ##########  Search Routes   ############
Route::post('search_by_student_name'  , [StudentController::class,'search_by_student_name' ])->name('search_by_student_name');
Route::post('search_by_location_name' , [UniversityController::class,'search_by_location'  ])->name('search_by_location_name');
Route::post('search_by_treatment_name', [TreatmentController::class,'search_by_treatment'  ])->name('search_by_treatment_name');



#################################    AUTHENTICATION     #################################
Route::group(['middleware'=>['auth:api']]     ,function(){
    Route::post('logout'                      ,[UserController::class,'Logout'])->name('logout');
   




                        ###########  Student Routes ############
    Route::post('student_data_entry/{un_id}'  ,[StudentController::class,'student_data_entry'   ])->name('student_data_entry')  ->middleware('student','black');
    Route::put ('edit_student_profile/{us_id}',[StudentController::class,'Edit_student_profile' ])->name('edit_student_profile')->middleware('student','black');
    Route::post('add_to_subject_list'         ,[StudentController::class,'Add_to_subject_list'  ])->name('add_to_subject_list') ->middleware('student','black');;
    

    

                        ##########  Admin Routes    #############
    Route::post('create_question'                      , [QuestionController  ::class,'Create_question'                ])->name('create_question')               ->middleware('admin');
    Route::post('create_treatment'                     , [TreatmentController ::class,'Create_Treatment'               ])->name('create_treatment')              ->middleware('admin');
    Route::post('add_subject_to_the_app/{tr_id}'       , [SubjectController   ::class,'Add_subject_to_the_app'         ])->name('add_subject_to_the_app')        ->middleware('admin');
    Route::put ('edit_subject_in_the_app/{id}'         , [SubjectController   ::class,'Edit_subject_in_the_app'        ])->name('edit_subject_in_the_app')       ->middleware('admin');
    Route::delete('delete_subject_from_the_app/{id}'   , [SubjectController   ::class,'Delete_subject_from_the_app'    ])->name('delete_subject_from_the_app')   ->middleware('admin');
    Route::post('add_university_to_the_app'            , [UniversityController::class,'Add_university_to_the_app'      ])->name('add_university_to_the_app')     ->middleware('admin');
    Route::put ('edit_university_in_the_app/{id}'      , [UniversityController::class,'Edit_university_in_the_app'     ])->name('edit_university_in_the_app')    ->middleware('admin');
    Route::delete('delete_university_from_the_app/{id}', [UniversityController::class,'Delete_university_from_the_app' ])->name('delete_university_from_the_app')->middleware('admin');
    Route::post('add_to_black_list/{post_id}'          , [UserController      ::class,'add_to_black_list'              ])->name('add_to_black_list')             ->middleware('admin');
    Route::post('block'                                , [UserController      ::class,'block_account'                  ])->name('block')                         ->middleware('admin');  
    



                        ########   Patient's Routes   #########
    Route::post('patient_data_entry'          , [PatientController::class,'patient_data_entry'    ])->name('patient_data_entry')   ->middleware('patient');
    Route::get ('show_treatments'             , [PatientController::class,'Show_treatments'       ])->name('show_treatments')      ->middleware('patient');
    Route::post('choose_treatment'            , [PatientController::class,'Choose_treatment'      ])->name('choose_treatment')     ->middleware('patient');
    Route::put ('edit_patient_profile/{us_id}', [PatientController::class,'Edit_patient_profile'  ])->name('edit_patient_profile') ->middleware('patient');
    Route::post ('add_to_favourite_list'      , [PatientController::class,'Add_to_favourite_list' ])->name('Add_to_favourite_list')->middleware('patient');
    Route::get ('show_favorite_list'          , [PatientController::class,'Show_favorite_list'    ])->name('Add_to_favourite_list')->middleware('patient');
    Route::post ('report_post/{post_id}'      , [PatientController::class,'Report_post'           ])->name('report_post')          ->middleware('patient');
    Route::post ('rating_the_post'            , [PatientController::class,'rating_the_post'       ])->name('rating_the_post')      ->middleware('patient');
    Route::post ('date/{post_id}'             , [PatientController::class,'final_date'            ])->name('date')                 ->middleware('patient');
    //Route::post ('date/{post_id}/{date_id}' , [PatientController::class,'date_post' ])->name('date')->middleware('patient');



    

                        ########   Post's Routes   ###########
    Route::post  ('add_post'                  , [PostController::class,'Add_post'   ])->name('add_post')      ->middleware('student','black');
    Route::put   ('edit_post/{id}'            , [PostController::class,'Edit_post'  ])->name('edit_post')     ->middleware('student','black');
    Route::delete('delete_post/{id}'          , [PostController::class,'Delete_post'])->name('delete_post')   ->middleware('student','black');
    Route::post  ('add_photo_post/{id}/{id1}' , [PostController::class,'Post_photo' ])->name('add_photo_post')->middleware('student','black');
   


   
                        ########  Treatment Routes ############
    Route::post('add_treatment_photo/{id}/{id1}',[TreatmentController::class,'Treatment_photo'])->name('add_treatment_photo')->middleware('admin');


});
