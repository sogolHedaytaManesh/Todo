<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Authentication\ResetPasswordRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
	public function __invoke(ResetPasswordRequest $request): JsonResponse
	{
		abort_if(!$request->user->hasVerifiedEmail(), Response::HTTP_BAD_REQUEST, ['message' => __('auth.invalid_password_description')]);

		$request->user->update(['password' => Hash::make($request->validated('password'))]);

		return response()->json(data: [
			'message' => __('auth.password_reset_description')
		], status: Response::HTTP_OK);
	}
}
