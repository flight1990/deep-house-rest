<?php

namespace App\Containers\Carousels\Controllers;

use App\Containers\Carousels\Actions\GetCarouselsAction;
use App\Containers\Carousels\Requests\GetCarouselsRequest;
use App\Containers\Carousels\Resources\CarouselResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarouselController extends ApiController
{
    public function __construct(
        protected GetCarouselsAction $getCarouselsAction,
    )
    {
    }

    public function index(GetCarouselsRequest $request): ResourceCollection
    {
        $data = $this->getCarouselsAction->run($request->validated());
        return $this->respondWithSuccess(CarouselResource::collection($data));
    }
}
