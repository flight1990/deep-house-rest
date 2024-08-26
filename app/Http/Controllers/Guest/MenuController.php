<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Menu\GetMenuAction;
use App\Http\Controllers\BaseController;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuController extends BaseController
{
    public function __construct(
        protected GetMenuAction    $getMenuAction,
    )
    {
    }

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getMenuAction->run($request->all());
        return $this->respondWithSuccess(MenuResource::collection($data));
    }
}
