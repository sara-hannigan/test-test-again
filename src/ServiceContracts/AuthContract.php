<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Auth\AuthLoginParams;
use SaraOnboarded\Auth\AuthRegisterParams;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AuthContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthLoginParams $params
     *
     * @throws APIException
     */
    public function login(
        array|AuthLoginParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthRegisterParams $params
     *
     * @throws APIException
     */
    public function register(
        array|AuthRegisterParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
