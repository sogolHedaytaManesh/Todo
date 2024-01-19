<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Authentication\EmailVerificationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EmailVerificationController extends Controller
{
	public function __invoke(EmailVerificationRequest $request): JsonResponse
	{
		abort_if($request->user->hasVerifiedEmail(), Response::HTTP_BAD_REQUEST,  __('auth.user_verified_before'));

		$request->user->markEmailVerified();

		return response()->json(data: [
			'message' => __('auth.verified_email_description')
		], status: Response::HTTP_OK);
	}
}
