<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('department_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
             $table->string('exam_name');
            $table->string('exam_type')->nullable();
            $table->date('exam_date');
            $table->string('exam_duration');
            $table->string('exam_grade');
            $table->boolean('status')->default(false);

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
