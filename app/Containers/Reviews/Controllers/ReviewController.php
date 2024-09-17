<?php

namespace App\Containers\Reviews\Controllers;

use App\Containers\Reviews\Actions\CreateReviewAction;
use App\Containers\Reviews\Actions\GetReviewsAction;
use App\Containers\Reviews\Requests\CreateReviewRequest;
use App\Containers\Reviews\Requests\GetReviewsRequest;
use App\Containers\Reviews\Resources\ReviewResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewController extends ApiController
{
    public function __construct(
        protected GetReviewsAction   $getReviewsAction,
        protected CreateReviewAction $createReviewAction
    )
    {
    }

    public function index(GetReviewsRequest $request): ResourceCollection
    {
        $data = $this->getReviewsAction->run($request->validated());
        return $this->respondWithSuccess(ReviewResource::collection($data));
    }

    public function store(CreateReviewRequest $request): JsonResource
    {
        $data = $this->createReviewAction->run($request->validated());
        return $this->respondWithSuccessCreate(new ReviewResource($data));
    }
}
