<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Checkout\CheckoutCreateOrderParams;
use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\CheckoutRawContract;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
final class CheckoutRawService implements CheckoutRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Checkout and place order
     *
     * @param array{
     *   addressID: string, paymentMethodID: string
     * }|CheckoutCreateOrderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function createOrder(
        array|CheckoutCreateOrderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CheckoutCreateOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'checkout',
            body: (object) $parsed,
            options: $options,
            convert: Order::class,
        );
    }
}
