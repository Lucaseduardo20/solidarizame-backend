<?php

namespace App\Data\Responses;

use Spatie\LaravelData\Data;

class FlagData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $slug
    )
    {
        //
    }
}
