<?php

namespace App\Containers\Media\Controllers;

use App\Containers\Media\Actions\CreateMediaAction;
use App\Containers\Media\Actions\DeleteMediaAction;
use App\Containers\Media\Actions\GetMediaAction;
use App\Containers\Media\Requests\CreateMediaRequest;
use App\Containers\Media\Requests\GetMediaRequest;
use App\Containers\Media\Resources\MediaResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminMediaController extends ApiController
{
    public function __construct(
        protected GetMediaAction    $getMediaAction,
        protected CreateMediaAction $createMediaAction,
        protected DeleteMediaAction $deleteMediaAction
    )
    {
    }

    public function index(GetMediaRequest $request): ResourceCollection|JsonResource
    {
        $data = $this->getMediaAction->run($request->validated());
        return $this->respondWithSuccess(MediaResource::collection($data));
    }

    public function store(CreateMediaRequest $request)
    {
        $data = $this->createMediaAction->run($request->validated());
        return $this->respondWithSuccessCreate(new MediaResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteMediaAction->run($id);
        return $this->noContent();
    }
}
