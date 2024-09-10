<?php

namespace App\Data\Requests\Flag;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CreateFlagRequestData extends Data
{
    public function __construct(
        #[Required]
        public string $name,
    )
    {
        //
    }
}
