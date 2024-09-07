<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Users\CreateUserAction;
use App\Actions\Users\DeleteUserAction;
use App\Actions\Users\FindUserAction;
use App\Actions\Users\GetUsersAction;
use App\Actions\Users\UpdateUserAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
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
