<?php

Route::get('/', function () {
    return view('tasks.index');
});

Route::get('api/tasks', 'TaskController@index');
