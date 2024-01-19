<?php

namespace App\Services\MailService;

use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use App\Notifications\ForgotPasswordByEmailNotification;
use Illuminate\Support\Facades\Log;

class MailService implements MailServiceContract
{
	/**
	 * @param User $user
	 * @return void
	 */
	public static function sendEmailVerificationNotification(User $user): void
	{
		try {
			$user->notify(new EmailVerificationNotification());
		} catch (\Exception $exception) {
			Log::error("Email Verification Error on UserID : {$user->id}", (array)$exception);
		}
	}

	/**
	 * @param User $user
	 * @return void
	 */
	public static function sendForgotPasswordNotification(User $user): void
	{
		try {
			$user->notify(new ForgotPasswordByEmailNotification());
		} catch (\Exception $exception) {
			Log::error("Forget Password Error on UserID : {$user->id}", (array)$exception);
		}
	}
}
