<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Authentication\LoginRequest;
use App\Http\Resources\V1\Dashboard\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
	public function __invoke(LoginRequest $request): JsonResource|JsonResponse
	{
		$user = User::isRegistered($request->validated('email'))->first();

		abort_if(is_null($user), Response::HTTP_UNAUTHORIZED);
		abort_if(!Hash::check($request->validated('password'), $user->password), Response::HTTP_UNAUTHORIZED);// Todo
		abort_if(!$user->hasVerifiedEmail(), Response::HTTP_BAD_REQUEST, __('auth.verify_your_account_description'));

		return UserResource::make($user)
			->additional(['meta' => ['token' => $user->createToken('API')->plainTextToken],]);
	}
}
