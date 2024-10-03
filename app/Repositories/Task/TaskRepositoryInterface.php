<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function getAllByProject(int $projectId): Collection;

    public function findById(int $projectId, int $taskId): ?Task;

    public function create(array $data): Task;

    public function update(Task $task, array $data): bool;

    public function delete(Task $task): bool;
}
