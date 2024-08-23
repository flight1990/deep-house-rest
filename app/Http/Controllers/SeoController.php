<?php

namespace App\Http\Controllers;

use App\Actions\CreateSeoAction;
use App\Actions\DeleteSeoAction;
use App\Actions\FindSeoAction;
use App\Actions\GetSeoAction;
use App\Actions\UpdateSeoAction;
use App\Http\Requests\CreateSeoRequest;
use App\Http\Requests\UpdateSeoRequest;
use App\Http\Resources\MenuResource;
use App\Http\Resources\SeoResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function index(Request $request): JsonResponse
    {
        $data = $this->getSeoAction->run($request->all());
        return $this->sendResponse(SeoResource::collection($data));
    }

    public function show(int|string $identifier): JsonResponse
    {
        try {
            $data = $this->findSeoAction->run($identifier);
            return $this->sendResponse(new SeoResource($data));
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Seo not found.');
        }
    }

    public function store(CreateSeoRequest $request): JsonResponse
    {
        $data = $this->createSeoAction->run($request->validated());
        return $this->sendResponse(new SeoResource($data), 'Seo created.', 201);
    }

    public function update(UpdateSeoRequest $request, int $id): JsonResponse
    {
        try {
            $data = $this->updateSeoAction->run($request->validated(), $id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Seo not found.');
        }

        return $this->sendResponse(new MenuResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->deleteSeoAction->run($id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Seo not found.');
        }

        return $this->sendResponse(null, 'Seo deleted.', 204);
    }
}
