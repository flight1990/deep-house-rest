<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Faqs\CreateFaqAction;
use App\Actions\Faqs\DeleteFaqAction;
use App\Actions\Faqs\FindFaqAction;
use App\Actions\Faqs\GetFaqsAction;
use App\Actions\Faqs\UpdateFaqAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Faqs\CreateFaqRequest;
use App\Http\Requests\Faqs\GetFaqsRequest;
use App\Http\Requests\Faqs\UpdateFaqRequest;
use App\Http\Resources\FaqResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FaqController extends BaseController
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
