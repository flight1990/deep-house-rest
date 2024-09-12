<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Media\CreateMediaAction;
use App\Actions\Media\DeleteMediaAction;
use App\Actions\Media\GetMediaAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Media\CreateMediaRequest;
use App\Http\Requests\Media\GetMediaRequest;
use App\Http\Resources\MediaResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MediaController extends BaseController
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
