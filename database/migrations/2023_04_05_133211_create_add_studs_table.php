<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddStudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_studs', function (Blueprint $table) {
           
           
           

            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('dept_id'); 
            $table->string('section')->nullable();
            $table->string('password');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id', 'fk_253_role_role_id_user')->references('id')->on('roles');
            $table->string('remember_token')->nullable();

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
        Schema::dropIfExists('add_studs');
    }
}
