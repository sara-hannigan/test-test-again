<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Addresses\AddressCreateParams;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|AddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return list<Address>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array;
}
