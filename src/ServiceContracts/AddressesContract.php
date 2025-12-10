<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface AddressesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        string $city,
        string $country,
        string $line1,
        string $postalCode,
        string $state,
        ?string $line2 = null,
        ?RequestOptions $requestOptions = null,
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
