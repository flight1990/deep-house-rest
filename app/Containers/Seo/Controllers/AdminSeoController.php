<?php

namespace App\Containers\Seo\Controllers;

use App\Containers\Seo\Actions\CreateSeoAction;
use App\Containers\Seo\Actions\DeleteSeoAction;
use App\Containers\Seo\Actions\FindSeoAction;
use App\Containers\Seo\Actions\GetSeoAction;
use App\Containers\Seo\Actions\UpdateSeoAction;
use App\Containers\Seo\Requests\CreateSeoRequest;
use App\Containers\Seo\Requests\GetSeoRequest;
use App\Containers\Seo\Requests\UpdateSeoRequest;
use App\Containers\Seo\Resources\SeoResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminSeoController extends ApiController
{
    public function __construct(
        protected GetSeoAction    $getSeoAction,
        protected FindSeoAction   $findSeoAction,
        protected CreateSeoAction $createSeoAction,
        protected UpdateSeoAction $updateSeoAction,
        protected DeleteSeoAction $deleteSeoAction
    )
    {
    }

    public function index(GetSeoRequest $request): ResourceCollection
    {
        $data = $this->getSeoAction->run($request->validated());
        return $this->respondWithSuccess(SeoResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findSeoAction->run($id);
        return $this->respondWithSuccess(new SeoResource($data));
    }

    public function store(CreateSeoRequest $request): JsonResponse
    {
        $data = $this->createSeoAction->run($request->validated());
        return $this->respondWithSuccessCreate(new SeoResource($data));
    }

    public function update(UpdateSeoRequest $request, int $id): JsonResource
    {
        $data = $this->updateSeoAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new SeoResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteSeoAction->run($id);
        return $this->noContent();
    }
}
