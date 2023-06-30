<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\GcBook;
use App\Lastword;
use App\Prelastword;

class GcBookController extends Controller
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
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('gcbooks.index', compact('gcbook_check', 'gcbook_check_stat'));
    }
 
    
    public function store(Request $request)
    {
        $gcbook_check2= GCBook::where('user_id', Auth::user()->id)->exists();
    
        $gcbook =  new GCBook;
        $gcbook->department_id = Auth::user()->dept_id;
        $gcbook->user_id = Auth::user()->id;
        $gcbook->status = 0;
        $validated = $request->validate([
            'user_id' => 'unique:gc_books|max:255',
            
        ]);
        if($gcbook_check2)
        {
            $gcbook_check= GCBook::where('user_id', Auth::user()->id)->exists();
            return view('gcbooks.index', compact('gcbook_check', 'gcbook_check_stat'))->with('message', "You already Sent request"); 
        }
        else{
          $gcbook->save();   
          $gcbook_check= GCBook::where('user_id', Auth::user()->id)->exists();
          $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('gcbooks.index', compact('gcbook_check', 'gcbook_check_stat'));  
        }
        }
        
    public function uploadphoto(Request $request)
        {
            $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
            return view("gcbooks.upload", compact('gcbook_check_stat'));
        }
       
    public function addlastword(Request $request, $id)
        {
            $prelast = Prelastword::all()->first();
            $gcbook_check_stat= GCBook::where('user_id', $id)->first();
            $lw =Lastword::where('user_id', Auth::user()->id)->first();
            $lastword_check =Lastword::where('user_id', $id)->exists();
            return view("gcbooks.lastword", compact('prelast','gcbook_check_stat', 'lw','lastword_check')); 
        }

    public function save(Request $request){

        $lastword_check =Lastword::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        $lastword =  new Lastword;
        $lastword->lastword= $request->last_word;
        $lastword->dept_id = Auth::user()->dept_id;
        $lastword->user_id = Auth::user()->id;
        if($lastword_check)
    {
        $lastword =Lastword::where('user_id', Auth::user()->id)->first();
        $lw =Lastword::where('user_id', Auth::user()->id)->first();
        return view('gcbooks.lastword', compact('gcbook_check_stat','lw','lastword_check', 'lastword'));
    }
    else{
       $lastword->save();
        $lastword_check =Lastword::where('user_id', Auth::user()->id)->exists();
        $lw =Lastword::where('user_id', Auth::user()->id)->first();
        return view('gcbooks.lastword', compact('gcbook_check_stat', 'lastword_check', 'lw'))->with("lastwordsent", "Last word recorded Successfully"); 
    }
    
    }

    public function update(Request $request, $id)
    {
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        $lw = Lastword::findOrFail($id);
        $lw->update($request->all());
        $lw =Lastword::where('user_id', Auth::user()->id)->first();
        $lastword_check =Lastword::where('user_id', Auth::user()->id)->exists();
        return view('gcbooks.lastword', compact('gcbook_check_stat', 'lastword_check','lw'))->with("lastwordupdated", "Last word updated Successfully"); 
    } 
    } 

