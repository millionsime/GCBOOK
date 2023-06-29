<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lastword extends Model
{


    protected $fillable = ['dept_id','user_id', 'lastword'];

    public static function boot()
    {
        parent::boot();
    }
}
