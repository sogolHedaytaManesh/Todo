<?php

namespace App\Services\MailService;

use App\Models\User;

interface MailServiceContract
{
	/**
	 * @param User $user
	 * @return void
	 */
    public static function sendEmailVerificationNotification(User $user): void;

	/**
	 * @param User $user
	 * @return void
	 */
    public static function sendForgotPasswordNotification(User $user): void;
}
