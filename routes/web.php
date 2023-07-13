<?php

use App\AddStud;
use App\Exam;
use App\ExamStat;
use App\User;
use App\Topic;
use App\Result;
use App\Department;
use App\College;
use App\QuestionsOption;
use App\Prelastword;
use Illuminate\Support\Facades\Route;
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    \Artisan::call('view:cache');
    \Artisan::call('view:clear');

    return back();
});


Route::get('php-info', function(){
    phpinfo();
    
});
Route::get('/', function () {
    
    return redirect('/home');
})->middleware('preventBackHistory');
// Route::middleware(['auth', 'preventBackHistory'])->group(function () {
//     // your routes
// });
Route::get('my', function(){

    $user = User::FindOrFail(3);

    Auth::login($user);
});

Route::get('signup', function () {
    $departments = Department::all();
    return view('signup',compact('departments'));
})->name('signup');
 Route::post('show', 'MemberController@show')->name('show');
 Route::post('save', 'MemberController@save')->name('save');
// Route::get('start', 'ExamsController@update_stat')->name('update_stat');
Route::get('update_stat/{id}', function($id){

    $exam = Exam::find($id);
    $exam->status = 1;
    $exam->save();
    return back();
})->name('update_stat');
Route::get('update_status/{id}', function($id){

    $exam = Exam::find($id);
    $exam->status = 0;
    $exam->save();
    return back();
})->name('update_status');
Route::get('fetch/{id}', function($id){

    $opt = QuestionsOption::find($id);
    return $opt->option;
})->name('fetch');

// $this->get('/questions/upload_excel', 'QuestionsController@uploadExcel')->name('questions.upload_excel');
//    $this->post('/questions/upload_excel', 'QuestionsController@uploadExcel')->name('questions.upload_excel');
// Route::get('dashes', 'DashsController@index')->name('dashs');




Route::get('log', function(){
    $user = User::find(1);
    Auth::login($user);
});

// Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('login');
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout')->middleware('preventBackHistory');
$this->get('oauth2google', 'Auth\Oauth2Controller@oauth2google')->name('oauth2google');
$this->get('googlecallback', 'Auth\Oauth2Controller@googlecallback')->name('googlecallback');
$this->get('oauth2facebook', 'Auth\Oauth2Controller@oauth2facebook')->name('oauth2facebook');
$this->get('facebookcallback', 'Auth\Oauth2Controller@facebookcallback')->name('facebookcallback');
$this->get('oauth2github', 'Auth\Oauth2Controller@oauth2github')->name('oauth2github');
$this->get('githubcallback', 'Auth\Oauth2Controller@githubcallback')->name('githubcallback');


// Password Reset Routes...

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
Route::get('excel' , 'QuestionsController@excel')->name('excel');
Route::get('add_stud.excel' , 'AddStudController@excel')->name('add_stud.excel');
Route::get('add_stud.update/{id}' , 'AddStudController@update')->name('add_stud.update');
Route::get('upload_excel' , 'QuestionsController@uploadExcel')->name('questions.upload_excel');
Route::post('upload_excel' , 'QuestionsController@uploadExcel')->name('questions.upload_excel');
Route::get('questions.showexam/{id}' , 'QuestionsController@showexam')->name('questions.showexam');
// Route::get('questions.changeit/{id}' , 'QuestionsController@changeit')->name('editquestion');
Route::group(['middleware' => ['admin', 'teacher','preventBackHistory']], function () {
   // Registration Routes...
   
   
   // Route::get('fetch' , 'QuestionsController@fetch')->name('fetch');
 
   $this->get('/questions/create_Essay_Question', 'QuestionsController@createEssayQ')->name('questions.essay_create');
   $this->post('/questions/store_Essay_Question', 'QuestionsController@storeEssayQ')->name('questions.essay_store');
   Route::get('/home', 'HomeController@index');
     
   Route::resource('tests', 'TestsController');
   Route::resource('roles', 'RolesController');
   Route::resource('dashs', 'DashsController');
   Route::resource('sells', 'SellsController');
   Route::resource('profiles', 'ProfilesController');
   Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
   Route::resource('users', 'UsersController');
   Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
   Route::resource('user_actions', 'UserActionsController');
   Route::resource('topics', 'TopicsController');
   Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
   Route::resource('questions', 'QuestionsController');
   Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
   Route::resource('questions_options', 'QuestionsOptionsController');
   Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
   Route::resource('results', 'ResultsController');
   
   Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
});
   
Route::group(['middleware' => ['auth','preventBackHistory']], function () {

    
   
    Route::get('questions/create', function () {
    $departments = Topic::all();
    return view('questions/create', compact('departments'));
})->name('create');
Route::post('updateOption', 'QuestionsController@updateOption')->name('updateOption');
Route::get('/taketest/{id}', function($id)
{
    $takenExamStat=Result::where('user_id', Auth::User()->id)->where('question_id', $id)->exists();
    //   dd($takenExamStat);
    // $result= Result::findOrFail($id);
    if($takenExamStat)
    {
        return redirect()->back();
    }
    else
    {
        $newstat = new ExamStat();
    $exam = Exam::findOrFail($id);
    $newstat->exam_id=$exam->id;
    $newstat->user_id= Auth::user()->id;
    $newstat->save();
    return view('layouts/questiontemp', compact('id'));
    }
    
})->name('taketest');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
    Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

    Route::get('Registered_Subjects', 'RegisterController@showRegistrationForm')->name('StudentSubjects');
    Route::get('SubjectsHome', 'SubjectsController@viewHome')->name('SubjectsHome');

    Route::get('front-question/{id}', function($id){

        return view('front.front_question', compact('id'));
    });
    // Route::get('countExams/{id}', function($id){
        
    //     $id = Question::findOrFail($id)->count();
        
    //     return $id;
    // })->name('countExams');
    
    Route::get('allexams/{id}', function($id)
    {
         $num= Exam::all()->where('teacher_id', Auth::User()->id)->where('exam_id', $id)->count();
         return view('exams.index', compact('num'));
    })->name('blash');
    Route::post('registerSubject', 'SubjectsController@store')->name('registerSubject.register');
    $this->get('/questions/create_Essay_Question', 'QuestionEssayController@createEssayQ')->name('QuestionEssay.essay_create');
    $this->post('/questions/store_Essay_Question', 'QuestionEssayController@storeEssayQ')->name('QuestionEssay.essay_store');
    $this->get('/exams/index', 'ExamsController@student_index')->name('exams.student_index');

    $this->get('/exams/correct/index', 'ExamsController@correct_answer_index')->name('exams.correct_index');
    $this->post('/exams/correct/commit', 'ExamsController@correct_answer_commit')->name('exams.correct_commit');
   
    $this->get('/exams/correct/index', 'ExamsController@correct_answer_index')->name('exams.correct_index');
    $this->post('/exams/correct/commit', 'ExamsController@correct_answer_commit')->name('exams.correct_commit');

    $this->get('/exam/{exam_id}',[
        'uses' => 'TestsController@getexam',
        'as'   => 'examwithid'
    ]);

    $this->get('/exams/correct/create/{answer_id}',[
        'uses' => 'ExamsController@correct_answer_create',
        'as'   => 'exams.correct_create'
    ]);


    Route::get('/home', 'HomeController@index')->middleware('preventBackHistory');;

    $this->get('/student-form', 'StudentController@index');
    $this->post('/store-input-fields', 'StudentController@store');
    $this->get('products/create-step-one', 'ProductController@createStepOne')->name('products.create.step.one');
    $this->post('products/create-step-one', 'ProductController@postCreateStepOne')->name('products.create.step.one.post');
    $this->get('products/create-step-two', 'ProductController@createStepTwo')->name('products.create.step.two');
    $this->post('products/create-step-two', 'ProductController@postCreateStepTwo')->name('products.create.step.two.post');
    $this->get('products/create-step-three', 'ProductController@createStepThree')->name('products.create.step.three');
    $this->post('products/create-step-three', 'ProductController@postCreateStepThree')->name('products.create.step.three.post');

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('editexam/{id}', 'ExamsController@edit')->name('editexam');

    Route::resource('welcome', 'WelcomeController');
    Route::resource('products', 'ProductController');
    Route::resource('tests', 'TestsController');
    Route::resource('roles', 'RolesController');
    
    Route::resource('reports', 'ReportsController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('colleges', 'CollegeController');
    Route::resource('courses', 'CoursesController');
    Route::get('request_gc_book', 'GcBookController@index')->name('request_gc_book');
    Route::post('gcbook', 'GcBookController@store')->name('gcbook');
    Route::resource('lastwords', 'LastwordController');
    Route::post('repupdatereq/{id}', 'GcBookController@repupdate')->name('repupdatereq');
    Route::post('adminupdatereq/{id}', 'GcBookController@adminupdate')->name('adminupdatereq');
    Route::get('viewrequest', 'GcBookController@viewrequest')->name('viewrequest');
    Route::get('adminviewrequest', 'GcBookController@adminviewrequest')->name('adminviewrequest');
    Route::get('prelastword', 'PrelastwordController@index')->name('prelastword');
    Route::post('saveprelastword', 'PrelastwordController@save')->name('saveprelastword');
    Route::get('uploadprofpic', 'UploadpictureController@updt_profile')->name('uploadprofpic');
    Route::post('profilestore', 'UploadpictureController@store')->name('profilestore');
    Route::get('updateprofile/{id}', 'UploadpictureController@update_profile')->name('updateprofile');
    Route::get('updatecover/{id}', 'UploadpictureController@update_cover')->name('updatecover');
    Route::get('updateday/{id}', 'UploadpictureController@update_day')->name('updateday');
    Route::get('updatefavorite/{id}', 'UploadpictureController@update_favorite')->name('updatefavorite');
    Route::post('imagesupdate/{id}', 'UploadpictureController@updateimages')->name('imagesupdate');
    Route::get('uploadcovpic', 'UploadpictureController@updt_cover')->name('uploadcovpic');
    Route::get('uploaddaypic', 'UploadpictureController@updt_day')->name('uploaddaypic');
    Route::get('uploadfavpic', 'UploadpictureController@updt_favorite')->name('uploadfavpic');
    Route::get('addlastword/{id}', 'GcBookController@addlastword')->name('addlastword');
    Route::post('editlastword/{id}', 'GcBookController@update')->name('editlastword');
    Route::get('uploadphoto', 'GcBookController@uploadphoto')->name('uploadphoto');
    Route::get('resetpassword', 'AddStudController@reset')->name('resetstud');
    Route::post('savenewstudent', 'AddStudController@save')->name('savestud');
    Route::post('savelastword', 'GcBookController@save')->name('savelastword');
    Route::resource('exams', 'ExamsController');
    Route::resource('profiles', 'ProfilesController');
    Route::resource('subjects', 'SubjectsController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('topics', 'TopicsController');
    Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    Route::resource('courses', 'CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'CoursesController@massDestroy', 'as' => 'topics.mass_destroy']);
   
    Route::resource('questions', 'QuestionsController');
    Route::resource('add_stud', 'AddStudController');
    Route::post('store-questions_for_good', 'QuestionsController@store');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::get('result', 'ResultsController@display')->name('resultpage');
    Route::get('showresultpage', 'ResultsController@show')->name('showresultpage');
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

});