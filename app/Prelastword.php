<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prelastword extends Model
{
    use SoftDeletes;

    protected $fillable = ['lastword'];

    public static function boot()
    {
        parent::boot();
    }
}
