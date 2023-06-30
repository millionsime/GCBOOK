<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prelastword;

class PrelastwordController extends Controller
{
    public function index(){
        return view('lastwords.prelastword');
    }

    public function save(Request $request){
        $validated = $request->validate([
            'lastword' => 'unique:prelastwords|max:30',
            
        ]);
        $prelast = new Prelastword;
        $prelast->lastword = $request->lastword;
        $prelast->save();
        return view('lastwords.prelastword');
    }
}
