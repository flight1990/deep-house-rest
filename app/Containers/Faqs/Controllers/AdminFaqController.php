<?php

namespace App\Containers\Faqs\Controllers;

use App\Containers\Faqs\Actions\CreateFaqAction;
use App\Containers\Faqs\Actions\DeleteFaqAction;
use App\Containers\Faqs\Actions\FindFaqAction;
use App\Containers\Faqs\Actions\GetFaqsAction;
use App\Containers\Faqs\Actions\UpdateFaqAction;
use App\Containers\Faqs\Requests\CreateFaqRequest;
use App\Containers\Faqs\Requests\GetFaqsRequest;
use App\Containers\Faqs\Requests\UpdateFaqRequest;
use App\Containers\Faqs\Resources\FaqResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminFaqController extends ApiController
{
    public function __construct(
        protected GetFaqsAction   $getFaqsAction,
        protected FindFaqAction   $findFaqAction,
        protected CreateFaqAction $createFaqAction,
        protected UpdateFaqAction $updateFaqAction,
        protected DeleteFaqAction $deleteFaqAction
    )
    {
    }

    public function index(GetFaqsRequest $request): ResourceCollection
    {
        $data = $this->getFaqsAction->run($request->validated());
        return $this->respondWithSuccess(FaqResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findFaqAction->run($id);
        return $this->respondWithSuccess(new FaqResource($data));
    }

    public function store(CreateFaqRequest $request): JsonResponse
    {
        $data = $this->createFaqAction->run($request->validated());
        return $this->respondWithSuccessCreate(new FaqResource($data));
    }

    public function update(UpdateFaqRequest $request, int $id): JsonResource
    {
        $data = $this->updateFaqAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new FaqResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteFaqAction->run($id);
        return $this->noContent();
    }
}
