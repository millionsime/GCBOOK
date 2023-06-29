<?php

namespace App\Http\Controllers;
use App\Lastword;
use Auth;
use Illuminate\Http\Request;

class LastwordController extends Controller
{
public function index()
{
    $lw = Lastword::where('user_id', Auth::user()->id)->first();
    return view('lastwords.index', compact('lw'));
}
}
