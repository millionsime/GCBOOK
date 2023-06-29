<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Exam;
use App\AddStud;
use App\ExamStat;
use App\Test;
use App\User;
use App\Result;
use App\Lastword;
use App\Question;
use App\GCBook;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::count();
        $qst_id = Question::all()->where('dept_id', Auth::user()->dept_id);
        $users = User::all()->count();
        $candidates = User::all()->where('dept_id', Auth::user()->dept_id)->where('role_id', 2)->count();
        $students = AddStud::all()->where('dept_id', Auth::user()->dept_id)->where('role_id', 2)->count();
        $quizzes = Test::count();
        $average = Test::avg('result');
        
        $totalExams = Exam::all()->where('teacher_id', Auth::user()->id)->count();
        $totalQuestion = Question::all()->where('teacher_id', Auth::user()->id)->count();
        
      
        // $takenExamInfo = Exam::where('id', $takenExam->exam_id)->get();
        //   dd($takenExamInfo);
        $user = User::find(Auth::user()->id);
        $topics = $user->attendenc()
            ->with('user') // bring along details of the friend
            ->join('topics', 'topics.id', '=', 'attendencs.topic_id')
            ->get(['topics.*']); // exclude extra details from friends table

        $exams = null;
        if(Auth::user()->password == "1234567")
        {
            $changepass = "please change your password";
        }
        else
        {
             $changepass = " ";
        }


        if(Auth::user()->isStudent()){
        $lastword =Lastword::where('user_id', Auth::user()->id)->first();
        $gcbook_check= GCBook::where('user_id', Auth::user()->id)->exists();
        
    
          $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();  
        

        

        $examInfo= Exam::all()->where('department_id', Auth::user()->dept_id);    
        $ex   = Exam::where('department_id', Auth::user()->dept_id)->first();
        $takenExamStat=Result::where('user_id', Auth::User()->id)->where('question_id', $ex->id)->exists();
        $takenExam=ExamStat::all()->where('user_id', Auth::User()->id)->where('question_id', $ex->id);
        $result  = Result::where('user_id', Auth::User()->id)->where('question_id', $ex->id)->first();
            $student_id = Auth::id();
            $exams = DB::select("Select exam.id, exam.exam_date, exam.exam_type, topic.title 
                              FROM exams exam 
                              Join attendencs ON attendencs.topic_id = exam.department_id 
                              Join topics topic ON topic.id = attendencs.topic_id 
                              Where attendencs.student_id = '$student_id' 
                              and exam.id not in (SELECT exam_id FROM marks where student_id = '$student_id' )");
                                 return view('home', compact('gcbook_check','lastword','gcbook_check_stat','candidates','result','takenExam','takenExamStat','examInfo','totalQuestion','qst_id','questions','totalExams', 'users', 'quizzes', 'average', 'topics', 'exams','students'));
   
        }

        return view('home', compact('changepass','candidates','totalQuestion','qst_id','questions','totalExams', 'users', 'quizzes', 'average', 'topics', 'exams','students'));
    }
}
