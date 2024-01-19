<?php

namespace App\Observers;


use App\Models\Todo;
use App\Services\NotificationService\Repository\NotificationServiceContract as NotificationService;

class TodoObserver
{
	public function __construct(public readonly NotificationService $notificationService)
	{
		//
	}

	public function updated(Todo $todo): void
	{
		$target = "user.{$todo->user->id}.todo";
		$message = [
			'message' => __('todo.completed'),
			'object'  => $todo
		];
		$broadcastAs = 'todo.status-updated';

		$this->notificationService::sendNotification(target: $target, message: $message, broadcastAs: $broadcastAs);
	}
}
