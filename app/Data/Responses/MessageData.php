<?php

namespace App\Data\Responses;

use Spatie\LaravelData\Data;

class MessageData extends Data
{
    public function __construct(public string $message)
    {
        //
    }
}
