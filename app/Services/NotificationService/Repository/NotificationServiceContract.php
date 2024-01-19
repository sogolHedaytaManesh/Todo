<?php

namespace App\Services\NotificationService\Repository;


interface NotificationServiceContract
{
	/**
	 * @param string $target
	 * @param array $message
	 * @param string $broadcastAs
	 * @return bool
	 */
	public static function sendNotification(string $target, array $message, string $broadcastAs = "undefined"): bool;
}
