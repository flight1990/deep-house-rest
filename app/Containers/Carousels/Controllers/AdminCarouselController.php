<?php

namespace App\Containers\Carousels\Controllers;

use App\Containers\Carousels\Actions\CreateCarouselAction;
use App\Containers\Carousels\Actions\DeleteCarouselAction;
use App\Containers\Carousels\Actions\FindCarouselAction;
use App\Containers\Carousels\Actions\GetCarouselsAction;
use App\Containers\Carousels\Actions\UpdateCarouselAction;
use App\Containers\Carousels\Requests\CreateCarouselRequest;
use App\Containers\Carousels\Requests\GetCarouselsRequest;
use App\Containers\Carousels\Requests\UpdateCarouselRequest;
use App\Containers\Carousels\Resources\CarouselResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCarouselController extends ApiController
{
    public function __construct(
        protected GetCarouselsAction   $getCarouselsAction,
        protected FindCarouselAction   $findCarouselAction,
        protected CreateCarouselAction $createCarouselAction,
        protected UpdateCarouselAction $updateCarouselAction,
        protected DeleteCarouselAction $deleteCarouselAction
    )
    {
    }

    public function index(GetCarouselsRequest $request): ResourceCollection
    {
        $data = $this->getCarouselsAction->run($request->validated());
        return $this->respondWithSuccess(CarouselResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findCarouselAction->run($id);
        return $this->respondWithSuccess(new CarouselResource($data));
    }

    public function store(CreateCarouselRequest $request): JsonResponse
    {
        $data = $this->createCarouselAction->run($request->validated());
        return $this->respondWithSuccessCreate(new CarouselResource($data));
    }

    public function update(UpdateCarouselRequest $request, int $id): JsonResource
    {
        $data = $this->updateCarouselAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new CarouselResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteCarouselAction->run($id);
        return $this->noContent();
    }
}
