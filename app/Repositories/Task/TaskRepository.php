<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllByProject(int $projectId): Collection
    {
        return Task::where('project_id', $projectId)->get();
    }

    public function findById(int $projectId, int $taskId): ?Task
    {
        return Task::where('project_id', $projectId)->find($taskId);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
