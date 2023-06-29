<?php

namespace App\Http\Controllers;
use App\User;
use App\Exam;
use App\Question;
use App\Department;
use App\AddStud;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        
        $students = AddStud::all();
        $teachers = User::all()->where('role_id',2);
        $departments = Department::all();
        $exams = Exam::all();
        $startedExams = Exam::where('status', 1);
        $newExams = Exam::where('status', 0);
        $questions = Question::all();
        return view('reports.index', compact('students','teachers','departments', 'startedExams', 'exams', 'newExams', 'questions'));
    }
    
    
}
