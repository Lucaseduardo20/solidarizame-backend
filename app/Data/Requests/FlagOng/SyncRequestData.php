<?php

namespace App\Data\Requests\FlagOng;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class SyncRequestData extends Data
{
    public function __construct(
        public array $flags
    )
    {
        //
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'flags' => ['required', 'array'],
            'flags.*' => ['required', 'string', 'exists:flags,slug'],
        ];
    }
}
