<?php

namespace App\Data\Requests\AddressOng;

use Spatie\LaravelData\Data;

class UpdateAddressRequestData extends Data
{
    public function __construct(
        public string $zipcode,
        public string $street,
        public string $number,
        public ?string $complement,
        public string $neighborhood,
        public string $city,
        public string $state,
    )
    {
        //
    }
}
