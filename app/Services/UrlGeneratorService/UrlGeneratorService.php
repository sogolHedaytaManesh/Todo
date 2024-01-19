<?php

namespace App\Services\UrlGeneratorService;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class UrlGeneratorService implements UrlGeneratorServiceContract
{
	/**
	 * @param array $requiredData
	 * @return string
	 */
    public static function generateDashboardVerifyEmailUrl(array $requiredData): string
    {
        return str_replace(
            ['%key', '%token', '%query'],
            [$requiredData['id'], $requiredData['hash'], $requiredData['query']],
            config('urls.dashboard.verify_email_url').'/%key/%token?%query'
        );
    }

	/**
	 * @return string
	 */
    public static function generateDashboardVerifyEmailUrlName(): string
    {
        return config('urls.dashboard.verify_email_name');
    }

	/**
	 * @param array $requiredData
	 * @return string
	 */
    public static function generateDashboardForgotPasswordByEmailUrl(array $requiredData): string
    {
        return str_replace(
            ['%key', '%token', '%query'],
            [$requiredData['id'], $requiredData['hash'], $requiredData['query']],
            config('urls.dashboard.forget_password_by_email_url').'/%key/%token?%query'
        );
    }

	/**
	 * @return string
	 */
    public static function generateDashboardForgotPasswordByName(): string
    {
        return config('urls.dashboard.forget_password_by_email_name');
    }

	/**
	 * @param $urlName
	 * @param $parameters
	 * @return string
	 */
    public static function signUrl($urlName, $parameters): string
    {
        return URL::temporarySignedRoute(
            $urlName,
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            $parameters
        );
    }
}
