<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\Task\IndexRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Requests\Task\DestroyRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(IndexRequest $indexRequest): JsonResponse
    {
        $tasks = Task::query()
            ->when($indexRequest->status, fn($query) => $query->where('status', $indexRequest->status))
            ->when($indexRequest->assigned_to, fn($query) => $query->where('assigned_to', $indexRequest->assigned_to))
            ->when($indexRequest->project_id, fn($query) => $query->where('project_id', $indexRequest->project_id))
            ->when($indexRequest->due_date, fn($query) => $query->whereDate('due_at', $indexRequest->due_date))
            ->get();

        return response()->json([
            'message' => 'Tasks Retrieved Successfully',
            'data' => TaskResource::collection($tasks),
        ], 200);
    }

    public function store(StoreRequest $storeRequest): JsonResponse
    {
        $task = Task::create($storeRequest->validated());

        return response()->json([
            'message' => 'Task Created Successfully',
            'data' => new TaskResource($task),
        ], 201);
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'message' => 'Task Retrieved Successfully',
            'data' => new TaskResource($task),
        ], 200);
    }

    public function update(UpdateRequest $updateRequest, Task $task): JsonResponse
    {
        $task->update($updateRequest->validated());

        return response()->json([
            'message' => 'Task Updated Successfully',
            'data' => new TaskResource($task),
        ], 200);
    }

    public function destroy(DestroyRequest $destroyRequest, Task $task): JsonResponse
    {
        $task->delete();

        return response()->json([
            'message' => 'Task Deleted Successfully',
        ], 200);
    }
}
