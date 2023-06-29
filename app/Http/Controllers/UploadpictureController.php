<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\GcBook;
use App\Uploadpicture;
use Auth;

class UploadpictureController extends Controller
{
    public function updt_profile(Request $request)
    {
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.uploadprofile', compact('gcbook_check', 'gcbook_check_stat'));
    }

    public function updt_cover(Request $request)
    {
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.uploadcover', compact('gcbook_check', 'gcbook_check_stat'));
    }

    public function updt_day(Request $request)
    {
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.uploadday', compact('gcbook_check', 'gcbook_check_stat'));
    }

    public function updt_favorite(Request $request)
    {
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.uploadfavorite', compact('gcbook_check', 'gcbook_check_stat'));
    }

    public function update_profile(Request $request, Uploadpicture $images)
    {
        $images = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', 'profile_picture')->first();
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.updateprofile', compact('images','gcbook_check', 'gcbook_check_stat'));
    }

    public function update_cover(Request $request, Uploadpicture $images)
    {
        $cov = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', 'cover_picture')->first();
         
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.updatecover', compact('cov','gcbook_check', 'gcbook_check_stat'));
    }

    public function update_day(Request $request, Uploadpicture $images)
    {
        $day = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', 'day_picture')->first();
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.updateday', compact('day', 'gcbook_check', 'gcbook_check_stat'));
    }

    public function update_favorite(Request $request, Uploadpicture $images)
    {
        $fav = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', 'favorite_picture')->first();
        $gcbook_check = GCBook::where('user_id', Auth::user()->id)->exists();
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        return view('upload_photos.updatefavorite', compact('fav', 'gcbook_check', 'gcbook_check_stat'));
    }
    public function store(Request $request){
        $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
        $uploaded = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', $request->type)->first();
        if(!$uploaded){
        //$path = $request->file('image')->store('profile_image', 'public');
        $path = $this->storeimage($request, $uploaded);
        $picture = Uploadpicture::create([
            'pic_type' => $request->type,
            'accessed' => $request->visible,
            'user_id' => Auth()->user()->id,
            'image' => $path,
        ]);
        return view('gcbooks.upload', compact('gcbook_check_stat'));
        }
        else{
        return view('gcbooks.upload', compact('gcbook_check_stat'));
        }
    }
    
    public function updateimages(Request $request, $id){
            $gcbook_check_stat= GCBook::where('user_id', Auth::user()->id)->first();
            // $uploaded = Uploadpicture::where('user_id', Auth::user()->id);
            $updates = Uploadpicture::findOrFail($id);
            Storage::disk('public')->delete($updates->image);
            $updates->update(['accessed' => $request->visible]);                 
            $this->storeimage($request, $updates);
            return view('gcbooks.upload', compact('gcbook_check_stat'));
            }

    protected function storeimage($request, $picture){
        $ext = $request->file('image')->extension();
        $content = file_get_contents($request->file('image'));
        $filename = Str::random(25);
        $path = "profile_image/$filename.$ext";
        Storage::disk('public')->put($path, $content);
        if($picture == null){
            return $path;
        }
        else{
           $picture->update(['image' => $path]); 
        }
    }
}
