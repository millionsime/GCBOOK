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

    public function department(){
        return $this->hasOne(Department::class, 'id','department_id');
    }
    public function realuser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public static function boot()
    {
        parent::boot();

    }
public function checklastword($id)
{
    return Lastword::where('user_id', Auth::user()->id)->exists();
}
   
}
