<?php

namespace App\Http\Controllers;

use App\Actions\Users\CreateTokenAction;
use App\Actions\Users\GetAuthUserAction;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function __construct(
        protected CreateTokenAction $createTokenAction,
        protected GetAuthUserAction $getAuthUserAction
    )
    {
    }

    public function user(): JsonResource
    {
        $user = $this->getAuthUserAction->run();
        return $this->respondWithSuccess(new UserResource($user));
    }

    public function login(Request $request): JsonResponse|JsonResource
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {

            $data = $this->getAuthUserAction->run();
            $token = $this->createTokenAction->run($data);

            return $this->respondWithArray([
                'user' => new UserResource($data),
                'token' => $token
            ]);

        } else {
            return $this->respondWithError('Unauthorised');
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->respondWithMessage('User logout successfully');
    }
}
