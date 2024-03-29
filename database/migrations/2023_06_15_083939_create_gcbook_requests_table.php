<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGcbookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gcbook_requests', function (Blueprint $table) {
                $table->increments('id');
    
                $table->integer('department_id')->unsigned();
                $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('gcbook_requests');
    }
}
