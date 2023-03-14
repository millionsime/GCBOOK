<?php

use App\Question;

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

});



Route::get('questions/{id}', function($id){
    return Question::where('categroys_id', $id)->with('choice:id,content,is_answer,questions_id')->limit(5)->get();
});