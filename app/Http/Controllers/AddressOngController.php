<?php

namespace App\Http\Controllers;

use App\Data\Requests\AddressOng\UpdateAddressRequestData;
use App\Models\Ong;
use App\Services\OngService;
use Throwable;

class AddressOngController extends Controller
{
    public function __construct(protected readonly OngService $ongService)
    {
        //
    }

    /**
     * @throws Throwable
     */
    public function show(Ong $ong)
    {
        $address = $this->ongService->getAddress($ong);

        if (!$address) {
            abort(404);
        }

        return response(
            $address->getData()->include('created_at', 'updated_at'),
            200
        );
    }

    /**
     * @throws Throwable
     */
    public function update(Ong $ong, UpdateAddressRequestData $request)
    {
        return response(
            $this->ongService->updateAddress($ong, $request)->getData(),
            200
        );
    }
}
