<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Auth\AuthLoginParams;
use SaraOnboarded\Auth\AuthRegisterParams;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\AuthContract;

final class AuthService implements AuthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Login and get access token
     *
     * @param array{email: string, password: string}|AuthLoginParams $params
     *
     * @throws APIException
     */
    public function login(
        array|AuthLoginParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AuthLoginParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'auth/login',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new user account
     *
     * @param array{
     *   email: string, password: string, name?: string
     * }|AuthRegisterParams $params
     *
     * @throws APIException
     */
    public function register(
        array|AuthRegisterParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AuthRegisterParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'auth/register',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
