<?php

namespace App\Data\Responses;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class AddressData extends Data
{
    public function __construct(
        public int $id,
        public string $zipcode,
        public string $street,
        public string $number,
        public ?string $complement,
        public string $neighborhood,
        public string $city,
        public string $state,
        #[MapName('createdAt')]
        public Lazy|Carbon $created_at,
        #[MapName('updatedAt')]
        public Lazy|Carbon $updated_at,
    )
    {
        //
    }
}
