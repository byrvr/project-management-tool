<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\Task\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
