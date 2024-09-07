<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Reviews\CreateReviewAction;
use App\Actions\Reviews\DeleteReviewAction;
use App\Actions\Reviews\FindReviewAction;
use App\Actions\Reviews\GetReviewsAction;
use App\Actions\Reviews\UpdateReviewAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Reviews\CreateReviewRequest;
use App\Http\Requests\Reviews\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewController extends BaseController
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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getReviewsAction->run($request->all());
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
