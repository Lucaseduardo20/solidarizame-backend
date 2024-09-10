<?php

namespace App\Http\Controllers;

use App\Data\Requests\Ong\CreateOngRequestData;
use App\Models\Ong;
use App\Services\OngService;
use Spatie\LaravelData\Exceptions\InvalidDataClass;
use Throwable;

class OngController extends Controller
{
    public function __construct(protected readonly OngService $service)
    {
        //
    }

    public function list()
    {
        return response(
            $this->service->transformCollection(
                $this->service->findALl()
            )->except('address.created_at', 'address.updated_at'),
            200
        );
    }

    /**
     * @throws Throwable
     */
    public function create(CreateOngRequestData $request)
    {
        return response(
            $this->service->create($request)->getData(),
            201
        );
    }

    /**
     * @throws InvalidDataClass
     */
    public function show(Ong $ong)
    {
        return response(
            $ong->getData(),
            200
        );
    }

    /**
     * @throws Throwable
     * @throws InvalidDataClass
     */
    public function update(Ong $ong, CreateOngRequestData $request)
    {
        return response(
            $this->service->update($ong, $request)->getData(),
            200
        );
    }

    public function delete(Ong $ong)
    {
        $this->service->delete($ong);

        return response()->noContent();
    }
}
