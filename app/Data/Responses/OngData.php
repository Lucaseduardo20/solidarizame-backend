<?php

namespace App\Data\Responses;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class OngData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        #[DataCollectionOf(FlagData::class)]
        public DataCollection $flags,
        public ?AddressData $address,
        #[MapName('createdAt')]
        public Carbon $created_at,
        #[MapName('updatedAt')]
        public Carbon $updated_at
    )
    {
        //
    }
}
