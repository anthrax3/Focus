<?php

Route::get('/', function () {
    return view('tasks.index');
});

Route::get('api/tasks', 'TaskController@index');
Route::post('api/tasks', 'TaskController@store');
Route::put('api/tasks/{task}', 'TaskController@update');
