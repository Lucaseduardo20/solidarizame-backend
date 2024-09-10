<?php

namespace App\Data\Requests\User;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class AuthRequestData extends Data
{
    public function __construct(
        #[Required, Email]
        public string $email,
        #[Required, Password(min: 8)]
        public string $password,
    )
    {
        //
    }
}
