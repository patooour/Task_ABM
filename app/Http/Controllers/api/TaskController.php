<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
        $tasks = $this->taskService->getTasks();
        return response()->json([
            'status' => true,
            'message' => 'Tasks retrieved successfully',
            'data' => $tasks
        ]);
    }


    public function store(TaskRequest $request)
    {

        $request->validated();
        $data = $request->all();
        $task = $this->taskService->store($data);
        if (!$task){
            return response()->json([
                'status' => false,
                'message' => 'try again later',
                'data' => null
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully',
            'data' => $task
        ]);
    }


    public function update(TaskRequest $request, string $id)
    {
        $task = $this->taskService->getTask($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task not found or try again later',
                'data' => null
            ], 404);
        }


        $data = $request->only(['title', 'user_id', 'status']);
        $updatedTask = $this->taskService->update($task, $data);

        return response()->json([
            'status' => true,
            'message' => 'Task updated successfully',
            'data' => $updatedTask
        ]);
    }




    public function destroy(string $id)
    {
        $task = $this->taskService->destroy($id);
        if (!$task){
            return response()->json([
                'status' => false,
                'message' => 'try again later',
                'data' => null
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'task deleted successfully',
            'data' => $task
        ]);


    }
}
