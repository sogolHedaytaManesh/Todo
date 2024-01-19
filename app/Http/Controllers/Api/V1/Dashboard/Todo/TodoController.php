<?php

namespace App\Http\Controllers\Api\V1\Dashboard\Todo;

use App\Enums\TodoStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Dashboard\Todo\TodoCreateRequest;
use App\Http\Requests\Api\V1\Dashboard\Todo\TodoIndexRequest;
use App\Http\Requests\Api\V1\Dashboard\Todo\TodoUpdateRequest;
use App\Http\Resources\V1\Dashboard\User\TodoResource;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
	public function index(TodoIndexRequest $request): ResourceCollection
	{
		$todos = Todo::with('user')->filter($request->validated())->paginate(10); // Todo pagination handler

		return TodoResource::collection($todos);
	}

	public function create(TodoCreateRequest $request): JsonResponse
	{
		$request->user()->todos()->create($request->validated());

		return response()->json(status: Response::HTTP_CREATED);
	}

	public function show(Todo $todo): TodoResource
	{
		$this->authorize('view', $todo);

		$todo->fresh();
		$todo->load('user');

		return TodoResource::make($todo);
	}

	public function update(TodoUpdateRequest $request, Todo $todo): JsonResponse
	{
		$this->authorize('update', $todo);

		$todo->update(['status' => TodoStatusEnum::tryFromName(strtoupper($request->validated('status')))]);

		return response()->json(status: Response::HTTP_ACCEPTED);
	}

	public function delete(Todo $todo): JsonResponse
	{
		$this->authorize('delete', $todo);

		$todo->delete();
		return response()->json(status: Response::HTTP_NO_CONTENT);
	}
}
