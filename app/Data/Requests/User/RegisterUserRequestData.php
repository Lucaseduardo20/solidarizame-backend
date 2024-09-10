<?php

namespace App\Data\Requests\User;

use App\Data\Transformers\PasswordTransformer;
use Spatie\LaravelData\Attributes\Validation\{
    Confirmed,
    Email,
    Password,
    Required,
    Unique
};
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;

class RegisterUserRequestData extends Data
{
    public function __construct(
        #[Required]
        public string $name,
        #[Required, Email, Unique('users','email')]
        public string $email,
        #[Required, Unique('users','phone')]
        public string $phone,
        #[Required, Password(min: 5), Confirmed, WithTransformer(PasswordTransformer::class)]
        public string $password,
    )
    {
        //
    }
}
