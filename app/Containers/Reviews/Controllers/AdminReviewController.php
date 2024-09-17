<?php

namespace App\Containers\Reviews\Controllers;

use App\Containers\Reviews\Actions\CreateReviewAction;
use App\Containers\Reviews\Actions\DeleteReviewAction;
use App\Containers\Reviews\Actions\FindReviewAction;
use App\Containers\Reviews\Actions\GetReviewsAction;
use App\Containers\Reviews\Actions\UpdateReviewAction;
use App\Containers\Reviews\Requests\CreateReviewRequest;
use App\Containers\Reviews\Requests\GetReviewsRequest;
use App\Containers\Reviews\Requests\UpdateReviewRequest;
use App\Containers\Reviews\Resources\ReviewResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminReviewController extends ApiController
{
    public function __construct(
        protected GetReviewsAction   $getReviewsAction,
        protected FindReviewAction   $findReviewAction,
        protected CreateReviewAction $createReviewAction,
        protected UpdateReviewAction $updateReviewAction,
        protected DeleteReviewAction $deleteReviewAction
    )
    {
    }

    public function index(GetReviewsRequest $request): ResourceCollection
    {
        $data = $this->getReviewsAction->run($request->validated());
        return $this->respondWithSuccess(ReviewResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findReviewAction->run($id);
        return $this->respondWithSuccess(new ReviewResource($data));
    }

    public function store(CreateReviewRequest $request): JsonResponse
    {
        $data = $this->createReviewAction->run($request->validated());
        return $this->respondWithSuccessCreate(new ReviewResource($data));
    }

    public function update(UpdateReviewRequest $request, int $id): JsonResource
    {
        $data = $this->updateReviewAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new ReviewResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteReviewAction->run($id);
        return $this->noContent();
    }
}
