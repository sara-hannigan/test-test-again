<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Conversion\ListOf;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\OrdersContract;

final class OrdersService implements OrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get order details
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): Order {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['orders/%1$s', $orderID],
            options: $requestOptions,
            convert: Order::class,
        );
    }

    /**
     * @api
     *
     * List your past orders
     *
     * @return list<Order>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'orders',
            options: $requestOptions,
            convert: new ListOf(Order::class),
        );
    }
}
