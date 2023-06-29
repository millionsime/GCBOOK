<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GcBook extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_id','user_id', 'status'];

    public static function boot()
    {
        parent::boot();

    }
public function checklastword($id)
{
    return Lastword::where('user_id', Auth::user()->id)->exists();
}
   
}
