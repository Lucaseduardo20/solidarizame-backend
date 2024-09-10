<?php

namespace App\Services;

use App\Data\Requests\AddressOng\UpdateAddressRequestData;
use App\Data\Requests\Ong\CreateOngRequestData;
use App\Data\Responses\OngData;
use App\Models\Address;
use App\Models\Ong;
use Illuminate\Support\Collection;
use Throwable;

class OngService extends Service
{
    public function referenceData(): string
    {
        return OngData::class;
    }

    public function findALl(): Collection
    {
        return Ong::with('address', 'flags')->get();
    }

    /**
     * @param CreateOngRequestData $data
     * @return Ong
     * @throws Throwable
     */
    public function create(CreateOngRequestData $data): Ong
    {
        return Ong::create($data->transform());
    }

    /**
     * @throws Throwable
     */
    public function update(Ong $ong, CreateOngRequestData $data): Ong
    {
        $ong->update($data->transform());

        $ong->refresh();

        return $ong;
    }

    public function delete(Ong $ong): ?bool
    {
        return $ong->delete();
    }

    public function getAddress(Ong $ong)
    {
        return $ong->load('address')->address;
    }

    /**
     * @throws Throwable
     */
    public function updateAddress(Ong $ong, UpdateAddressRequestData $data): Address
    {
        $address = $ong->address ?? new Address([
            'addressable_id' => $ong->id,
            'addressable_type' => $ong->getMorphClass()
        ]);

        $address->fill($data->transform());

        $address->save();

        return $address;
    }
}
