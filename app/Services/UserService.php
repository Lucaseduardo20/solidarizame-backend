<?php

namespace App\Services;

use App\Data\Requests\User\RegisterUserRequestData;
use App\Data\Responses\UserData;
use App\Models\User;
use Throwable;

class UserService extends Service
{
    public function referenceData(): string
    {
        return UserData::class;
    }

    /**
     * @throws Throwable
     */
    public function create(RegisterUserRequestData $data): User
    {
        return User::create($data->transform());
    }
}
