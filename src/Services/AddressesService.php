<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Core\Util;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\AddressesContract;

final class AddressesService implements AddressesContract
{
    /**
     * @api
     */
    public AddressesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AddressesRawService($client);
    }

    /**
     * @api
     *
     * Add a new address
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'city' => $city,
                'country' => $country,
                'line1' => $line1,
                'postalCode' => $postalCode,
                'state' => $state,
                'line2' => $line2,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get your saved addresses
     *
     * @return list<Address>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
