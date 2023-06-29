<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DashsController extends Controller
{
    
 
    public function index()
    {
        
        if(Auth::user()->isStudent()){
            $gcbookrqst = GCBook::where('user_id', Auth::User()->id)->first();
        }
        return view('dashs.index', compact('gcbookrqst'));
    }

     /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('add_stud.index');
    }
}
