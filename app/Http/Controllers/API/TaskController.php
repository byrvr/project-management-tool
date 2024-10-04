<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->middleware('auth:sanctum');
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of tasks for a specific project.
     *
     * @param  int  $projectId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($projectId)
    {
        $tasks = $this->taskRepository->getAllByProject($projectId);
        return response()->json($tasks, Response::HTTP_OK);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $projectId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in-progress,done',
        ]);

        $validated['project_id'] = $projectId;

        $task = $this->taskRepository->create($validated);

        return response()->json($task, Response::HTTP_CREATED);
    }

    /**
     * Display the specified task.
     *
     * @param  int  $projectId
     * @param  int  $taskId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($projectId, $taskId)
    {
        $task = $this->taskRepository->findById($projectId, $taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @param  int  $taskId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $projectId, $taskId)
    {
        $task = $this->taskRepository->findById($projectId, $taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:todo,in-progress,done',
        ]);

        $this->taskRepository->update($task, $validated);

        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  int  $projectId
     * @param  int  $taskId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($projectId, $taskId)
    {
        $task = $this->taskRepository->findById($projectId, $taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $this->taskRepository->delete($task);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
