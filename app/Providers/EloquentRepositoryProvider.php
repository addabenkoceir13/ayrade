<?php

namespace App\Providers;

use App\Repositories\Task\EloquentTask;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;



class EloquentRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUser::class);
        $this->app->bind(TaskRepository::class, EloquentTask::class);
    }
}
