<?php

namespace App\Providers;

use App\Services\MailService\MailService;
use App\Services\MailService\MailServiceContract;
use App\Services\NotificationService\Repository\NotificationServiceContract;
use App\Services\NotificationService\Repository\NotificationService;
use App\Services\UrlGeneratorService\UrlGeneratorService;
use App\Services\UrlGeneratorService\UrlGeneratorServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
		$this->app->bind(MailServiceContract::class, MailService::class);
		$this->app->bind(UrlGeneratorServiceContract::class, UrlGeneratorService::class);
		$this->app->bind(NotificationServiceContract::class, NotificationService::class);
	}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
