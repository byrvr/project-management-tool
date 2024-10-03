<?php

namespace App\Repositories\Project;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll(): Collection
    {
        return Project::with('tasks')->get();
    }

    public function findById(int $id): ?Project
    {
        return Project::with('tasks')->find($id);
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
