<?php

namespace App\Data\Responses;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthTokenData extends Data
{
    public function __construct(
        #[MapName('accessToken')]
        public string $access_token,
        #[MapName('expiresIn')]
        public int $expires_in,
        #[MapName('tokenType')]
        public string $token_type = 'bearer',
    )
    {
        //
    }

    public static function fromToken(string $token): self
    {
        return new self(
            access_token: $token,
            expires_in: JWTAuth::factory()->getTTL() * 60
        );
    }
}
