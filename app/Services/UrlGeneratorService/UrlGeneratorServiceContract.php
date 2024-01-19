<?php

namespace App\Services\UrlGeneratorService;

interface UrlGeneratorServiceContract
{
	/**
	 * @param array $requiredData
	 * @return string
	 */
    public static function generateDashboardVerifyEmailUrl(array $requiredData): string;

	/**
	 * @return string
	 */
    public static function generateDashboardVerifyEmailUrlName(): string;

	/**
	 * @param $urlName
	 * @param $parameters
	 * @return string
	 */
    public static function signUrl($urlName, $parameters): string;
}
