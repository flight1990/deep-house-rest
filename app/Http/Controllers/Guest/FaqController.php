<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Faqs\GetFaqsAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Faqs\GetFaqsRequest;
use App\Http\Resources\FaqResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FaqController extends BaseController
{
    public function __construct(
        protected GetFaqsAction   $getFaqsAction,
    )
    {
    }

    public function index(GetFaqsRequest $request): ResourceCollection
    {
        $data = $this->getFaqsAction->run($request->validated());
        return $this->respondWithSuccess(FaqResource::collection($data));
    }
}
