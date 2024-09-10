<?php

namespace App\Http\Controllers;

use App\Data\Requests\Flag\CreateFlagRequestData;
use App\Models\Flag;
use App\Services\FlagService;
use Throwable;

class FlagController extends Controller
{
    public function __construct(protected readonly FlagService $service)
    {
        //
    }

    public function list()
    {
        return response(
            $this->service->transformCollection(
                $this->service->findAll()
            ),
            200
        );
    }

    /**
     * @throws Throwable
     */
    public function create(CreateFlagRequestData $request)
    {
        return response(
            $this->service->create($request)->getData(),
            201
        );
    }

    /**
     * @throws Throwable
     */
    public function show(Flag $flag)
    {
        return response(
            $flag->getData(),
            200
        );
    }

    /**
     * @throws Throwable
     */
    public function update(Flag $flag, CreateFlagRequestData $request)
    {
        return response(
            $this->service->update($flag, $request)->getData(),
            200
        );
    }

    public function delete(Flag $flag)
    {
        $this->service->delete($flag);

        return response()->noContent();
    }
}
