<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Carousels\GetCarouselsAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Carousels\GetCarouselsRequest;
use App\Http\Resources\CarouselResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarouselController extends BaseController
{
    public function __construct(
        protected GetCarouselsAction   $getCarouselsAction,
    )
    {
    }

    public function index(GetCarouselsRequest $request): ResourceCollection
    {
        $data = $this->getCarouselsAction->run($request->validated());
        return $this->respondWithSuccess(CarouselResource::collection($data));
    }
}
