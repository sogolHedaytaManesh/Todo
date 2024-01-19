<?php

namespace App\Http\Controllers\Api\V1\Authentication;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Authentication\RegisterRequest;
use App\Models\User;
use App\Services\MailService\MailServiceContract as MailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
	public function __invoke(RegisterRequest $request, MailService $mailService): JsonResponse
	{
		$user = User::create(
			$request->only(
				'first_name',
				'last_name',
				'email',
			)
			+
			['password' => Hash::make($request->validated('password'))]
		);

		$mailService::sendEmailVerificationNotification($user);

		return response()->json(data: [
			'message' => __('auth.verify_your_account_description')
		], status: Response::HTTP_CREATED);
	}
}
