<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Auth\AuthLoginParams;
use SaraOnboarded\Auth\AuthRegisterParams;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AuthRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuthLoginParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function login(
        array|AuthLoginParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthRegisterParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function register(
        array|AuthRegisterParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
