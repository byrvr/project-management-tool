<?php

namespace App\Repositories\Project;

use App\Models\Project;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Project;

    public function create(array $data): Project;

    public function update(Project $project, array $data): bool;

    public function delete(Project $project): bool;
}
