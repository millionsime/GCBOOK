<?php

namespace App;

use App\Exam;
use App\User;
use App\College;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'college_id'];

    public static function boot()
    {
        parent::boot();

        Department::observe(new \App\Observers\UserActionsObserver);
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'department_id')->withTrashed();
    }
    public function colleges()
    {
    return $this->belongsTo(College::class, 'college_id')->withTrashed();
    }
    public function questionEssay()
    {
        return $this->hasMany(QuestionEssay::class, 'topic_id')->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id')->withTrashed();
    }
    public function department()
    {
        return $this->hasMany(Exam::class, 'department_id')->withTrashed();
    }
    public function attendenc()
    {
        return $this->belongsTo(Attendenc::class, 'topic_id')->withTrashed();
    }
}

