<?php

namespace App\Imports;

use App\Question;
use App\Department;
use App\QuestionsOption;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;

// class QuestionImport implements ToCollection, ToModel, WithStartRow, WithValidation
class QuestionImport implements ToCollection
{
   
    
    public $exam;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($exam) 
    {
        //dd($topic);
     
        // $this->department = $department;   
        $this->exam = $exam;  
          
    }
    public function collection(Collection $row)
    {
        foreach ($row as $row) 
        {
           
            

            $checkQuestion = Question::where('question_text', $row[0])->get();
            if($checkQuestion->count() ==0){
            $question = new Question();
            $question->question_text = $row[0];
            $question->department_id = Auth::user()->dept_id;
            $question ->teacher_id = Auth::user()->id;
            $question->exam_id = $this->exam;
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
        
    public function rules(): array
    {
        return [
            '1' => \Illuminate\Validation\Rule::unique('question_text'),
        ];
    }
//     public function startRow(): int
//     {
//         return 2;
//     }
    
//     public function model(array $row)
//     {
//             return new Question([
//               'question_text' => $row[0],
              
//         ]);
//     }

//     public function rules(): array
//     {
//         return [
//             '0' => Rule::unique('questions', 'question_text')
//         ];
//     }

//     public function customValidationMessages()
// {
//     return [
//         '0.unique' => 'Duplicate',
//     ];
// }
}

