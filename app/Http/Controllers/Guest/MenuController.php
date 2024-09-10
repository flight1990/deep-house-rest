<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Menu\GetMenuAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Menu\GetMenuRequest;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuController extends BaseController
{
    public function __construct(
        protected GetMenuAction    $getMenuAction,
    )
    {
    }

    public function index(GetMenuRequest $request): ResourceCollection
    {
        $data = $this->getMenuAction->run($request->validated());
        return $this->respondWithSuccess(MenuResource::collection($data));
    }
}
