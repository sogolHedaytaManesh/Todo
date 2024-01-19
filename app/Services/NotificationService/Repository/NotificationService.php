<?php

namespace App\Services\NotificationService\Repository;

use App\Events\DispatchNotification;

class NotificationService implements NotificationServiceContract
{
	/**
	 * @param string $target
	 * @param array $message
	 * @param string $broadcastAs
	 * @return bool
	 */
	public static function sendNotification(string $target, array $message, string $broadcastAs = 'undefined'): bool
	{
		DispatchNotification:: dispatch(
			array_merge(
				[
					'target'      => $target,
					'message'     => $message,
					'broadcastAs' => $broadcastAs
				]
			)
		);

		return true;
	}
}
