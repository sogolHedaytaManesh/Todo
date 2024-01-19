<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Authentication\ForgotPasswordRequest;
use App\Models\User;
use App\Services\MailService\MailServiceContract as MailService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
	public function __invoke(ForgotPasswordRequest $request, MailService $mailService): JsonResponse
	{
		$user = User::isRegistered($request->validated('email'))->first();

		abort_if(
			!$user,
			Response::HTTP_BAD_REQUEST,
			['message' => __('auth.invalid_password_description')]
		);

		abort_if(
			!$user->hasVerifiedEmail(),
			Response::HTTP_FORBIDDEN,
			['message' => __('auth.invalid_password_description')]
		);

		$mailService::sendForgotPasswordNotification($user);

		return response()->json(data: [
			'message' => __('auth.forgot_password_description')
		], status: Response::HTTP_OK);
	}
}
