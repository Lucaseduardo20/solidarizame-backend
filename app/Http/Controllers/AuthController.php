<?php

namespace App\Http\Controllers;

use App\Data\Requests\User\AuthRequestData;
use App\Data\Requests\User\RegisterUserRequestData;
use App\Data\Responses\AuthTokenData;
use App\Data\Responses\MessageData;
use App\Data\Responses\UserData;
use App\Services\UserService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Spatie\LaravelData\Data;
use Throwable;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {
        //
    }

    /**
     * @param RegisterUserRequestData $request
     * @return Response
     * @throws Throwable
     */
    public function register(RegisterUserRequestData $request): Response
    {
        return response(
            $this->userService->create($request)->getData(),
            201
        );
    }

    /**
     * @param AuthRequestData $request
     * @return Response
     */
    public function login(AuthRequestData $request): Response
    {
        if (!$token = auth('api')->attempt($request->toArray())) {
            return response(
                MessageData::from(['message' => trans('auth.unauthorized')]),
                401
            );
        }

        return response(
            AuthTokenData::fromToken($token),
            200
        );
    }

    /**
     * @return Response
     */
    public function me(): Response
    {
        return response(
            auth('api')->user()->getData(),
            200
        );
    }

    /**
     * @return Response
     */
    public function logout(): Response
    {
       auth('api')->logout();

       return response(
           MessageData::from(['message' => trans('auth.logout')]),
           200
       );
    }

    /**
     * @return Response
     */
    public function refresh(): Response
    {
        return response(
            AuthTokenData::fromToken(JWTAuth::refresh()),
            200
        );
    }
}
