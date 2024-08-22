<?php

namespace App\Providers;

use App\Repositories\Contracts\PageRepositoryInterface;
use App\Repositories\PageRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
