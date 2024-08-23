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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getUsersAction->run($request->all());
        return $this->respondWithSuccess(UserResource::collection($data));
    }

    public function show(int|string $identifier): JsonResource
    {
        $data = $this->findUserAction->run($identifier);
        return $this->respondWithSuccess(new UserResource($data));
    }

    public function store(CreateUserRequest $request): JsonResource
    {
        $data = $this->createUserAction->run($request->validated());
        return $this->respondWithSuccessCreate(new UserResource($data));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResource
    {
        $data = $this->updateUserAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new UserResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteUserAction->run($id);
        return $this->noContent();
    }
}
