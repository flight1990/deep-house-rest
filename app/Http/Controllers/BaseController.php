<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function sendResponse($data, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function sendError(string $message, array $errors = [], int $code = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    public function sendSimpleError(string $message, int $code = 404): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
