<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use SoftDeletes; 

    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        College::observe(new \App\Observers\UserActionsObserver);
    }
 
}
