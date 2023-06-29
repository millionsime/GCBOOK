<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
class Exam extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_id','teacher_id', 'exam_name', 'exam_grade','exam_duration', 'exam_date', 'exam_type'];

    public static function boot()
    {
        parent::boot();

    }



    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id')->withTrashed();
    }
     public function examstat()
    {
       return $this->hasMany(Exam::class, 'exam_id')->withTrashed();
    }
public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    }
    public function mark()
    {
        return $this->belongsTo(Mark::class, 'topic_id')->withTrashed();
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'exam_id')->withTrashed();
    }
    
    public function numquestion($id)
    {
        return Question::where('exam_id', $id)->where('teacher_id', Auth::user()->id)->count();
    }
    public function numquestionstud($id)
    {
        return Question::where('exam_id', $id)->count();
    }
    public function checkQuestion($id)
    {
        return Question::where('exam_id', $id)->count();
    }
    public function checkResult($id)
    {
        return Result::where('question_id', $id)->where('user_id', Auth::user()->id)->exists();
    }
    public function result($id)
    {
        return Result::where('question_id', $id)->where('user_id', Auth::user()->id)->first();
   
    }
    public function teacherName($id)
    {
        return User::where('id', $id)->first();
    }
    public function resultCount($id)
    {
        return Result::where('question_id', $id)->count();
   
    }
    public function studAverageResult($id)
    {
        $total = Result::where('question_id', $id)->count();
        $results = Result::where('question_id', $id)->get();
        $r = 0;
        foreach($results as $result)
        {
            $r+=$result->correct;
        }
        $avg = $r/$total;
        return $avg;
    }
    public function belowFifthy($id)
    {
       $totalquestion =  Question::where('exam_id', $id)->where('teacher_id', Auth::user()->id)->count();
       $fifthy = $totalquestion/2;
        $total = Result::where('question_id', $id)->count();
        $results = Result::where('question_id', $id)->get();
        $r = 0;
        foreach($results as $result)
        {
            if($result->correct<$fifthy)
            {
                $r+=1;
            }
            
        }
        return $r;
    }
    public function aboveFifthy($id)
    {
       $totalquestion =  Question::where('exam_id', $id)->where('teacher_id', Auth::user()->id)->count();
       $fifthy = $totalquestion/2;
        $total = Result::where('question_id', $id)->count();
        $results = Result::where('question_id', $id)->get();
        $r = 0;
        foreach($results as $result)
        {
            if($result->correct>$fifthy)
            {
                $r+=1;
            }
            
        }
        return $r;
    }
    
}
