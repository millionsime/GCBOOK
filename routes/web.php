<?php
use App\Topic;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return redirect('/home');
// });
Route::get('/', function () {
    $departments = Topic::all();
    return view('welcome', compact('departments'));
})->name('welcome');

// Auth::routes();

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
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


Route::group(['middleware' => ['admin', 'teacher']], function () {
   // Registration Routes...
   Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
   Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

   $this->get('/questions/create_Essay_Question', 'QuestionsController@createEssayQ')->name('questions.essay_create');
   $this->post('/questions/store_Essay_Question', 'QuestionsController@storeEssayQ')->name('questions.essay_store');
   Route::get('/home', 'HomeController@index');
   Route::resource('tests', 'TestsController');
   Route::resource('roles', 'RolesController');
   Route::resource('sells', 'SellsController');
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


Route::group(['middleware' => 'auth'], function () {

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
    Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

    Route::get('Registered_Subjects', 'RegisterController@showRegistrationForm')->name('StudentSubjects');
    Route::get('SubjectsHome', 'SubjectsController@viewHome')->name('SubjectsHome');


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


    Route::get('/home', 'HomeController@index');

    $this->get('/student-form', 'StudentController@index');
    $this->post('/store-input-fields', 'StudentController@store');
    $this->get('products/create-step-one', 'ProductController@createStepOne')->name('products.create.step.one');
    $this->post('products/create-step-one', 'ProductController@postCreateStepOne')->name('products.create.step.one.post');
    $this->get('products/create-step-two', 'ProductController@createStepTwo')->name('products.create.step.two');
    $this->post('products/create-step-two', 'ProductController@postCreateStepTwo')->name('products.create.step.two.post');
    $this->get('products/create-step-three', 'ProductController@createStepThree')->name('products.create.step.three');
    $this->post('products/create-step-three', 'ProductController@postCreateStepThree')->name('products.create.step.three.post');

    

    Route::resource('welcome', 'WelcomeController');
    Route::resource('products', 'ProductController');
    Route::resource('tests', 'TestsController');
    Route::resource('roles', 'RolesController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('courses', 'CoursesController');
    Route::resource('exams', 'ExamsController');
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
    Route::post('store-questions_for_good', 'QuestionsController@store');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
   
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

});
