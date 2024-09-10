<?php

namespace App\Data\Responses;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
    )
    {
        //
    }
}
