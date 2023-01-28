<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        
    }

    /**
     * Display a listing of Topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();

        return view('welcome', compact('topics'));
    }

    /**
     * Show the form for creating new Topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('welcome', compact('departments'));
    }

    /**
     * Store a newly created Topic in storage.
     *
     * @param  \App\Http\Requests\StoreTopicsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicsRequest $request)
    {
        //Topic::create($request->all());
        $currentTopic =  new Topic;
        $currentTopic->department_id = $request['department'];
        $currentTopic->title = $request['title'];
        $currentTopic->teacher_id = Auth::user()->id;
        $currentTopic->save();
        //$user = User::create(request(['name', 'email', 'password']));

        return redirect()->route('welcome');
    }


    /**
     * Show the form for editing Topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        $departments = Department::all();

        return view('welcome', compact(['topic', 'departments']));
       
    }

    /**
     * Update Topic in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicsRequest $request, $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->title = $request->title;
        $topic->department_id = $request->department;
        $topic->save();

        return redirect()->route('welcome');
    }


    /**
     * Display Topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        return view('welcome', compact('departments'));
    }


    /**
     * Remove Topic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('welcome');
    }

    /**
     * Delete all selected Topic at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Topic::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
