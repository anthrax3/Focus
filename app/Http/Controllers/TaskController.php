<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    public function index()
    {
        return Task::query()
            ->orderBy('completed')
            ->orderBy('prioritised', 'desc')
            ->orderBy('sort')
            ->orderBy('dueDate')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function create()
    {

    }

    public function store()
    {
        $input = Input::get();
//        $input['dueDate'] = Carbon::createFromFormat('Y-m-d H:i', $input['dueDate']);
        return Task::create($input);
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
