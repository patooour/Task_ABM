<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
   public $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    public function getTasks()
    {
        $tasks = $this->taskRepository->getTasks();
        return $tasks;
    }
    public function getTask($id)
    {
        $task = $this->taskRepository->getTask($id);
        return $task;

    }


    public function store($data)
    {
        $tasks = $this->taskRepository->store($data);
        return $tasks;
    }


    public function update($task,$data)
    {
        $task = $this->taskRepository->update($task,$data);
        return $task;
    }
    public function destroy($id)
    {
        $task = $this->taskRepository->getTask($id);
        if (!$task){
            return response()->json([
                'status' => false,
                'message' => 'try again later',
                'data' => null
            ]);
        }
        return  $this->taskRepository->destroy($task);

    }
}
