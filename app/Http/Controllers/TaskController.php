<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    public function index()
    {
        return Task::query()->orderBy('completed')->get();
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit(Task $task)
    {

    }

    public function update(Task $task)
    {
        $task->update(Input::get());
        return $task;
    }

    public function destroy(Task $task)
    {

    }
}
