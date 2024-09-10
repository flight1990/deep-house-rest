<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Reviews\CreateReviewAction;
use App\Actions\Reviews\GetReviewsAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Reviews\CreateReviewRequest;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewController extends BaseController
{
    public function __construct(
        protected GetReviewsAction   $getReviewsAction,
        protected CreateReviewAction $createReviewAction
    )
    {
    }

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getReviewsAction->run($request->all());
        return $this->respondWithSuccess(ReviewResource::collection($data));
    }

    public function store(CreateReviewRequest $request): JsonResource
    {
        $data = $this->createReviewAction->run($request->validated());
        return $this->respondWithSuccessCreate(new ReviewResource($data));
    }
}
