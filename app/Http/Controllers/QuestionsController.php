<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use App\Topic;
use App\Question;
use App\Department;
use App\QuestionEssay;

use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Imports\QuestionImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;


class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher');
    }

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
  $dept_id = Auth::user()->id;
        
        
         $exams = Exam::all()->where('teacher_id', Auth::User()->id);
        // $questions = Question::all()->where('department_id', $dept_id)->count();
        // $num_qst = collect(DB::select("SELECT questions.exam_id From questions where teacher_id= $dept_id"))->count();
       
        // //  $user = User::find(Auth::user()->id);
        // // $topics = $user->quest()
        // //     ->with('user') // bring along details of the friend
        // //     ->join('exams', 'exams.id', '=', 'questions.exam_id')
        // //     ->get(['questions.*'])->count(); // exclude extra details from friends table
        // //     dd($topics);
        // return view('exams.index', compact(, 'num_qst'), compact('questions' ));
 
       $questions = collect(Question::all()->where('teacher_id', Auth::User()->id));
       $opts = collect(QuestionsOption::all()->where('question_id', Auth::User()->dept_id));
        return view('questions.index', compact('exams','questions', 'opts'));
    }
 public function showexam($id)
 {
     $questions = collect(Question::all()->where('teacher_id', Auth::User()->id)->where('exam_id', $id));
       $opts = collect(QuestionsOption::all()->where('question_id', Auth::User()->dept_id));
        return view('questions.showexam', compact('questions', 'opts'));
 }
    
    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department_id = Auth::user()->dept_id;
        $teacher_id = Auth::user()->id;
        // $teacher_exams = DB::select("SELECT e.id, e.exam_date, e.exam_type, e.exam_name, e.exam_duration FROM exams e  Where e.department_id = '$dept_id'");
        $exams = Exam::all()->where('teacher_id', Auth::user()->id);
        $correct_options = [
             'option1' => 'A',
            'option2' => 'B',
            'option3' => 'C',
            'option4' => 'D'
            
        ];
        return view('questions.create', compact('exams','department_id'), compact(['correct_options']));
    }

    public function createEssayQ()
    {
        $user_id = Auth::user()->id;
        $teacher_exams = DB::select("SELECT e.id, e.exam_date, e.exam_type, t.title FROM exams e JOIN departments t ON t.id = e.subject_id Where t.teacher_id = '$user_id'");

        $relations = [
            'departments' => \App\Department::where('teacher_id', Auth::user()->id)->pluck('title', 'id')->prepend('Please select', ''),
            'exams' => collect($teacher_exams)->pluck('exam_type', 'id')->prepend('Please select', ''),
        ];


        return view('questions.essay_create',  $relations);
    }
public function excel(Request $request)
{
    $exams = Exam::all()->where('teacher_id', Auth::User()->id);
    return view('questions.excel', compact('exams'));
}
    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
     
     public function updateOption(Request $request)
     {
         
        $id = $request->theHidden; 
        $questionsoption = QuestionsOption::findOrFail($id); 
        $questionsoption ->option = $request->option;
        if($request->checkbox=="on")
        {
           $questionsoption->correct = 1; 
        }
        else
        {
           $questionsoption->correct = 0;  
        }
        
        $questionsoption->save();
        // dd($request->all());
        return back();
     }
     
     
    public function uploadExcel(Request $request)
    {
        //dd($request['exam_id']);

        //dd($request->department);
        
        
        $exams = Exam::all()->where('teacher_id', Auth::User()->id);
        $questions = collect(Question::all()->where('teacher_id', Auth::User()->id));

        $teacher_id = Auth::user()->id;
        $depts = User::where('department_id', Auth::User()->dept_id);
        $path = $request->file('files')->getRealPath();
        $ex= $request->exam_id;
        
        
        $name = time().$request->file('files')->getClientOriginalName();
        $tempName = 'Question_Execel/'.$name;
        $request->file('files')->move("Question_Execel", $name);
       
        
        Excel::import(new QuestionImport($ex), $tempName);
        return view('questions.index', compact('questions', 'exams'))->with('message', 'Questions Exported');
      
    }
/**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {
        // dd($request->all());
        
       $validated = $request->validate([
            'question_text' => 'required|unique:questions',
           
           ]);
        $question = Question::create($request->all());
         
        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            } 
        }

        $question_1 = Question::find($question->id);
        $question_1->type = true;
        $question_1->save();

        return redirect()->route('questions.create')->with("message", "Question Saved");
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
        $relations = [
            'departments' => \App\Department::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question') + $relations);
    }
    
    // public function changeit($id)
    // {
    //     $question  = Question::findOrFail($id);
        
    // }
    
    public function fetch($id)
    {
       

        $question = QuestionOtions::findOrFail($id);

        return view('questions.index', compact('opts'));
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
        $question = Question::findOrFail($id);
        $question->question_text=$request->question_text;
        $question->save();
        return redirect()->route('questions.index')->with('message', 'question updated succesfully!');
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
            'departments' => \App\Department::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);
        $option = QuestionsOption::All()->where('question_id', $id);

        return view('questions.show', compact('question', 'option'));
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
        $questionOption = QuestionsOption::where('question_id', $id)->get();
        foreach($questionOption as $qstOpt)
        {
           $qstOpt->delete();
        }
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

}
