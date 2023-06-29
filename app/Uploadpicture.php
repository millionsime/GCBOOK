<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadpicture extends Model
{
    protected $fillable = ['pic_type', 'accessed', 'image', 'user_id'];
}
