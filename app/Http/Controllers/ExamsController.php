<?php

namespace App\Http\Controllers;

use App\Question;
use App\TestAnswer;
use App\Topic;
use App\Exam;
use App\User;
use App\QuestionEssay;
use App\QuestionsOption;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use Auth;
use DB;

class ExamsController extends Controller
{
    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept_id = Auth::user()->id;
        
        
        $exams = Exam::all()->where('teacher_id', Auth::User()->id);
        $questions = Question::all()->where('department_id', $dept_id)->count();
        $num_qst = collect(DB::select("SELECT questions.exam_id From questions where teacher_id= $dept_id"))->count();
       
        //  $user = User::find(Auth::user()->id);
        // $topics = $user->quest()
        //     ->with('user') // bring along details of the friend
        //     ->join('exams', 'exams.id', '=', 'questions.exam_id')
        //     ->get(['questions.*'])->count(); // exclude extra details from friends table
        //     dd($topics);
        return view('exams.index', compact('exams', 'num_qst'), compact('questions' ));
    }
    
    public function student_index()
    {
         $student_id = Auth::id();
         $exams = DB::select("Select exam.id, exam.exam_date, exam.exam_type, topic.title 
                              FROM exams exam 
                              Join attendencs ON attendencs.topic_id = exam.department_id 
                              Join topics topic ON topic.id = attendencs.topic_id 
                              Where attendencs.student_id = '$student_id' 
                              and exam.id not in (SELECT exam_id FROM marks where student_id = '$student_id' )");

         return view('exams.student_index');
    }



    public function correct_answer_index(){

        $essays_questions = TestAnswer::where([['essay_answer','<>', null], ['given_mark',null]])
            ->whereIn('question_id', Question::where('type', false)->pluck('id'))->get();


        $essays_questions->map(function ($answer) {
            $answer['topic'] = Topic::find(Question::find($answer->question_id)->topic_id)->title;
            $answer['exam_type'] = Exam::find(Question::find($answer->question_id)->exam_id)->exam_type;
            $answer['exam_date'] = Exam::find(Question::find($answer->question_id)->exam_id)->exam_date;
            $answer['student_name'] = User::find($answer->user_id)->name;
            $answer['question'] = Question::find($answer->question_id)->question_text;
            return $answer;
        });


        return view('exams.exams_correct_index', compact('essays_questions'));
    }


    public function correct_answer_create($answer_id){
        $student_answer = TestAnswer::find($answer_id);

        $student_answer['student_name'] = User::find($student_answer->user_id)->name;
        $student_answer['question'] = Question::find($student_answer->question_id)->question_text;
        $student_answer['question_grade'] = Question::find($student_answer->question_id)->grade;
        //dd($student_answer);
        return view('exams.exams_correct_create', compact('student_answer'));
    }

    public function correct_answer_commit(Request $request){

        $student_answer = TestAnswer::find($request->questions_id);
        $student_answer->given_mark = $request->grade;
        $student_answer->teacher_feedback = $request->Feedback;
        $student_answer->save();

        return redirect()->route('exams.correct_index');
    }
    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_topics = Topic::where('teacher_id', Auth::user()->id);


        $relations = [
            'topics' => $all_topics->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('exams.create', $relations);
    }


    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $currentexam =  new Exam;
        $currentexam->department_id = Auth::user()->dept_id;
        $currentexam->teacher_id = Auth::user()->id;
        $currentexam->exam_date = $request['exam_date'];
        $currentexam->exam_name = $request['exam_name'];
        $currentexam->exam_duration = $request['exam_duration'];
        $currentexam->exam_grade = $request['exam_grade'];
        $validated = $request->validate([
            'exam_name' => 'required|unique:exams|max:255',
            'exam_duration' => 'required',
            'exam_grade' => 'required',
            'exam_date' => 'required',
        ]);
        $currentexam->save();


        return redirect()->route('exams.index');
    }

    public function storeEssayQ(StoreQuestionsRequest $request)
    {

        $question = QuestionEssay::create($request->all());


        return redirect()->route('questions.index');
    }


    /**
     * Show the form for editing Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $exams= Exam::findOrFail($id);

        return view('exams.edit', compact('exams'));
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());

        return redirect()->route('exams.index')->with('message', 'Exam Information Updated!');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);

        return view('questions.show', compact('question') + $relations);
    }


    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index');
    }

    /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
    
    // public function update_stat(UpdateExamStatusRequest $request, $id)
    // {
    //     $examStat = Exam::findOrFail($id);
    //     $examStat->update($request->all()); 

    //     return redirect()->route('exams.index');
    // }
}
