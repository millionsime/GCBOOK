<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendencs1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendencs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
 
            $table->integer('student_id')->unsigned();
             $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendencs');
    }
}
