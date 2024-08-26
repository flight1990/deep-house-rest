<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseController extends Controller
{
    protected int $statusCode = 200;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function respondWithSuccess($resource, string $message = 'success'): ResourceCollection|JsonResource
    {
        return $resource->additional(['message' => $message]);
    }

    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondWithSuccessCreate($resource, string $message = 'success')
    {
        return $this->setStatusCode(201)->respondWithArray([
            'data' => $resource,
            'message' => $message
        ]);
    }

    public function respondWithArray(array $array, array $headers = [], string $message = 'success')
    {
        $array = array_merge(['message' => $message], $array);
        return response()->json($array, $this->statusCode, $headers);
    }

    public function respondWithMessage(string $message, int $code = 200)
    {
        return $this->setStatusCode($code)->respondWithArray([
            'message' => $message
        ]);
    }

    protected function respondWithError(string $message, array $errors = [])
    {
        $response = [
            'message' => $message
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return $this->respondWithArray($response);
    }

    public function noContent($status = 204): JsonResponse
    {
        return new JsonResponse(null, $status);
    }
}
