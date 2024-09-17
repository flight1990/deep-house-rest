<?php

namespace App\Containers\Menu\Controllers;

use App\Containers\Menu\Actions\GetMenuAction;
use App\Containers\Menu\Requests\GetMenuRequest;
use App\Containers\Menu\Resources\MenuResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuController extends ApiController
{
    public function __construct(
        protected GetMenuAction $getMenuAction,
    )
    {
    }

    public function index(GetMenuRequest $request): ResourceCollection
    {
        $data = $this->getMenuAction->run($request->validated());
        return $this->respondWithSuccess(MenuResource::collection($data));
    }
}
