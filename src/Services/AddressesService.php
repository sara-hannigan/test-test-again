<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Addresses\Address;
use SaraOnboarded\Addresses\AddressCreateParams;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Conversion\ListOf;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\AddressesContract;

final class AddressesService implements AddressesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new address
     *
     * @param array{
     *   city: string,
     *   country: string,
     *   line1: string,
     *   postalCode: string,
     *   state: string,
     *   line2?: string,
     * }|AddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'addresses',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

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
        /** @var BaseResponse<list<Address>> */
        $response = $this->client->request(
            method: 'get',
            path: 'addresses',
            options: $requestOptions,
            convert: new ListOf(Address::class),
        );

        return $response->parse();
    }
}
