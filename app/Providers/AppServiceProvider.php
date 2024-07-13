<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PriorityRepository;
use App\Repositories\PriorityRepositoryInterface;
use App\Repositories\ProgressRepository;
use App\Repositories\ProgressRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\CategoryService;
use App\Services\PriorityService;
use App\Services\ProgressService;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });

        $this->app->bind(ProgressRepositoryInterface::class, ProgressRepository::class);
        $this->app->bind(ProgressService::class, function ($app) {
            return new ProgressService($app->make(ProgressRepositoryInterface::class));
        });

        $this->app->bind(PriorityRepositoryInterface::class, PriorityRepository::class);
        $this->app->bind(PriorityService::class, function ($app) {
            return new PriorityService($app->make(PriorityRepositoryInterface::class));
        });

        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(TaskService::class, function ($app) {
            return new TaskService($app->make(TaskRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
