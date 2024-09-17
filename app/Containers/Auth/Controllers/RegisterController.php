<?php

namespace App\Containers\Auth\Controllers;

use App\Containers\Reviews\Actions\CreateReviewAction;
use App\Containers\Reviews\Requests\CreateReviewRequest;
use App\Containers\Users\Actions\CreateTokenAction;
use App\Containers\Users\Actions\CreateUserAction;
use App\Containers\Users\Requests\CreateUserRequest;
use App\Containers\Users\Resources\UserResource;
use App\Http\Controllers\ApiController;

class RegisterController extends ApiController
{
    public function __construct(
        protected CreateUserAction $createUserAction,
        protected CreateTokenAction  $createTokenAction
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
