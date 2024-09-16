<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Carousels\CreateCarouselAction;
use App\Actions\Carousels\DeleteCarouselAction;
use App\Actions\Carousels\FindCarouselAction;
use App\Actions\Carousels\GetCarouselsAction;
use App\Actions\Carousels\UpdateCarouselAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Carousels\CreateCarouselRequest;
use App\Http\Requests\Carousels\GetCarouselsRequest;
use App\Http\Requests\Carousels\UpdateCarouselRequest;
use App\Http\Resources\CarouselResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarouselController extends BaseController
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
