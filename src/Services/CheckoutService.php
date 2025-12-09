<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Checkout\CheckoutCreateOrderParams;
use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\CheckoutContract;

final class CheckoutService implements CheckoutContract
{
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
     *
     * @throws APIException
     */
    public function createOrder(
        array|CheckoutCreateOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): Order {
        [$parsed, $options] = CheckoutCreateOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Order> */
        $response = $this->client->request(
            method: 'post',
            path: 'checkout',
            body: (object) $parsed,
            options: $options,
            convert: Order::class,
        );

        return $response->parse();
    }
}
