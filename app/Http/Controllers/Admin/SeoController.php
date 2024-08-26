<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Seo\CreateSeoAction;
use App\Actions\Seo\DeleteSeoAction;
use App\Actions\Seo\FindSeoAction;
use App\Actions\Seo\GetSeoAction;
use App\Actions\Seo\UpdateSeoAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Seo\CreateSeoRequest;
use App\Http\Requests\Seo\UpdateSeoRequest;
use App\Http\Resources\SeoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SeoController extends BaseController
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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getSeoAction->run($request->all());
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
