<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionEssayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_essays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->nullable();
             $table->text('question_text')->nullable();
            $table->integer('exam_id')->unsigned()->nullable();
            $table->float('grade')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_essay');
    }
}
