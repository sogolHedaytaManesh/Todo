<?php

namespace App\Providers;

use App\Events\ForgotPassword;
use App\Listeners\User\SendEmailVerificationNotification;
use App\Listeners\User\SendForgotPasswordByEmailNotification;
use App\Models\Todo;
use App\Observers\TodoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event to listener mappings for the application.
	 *
	 * @var array<class-string, array<int, class-string>>
	 */
	protected $listen = [
		Registered::class     => [
			SendEmailVerificationNotification::class,
		],
		ForgotPassword::class => [
			SendForgotPasswordByEmailNotification::class,
		],
	];

	protected $observers = [
		Todo::class => [TodoObserver::class],
	];

	/**
	 * Register any events for your application.
	 */
	public function boot(): void
	{

	}

	/**
	 * Determine if events and listeners should be automatically discovered.
	 */
	public function shouldDiscoverEvents(): bool
	{
		return false;
	}
}
