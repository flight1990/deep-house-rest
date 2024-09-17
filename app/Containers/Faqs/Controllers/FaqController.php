<?php

namespace App\Containers\Faqs\Controllers;

use App\Containers\Faqs\Actions\GetFaqsAction;
use App\Containers\Faqs\Requests\GetFaqsRequest;
use App\Containers\Faqs\Resources\FaqResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FaqController extends ApiController
{
    public function __construct(
        protected GetFaqsAction $getFaqsAction,
    )
    {
    }

    public function index(GetFaqsRequest $request): ResourceCollection
    {
        $data = $this->getFaqsAction->run($request->validated());
        return $this->respondWithSuccess(FaqResource::collection($data));
    }
}
