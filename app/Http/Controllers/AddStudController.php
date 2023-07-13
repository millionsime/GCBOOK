<?php

namespace App\Http\Controllers;

use DB;
use App\AddStud;
use App\User;
use App\Department;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UpdateStudRequest;
use Illuminate\Support\Facades\Auth;


class AddStudController extends Controller
{
    function index()
    {
        $studs = AddStud::where('role_id', '=', 2)->where('dept_id', Auth::user()->dept_id)->get();
        return view('add_stud.index', compact('studs'));
    }
    public function reset()
    {
        $studs = User::where('role_id', '=', 2)->where('dept_id', Auth::user()->dept_id)->get();
        return view('add_stud.reset', compact('studs'));
    }
    public function create()
    {
        
        $depts = Department::all();
        return view('add_stud.create', compact(['depts']));
    }
    public function excel()
    {
        
        $depts = Department::all();
        return view('add_stud.excel', compact(['depts']));
    }
     public function createed()
    {
        
        $depts = Department::all();
        return view('add_stud.create', compact(['depts']));
    }
    public function store(Request $request)
    {
        //dd($request['exam_id']); 

        //dd($request->topic);
        $name = time().$request->file('files')->getClientOriginalName();
        $tempName = 'Student_Execel/'.$name;
       $request->file('files')->move("Student_Execel", $name);
       
        Excel::import(new StudentImport($request->topic), $tempName);
        return redirect()->route('add_stud.index')->with("done", "users added");
    }
     public function save(Request $request)
    {
        
        $this->validate($request, [
        'email' => 'required|unique:add_studs|max:19',
        'name' => 'required',
    ]);
        $member = new AddStud();
        $member->name = $request->input('name');
        $member->email= $request->input('email');
        $member->dept_id= Auth::User()->dept_id;
        $member->password= "adsasfasgaegs";
        $member->section=$request->input('section');
        $member->role_id= 2;
         $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
           ]);
        $member->save();
        return redirect()->route('add_stud.create')->with("done", "user added");
        
        
    }

    public function show($id)
    {
        
        $relations = [
            'roles' => Department::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user = AddStud::findOrFail($id);

        return view('add_stud.show', compact('user'));
    } 
    public function edit($id)
    {
        
        $user = AddStud::findOrFail($id);

        return view('add_stud.edit', compact('user'));
    }
   

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = AddStud::findOrFail($id);
        $user->delete();

        return redirect()->route('add_stud.index');
    }
  public function resetpass($id)
    {
        $user = AddStud::findOrFail($id);
        $user->delete();

        return redirect()->route('add_stud.index');
    }
    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = AddStud::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
     /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateStudRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, $id)
    {
        $user = AddStud::findOrFail($id);
       
         $user->name = $request->name;
         $user->email = $request->email;
         $user->section = $request->section;
        $user->save();
        $studs = AddStud::where('role_id', '=', 2)->where('dept_id', Auth::user()->dept_id)->get();
        return view('add_stud.index', compact('studs'))->with('message', 'Student information updated succesfully!');
       
    }
}
