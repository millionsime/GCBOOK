<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\QuestionsOption;
/**
 * Class Question
 *
 * @package App
 * @property string $topic
 * @property text $question_text
 * @property text $code_snippet
 * @property text $answer_explanation
 * @property string $more_info_link
*/
class Question extends Model
{
  

    protected $fillable = ['question_text','department_id', 'teacher_id', 'exam_id','grade'];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    }
     public function user()
    {
        return $this->belongsTo(User::class, 'id')->withTrashed();
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id')->withTrashed();
    }
    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
    public function option()
    {
        return $this->belongsTo(QuestionsOption::class, 'id')->withTrashed();
    }
    public function opt()
    {
        return $this->belongsToMany(QuestionsOption::class, 'questions_options','question_id','id')->withTrashed();
    }
    public function choices($id)
    {
        return QuestionsOption::where('question_id', $id)->get();
    }
}
