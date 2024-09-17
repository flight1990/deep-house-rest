<?php

namespace App\Containers\Users\Controllers;

use App\Containers\Users\Actions\CreateUserAction;
use App\Containers\Users\Actions\DeleteUserAction;
use App\Containers\Users\Actions\FindUserAction;
use App\Containers\Users\Actions\GetUsersAction;
use App\Containers\Users\Actions\UpdateUserAction;
use App\Containers\Users\Requests\CreateUserRequest;
use App\Containers\Users\Requests\GetUsersRequest;
use App\Containers\Users\Requests\UpdateUserRequest;
use App\Containers\Users\Resources\UserResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminUserController extends ApiController
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

    public function index(GetUsersRequest $request): ResourceCollection
    {
        $data = $this->getUsersAction->run($request->validated());
        return $this->respondWithSuccess(UserResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findUserAction->run($id);
        return $this->respondWithSuccess(new UserResource($data));
    }

    public function store(CreateUserRequest $request): JsonResponse
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
