<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class UrlGenerator
{
	public static function generateDashboardVerifyEmailUrl(array $requiredData): string
	{
		return str_replace(
			['%key', '%token', '%query'],
			[$requiredData['id'], $requiredData['hash'], $requiredData['query']],
			config('urls.dashboard.verify_email_url') . '/%key/%token?%query'
		);
	}

	public static function generateDashboardVerifyEmailUrlName(): string
	{
		return config('urls.dashboard.verify_email_name');
	}

	public static function generateDashboardForgotPasswordByEmailUrl(array $requiredData): string
	{
		return str_replace(
			['%key', '%token', '%query'],
			[$requiredData['id'], $requiredData['hash'], $requiredData['query']],
			config('urls.dashboard.forget_password_by_email_url') . '/%key/%token?%query'
		);
	}

	public static function generateDashboardForgotPasswordByName(): string
	{
		return config('urls.dashboard.forget_password_by_email_name');
	}

	public static function signUrl($urlName, $parameters): string
	{
		return URL::temporarySignedRoute(
			$urlName,
			Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
			$parameters
		);
	}
}
