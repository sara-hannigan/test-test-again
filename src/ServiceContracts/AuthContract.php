<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AuthContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function login(
        string $email,
        string $password,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function register(
        string $email,
        string $password,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
