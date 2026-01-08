<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Core\Util;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\AuthContract;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
final class AuthService implements AuthContract
{
    /**
     * @api
     */
    public AuthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthRawService($client);
    }

    /**
     * @api
     *
     * Login and get access token
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function login(
        string $email,
        string $password,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['email' => $email, 'password' => $password]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->login(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new user account
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function register(
        string $email,
        string $password,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['email' => $email, 'password' => $password, 'name' => $name]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->register(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
