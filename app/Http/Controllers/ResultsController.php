<?php

namespace App\Http\Controllers;


use App\Exam;
use App\Mark;
use App\Test;
use App\Question;
use App\Topic;
use App\Result;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('student');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exams= Exam::where('teacher_id', Auth::user()->id)->get();
        $sd= Exam::where('teacher_id', Auth::user()->id)->first();
        $results = Result::where('question_id', $sd->id)->get();
       
        $exs = collect(Question::all()->where('teacher_id', Auth::User()->id));


               
        return view('results.index', compact('exams', 'results', 'exs','sd'));
        
        
        // 
        // return view('results.index', compact('results'));
    }
    public function display(Request $request)
    {
        $id=$request->exam;
        // $results = Result::findOrFail($id);
        $exams= Exam::where('id', $id)->first();
         $results = Result::where('question_id', $id)->get();
         
        return view('results.display', compact('results', 'exams'));
    }
   public function show()
   {
       $examInfo= Exam::all()->where('teacher_id', Auth::user()->id);  
       $exams= Exam::where('teacher_id', Auth::user()->id);
        $sd= Exam::where('teacher_id', Auth::user()->id)->first();
        $totalQuestion = Question::where('exam_id', $sd->id)->count();
         $resulte = Result::where('question_id', $sd->id)->first();
        $results = Result::where('question_id', $sd->id)->get();
        
         $total=$results->count();
         $result = $resulte->correct;
         $resultBelow = $resulte->correct;
         $bytwo = $totalQuestion/2;
        $belowFifthy =0;
        $aboveFifthy =0;
        $res=0;
         if($result)
        for($i =0; $i<$total; $i++)
        {
            $res=$result + $result;
             if($resultBelow<10)
         {
              $belowFifthy =  $belowFifthy + 1;
         }
           if($resultBelow>10)
         {
              $aboveFifthy =  $aboveFifthy + 1;
         }
       
        }
                                            
                                           
                                           
                                            $average = $result/$total;
        
       
       return view('results.analysis', compact('examInfo','results','res', 'exams', 'average', 'totalQuestion', 'belowFifthy', 'aboveFifthy'));
   }
   public function create(Request $request)
   {
        $examInfo= Exam::all()->where('teacher_id', Auth::user()->id);  
       $exams= Exam::where('teacher_id', Auth::user()->id);
        $sd= Exam::where('teacher_id', Auth::user()->id)->first();
        $totalQuestion = Question::where('exam_id', $sd->id)->count();
         $resulte = Result::where('question_id', $sd->id)->first();
        $results = Result::where('question_id', $sd->id)->get();
       
        
         $total=$results->count();
         $result = $resulte->correct;
         
         $resultBelow = $resulte->correct;
         $bytwo = $totalQuestion/2;
        $belowFifthy =0;
        $aboveFifthy =0;
        $res=0;
        foreach($resulte as $resu)
        {
            $res+=$resulte->correct;
             if($resultBelow<10)
         {
              $belowFifthy =  $belowFifthy + 1;
         }
           if($resultBelow>10)
         {
              $aboveFifthy =  $aboveFifthy + 1;
         }
       
        }
        
                                            
                                           
                                           
                                            $average = $result/$total;
        
       
       return view('results.analysis', compact('examInfo','results','res', 'exams', 'average', 'totalQuestion', 'belowFifthy', 'aboveFifthy'));
   }
    public function store(Request $request)
    { 
     
          
           
            $mark = new Result();
            $mark->user_id = $request->student_id;
            $mark->correct = $request->result;
            $mark->question_id = $request->exam_id;
            $mark->answered = $request->exam_id;
            $mark->save();
            
            
            
         
    }
}
