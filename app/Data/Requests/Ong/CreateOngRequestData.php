<?php

namespace App\Data\Requests\Ong;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CreateOngRequestData extends Data
{
    public function __construct(
        #[Required]
        public string $name
    )
    {
        //
    }
}
