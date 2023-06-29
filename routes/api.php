<?php
use App\Exam;
use App\Mark;
use App\User;
use App\Result;
use App\ExamStat;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResultsController;


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

}); 
Route::get('questions/{id}/{exid}', function($id, $exid){
   
    $user_id= $id;
    $user = User::findOrFail($user_id);
    $dept = $user->dept_id;
$exam   = Exam::find($exid)->first();
if($exam)
{
$result  = Result::where('user_id', $user_id)->where('question_id', $exam->id)->first();
// $stat = ExamStat::where('user_id', $user_id)->where('exam_id', $exam->id)->first();
if($result)
{
// dd("if");
    $questions =  Question::where('exam_id', $exid)->with('options:id,option,correct,question_id')->with('exam')
    ->get();
    
    return [
        'questions' => $questions,
        'result'=> $result
      ];
}
else
{
    // dd("else");
$newstat = new ExamStat();
$newstat->exam_id=$exam->id;
$newstat->user_id= $user_id;
$newstat->save();
      $questions =  Question::where('exam_id', $exid)->with('options:id,option,correct,question_id')->with('exam')
      ->get();
      return [
          'questions' => $questions,
          
          'result'=> False
        ];
}
}
    // return Question::where('categroys_id', $id)->with('choice:id,content,is_answer,questions_id')->limit(5)->get();

});
Route::get('checkexam/{id}', function($id){
$exam = Exam::find($id);

if($exam->status == 0){
    return response()->json([
        'name' => 'question',
        'status' => false,
    ]);
    
}
if($exam->status == 1){
    return response()->json([
        'name' => 'question',
        'status' => true,
    ]);
    
}
});


Route::post('submitedResult', 'ResultsController@store'); 

Route::get('status', function(){
    // return Question::where('categroys_id', $id)->with('choice:id,content,is_answer,questions_id')->limit(5)->get();

return Exam::all();
});