<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
interface AddressesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Address>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
