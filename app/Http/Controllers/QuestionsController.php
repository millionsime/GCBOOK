<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Topic;
use App\Question;
use App\QuestionEssay;
use App\QuestionsOption;

use Illuminate\Http\Request;
use App\Imports\QuestionImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;


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
        $questions = collect(Question::all());

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $topics = Topic::all();
        return view('questions.create', compact(['topics']));
    }

    public function createEssayQ()
    {
        $user_id = Auth::user()->id;
        $teacher_exams = DB::select("SELECT e.id, e.exam_date, e.exam_type, t.title FROM exams e JOIN topics t ON t.id = e.subject_id Where t.teacher_id = '$user_id'");

        $relations = [
            'topics' => \App\Topic::where('teacher_id', Auth::user()->id)->pluck('title', 'id')->prepend('Please select', ''),
            'exams' => collect($teacher_exams)->pluck('exam_type', 'id')->prepend('Please select', ''),
        ];


        return view('questions.essay_create',  $relations);
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['exam_id']);

        //dd($request->topic);
        $path = $request->file('files')->getRealPath();
        Excel::import(new QuestionImport($request->topic), $path);
        return redirect()->route('questions.index');
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
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question') + $relations);
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions.index');
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

}
