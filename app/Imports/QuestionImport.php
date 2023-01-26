<?php

namespace App\Imports;

use App\Topic;
use App\Question;
use App\QuestionsOption;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionImport implements ToCollection
{
    public $topic;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($topic)
    {
        //dd($topic);
     
        $this->topic = $topic;    
    }
    public function collection(Collection $row)
    {
        foreach ($row as $row) 
        {
            
            $question = new Question();
            $question->question_text = $row[0];
            $question->answer_explanation = $row[6]; 
            $question->more_info_link = $row[7];
            $question->topic_id = $this->topic;
            $question->save();
            $option = new QuestionsOption();
            
            $option->option = $row[1];
            if($row[5]== 1){
                $option->correct=1;

            }
            $option->question_id= $question->id;
            $option->save();
            
            $option = new QuestionsOption();
            $option->option = $row[2];
            if($row[5]== 2){
                $option->correct=1;

            }
            $option->question_id= $question->id;
            $option->save();
            $option = new QuestionsOption();
            $option->option = $row[3];
            if($row[5]== 3){
                $option->correct=1;

            }
            $option->question_id= $question->id;
            $option->save();
            $option = new QuestionsOption();
            $option->option = $row[4];
            if($row[5]== 4){
                $option->correct=1;

            }
            $option->question_id= $question->id;
            $option->save();
            
        }
    }
}
