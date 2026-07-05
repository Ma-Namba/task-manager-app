<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * タスク一覧を取得
     */
    public function index(): AnonymousResourceCollection
    {
        $tasks = Task::with(['category', 'user'])
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Display the specified resource.
     */
    /**
     * タスク詳細を取得
     */
    public function show(string $id)
    {
        $task->load(['category', 'user']);

        return new TaskResource($task);
    }

}
