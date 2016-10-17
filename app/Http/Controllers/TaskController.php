<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    }

    public function destroy(Task $task)
    {

    }
}
