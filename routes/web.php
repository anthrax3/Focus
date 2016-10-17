<?php

Route::get('/', function () {
    return view('tasks.index');
});

Route::get('api/tasks', 'TaskController@index');
Route::put('api/tasks/{task}', 'TaskController@update');
