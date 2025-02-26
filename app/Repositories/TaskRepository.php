<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{


    public function getTasks()
    {
        $tasks = Task::all();
        return $tasks;
    }
    public function getTask($id)
    {
        $task = Task::find($id);
        return $task;
    }


    public function store($data)
    {
        $task = Task::create($data);
        return $task;
    }


    public function update($task,$data)
    {
        $task->update($data);
        return $task;
    }
    public function destroy($task)
    {
        $task->delete();
        return $task;
    }
}
