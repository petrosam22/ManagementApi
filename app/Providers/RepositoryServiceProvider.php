<?php

namespace App\Providers;

use App\Services\AuthService;

use App\Repositories\AdminRepositories;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MemberRepositories;
use App\interfaces\AdminRepositoryInterface;
use App\interfaces\MemberRepositoryInterface;
use App\Repositories\AdminPasswordRepositories;
use App\Repositories\MemberPasswordRepositories;
use App\interfaces\AdminPasswordRepositoryInterface;
use App\interfaces\MemberPasswordRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class,AdminRepositories::class);
        $this->app->bind(AdminPasswordRepositoryInterface::class,AdminPasswordRepositories::class);
        $this->app->bind(MemberRepositoryInterface::class,MemberRepositories::class);
        $this->app->bind(MemberPasswordRepositoryInterface::class,MemberPasswordRepositories::class);
     }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
