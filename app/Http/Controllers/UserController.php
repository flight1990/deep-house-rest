<?php

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Actions\DeleteUserAction;
use App\Actions\FindUserAction;
use App\Actions\GetUsersAction;
use App\Actions\UpdateUserAction;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(
        protected GetUsersAction   $getUsersAction,
        protected FindUserAction   $findUserAction,
        protected CreateUserAction $createUserAction,
        protected UpdateUserAction $updateUserAction,
        protected DeleteUserAction $deleteUserAction
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $data = $this->getUsersAction->run($request->all());
        return $this->sendResponse(UserResource::collection($data));
    }

    public function show(int|string $identifier): JsonResponse
    {
        try {
            $data = $this->findUserAction->run($identifier);
            return $this->sendResponse(new UserResource($data));
        } catch (ModelNotFoundException $e) {
            return $this->sendSimpleError('User not found.');
        }
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $data = $this->createUserAction->run($request->validated());
        return $this->sendResponse(new UserResource($data), 'User created.', 201);
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        try {
            $data = $this->updateUserAction->run($request->validated(), $id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('User not found.');
        }

        return $this->sendResponse(new UserResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->deleteUserAction->run($id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('User not found.');
        }

        return $this->sendResponse(null, 'User deleted.', 204);
    }
}
