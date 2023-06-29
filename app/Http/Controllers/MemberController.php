<?php

namespace App\Http\Controllers;

use App\User;
Use App\Member;
use App\AddStud;
use App\Department;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function save(Request $request)
    {
        $member = new User;
        $member->name = $request->input('name');
        $member->email= $request->input('email');
        $member->dept_id= $request->input('department');
        $member->password= $request->input('password');
        $member->role_id= 2;
        $member->save();
        return redirect('/');
    }
    public function show(Request $request)
    {
       $email = $request->email;
       $onUserTable = User::where('email', $email)->first();
       $onStudTable = User::where('email', $email)->first();
       $onUserTableE = User::where('email', $email);
       $onStudTableE = User::where('email', $email);
       $users = \App\AddStud::where('email', $email)->first();
       if($onUserTableE->exists() && $onStudTableE->exists())
       {
        
        return redirect()->back()->with('message', 'Already registered please login');
       }
       else if(!$onUserTableE->exists() && $onStudTableE->exists())
       {
        return redirect()->back()->with('message', 'This ID is not registered');
       }
       else if($onStudTableE->exists())
       {
        $dept= Department::where('id', $users->dept_id )->first();
        return view('signuptwo', compact('users', 'dept'))->with('email', $email);
       }
       else
       {

       }
       



       $knownUser = \App\User::where('email',$email);
       $unknownUser = \App\AddStud::where('email', $email);

       if (\App\AddStud::where('email', $email)->exists()) {
        $dept= Department::where('id', $users->dept_id )->first();
        return view('signuptwo', compact('users', 'dept'))->with('email', $email);
                }
       else if($knownUser->exists() )
       {
        return view ('auth.login')->with('message', 'You are registered already! Please Login');
       }
       else
       {
        return redirect()->back()->with('message', 'This ID is not registered');
       }
    } 
        
    }
    

