<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Users\CreateTokenAction;
use App\Actions\Users\CreateUserAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Resources\UserResource;

class RegisterController extends BaseController
{
    public function __construct(
        protected CreateUserAction  $createUserAction,
        protected CreateTokenAction $createTokenAction
    )
    {
    }

    public function register(CreateUserRequest $request)
    {
        $data = $this->createUserAction->run($request->validated());
        $token = $this->createTokenAction->run($data);

        $response = [
            'user' => new UserResource($data),
            'token' => $token
        ];

        return $this->respondWithSuccessCreate($response);
    }
}
