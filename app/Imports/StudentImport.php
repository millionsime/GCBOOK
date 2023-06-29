<?php

namespace App\Imports;

use App\AddStud;
use App\Topic;
use App\User;
use App\QuestionsOption;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
class StudentImport implements ToCollection
{
    public $topic;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($topic)
    {
        // dd($topic);
     
        $this->topic = $topic;    
    }
    
    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row) 
        {
            $checkStudent = AddStud::where('email', $row[0])->get();
            if($checkStudent->count() ==0){
            $a= StudentImport::generate_password();
            $student = new AddStud();
            $student-> name = $row[1];
            $student-> email= $row[0]; 
            $student-> role_id= '2';
            $student->dept_id = Auth::User()->dept_id;
            $student->section='A';
            $student->password = $a;
            $student->save();
}
            

            
            // $option = new QuestionsOption();
            
            // $option->option = $row[1];
            // if($row[5]== 1){
            //     $option->correct=1;

            // }
            // $option->question_id= $question->id;
            // $option->save();
            
            // $option = new QuestionsOption();
            // $option->option = $row[2];
            // if($row[5]== 2){
            //     $option->correct=1;

            // }
            // $option->question_id= $question->id;
            // $option->save();
            // $option = new QuestionsOption();
            // $option->option = $row[3];
            // if($row[5]== 3){
            //     $option->correct=1;

            // }
            // $option->question_id= $question->id;
            // $option->save();
            // $option = new QuestionsOption();
            // $option->option = $row[4];
            // if($row[5]== 4){
            //     $option->correct=1;

            // }
            // $option->question_id= $question->id;
            // $option->save();
            
        }
        
    }
    function generate_password()
    {

        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                  '0123456789`';
      
        $str = '';
        $max = strlen($chars) - 1;
      
        for ($i=0; $i < 6; $i++)
          $str .= $chars[mt_rand(0, $max)];
      
        return $str;
      }
}
