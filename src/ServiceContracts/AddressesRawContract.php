<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Addresses\AddressCreateParams;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AddressesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AddressCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<list<Address>>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;
}
