<?php

namespace App\Http\Controllers;


use App\Exam;
use App\Mark;
use App\Test;
use App\Topic;
use App\Result;
use App\User;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateResultsRequest;

class ProfilesController extends Controller
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
        $users = User::where('id', Auth::user()->id)->get();
        return view('profiles.index', compact('users'));
    }
     public function edit($id)
    {
        
        $user = User::findOrFail($id);

        return view('profiles.edit', compact('user'));
    }
      public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
       
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = $request->password;
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
           ]);
        $user->save();
        $users = User::where('id', Auth::user()->id)->get();
        return view('profiles.index', compact('users'))->with('message', 'nformation updated succesfully!');
       
    }

}
