<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamStat extends Model
{
    protected $fillable = ['user_id', 'exam_id'];
    
    public function exam()
    {
         return $this->belongsTo(Exam::class, 'exam_id')->withTrashed();
        
    }
}
