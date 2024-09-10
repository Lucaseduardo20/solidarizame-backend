<?php

namespace App\Http\Controllers;

use App\Data\Requests\FlagOng\SyncRequestData;
use App\Models\Ong;
use App\Services\FlagService;

class FlagOngController extends Controller
{
    public function __construct(protected readonly FlagService $flagService)
    {
        //
    }

    public function list(Ong $ong)
    {
        return response(
            $this->flagService->transformCollection(
                $this->flagService->findAll($ong)
            ),
            200
        );
    }

    public function sync(Ong $ong, SyncRequestData $request)
    {
        return response(
            $this->flagService->syncSlug($ong, $request->flags)->getData(),
            200
        );
    }
}
