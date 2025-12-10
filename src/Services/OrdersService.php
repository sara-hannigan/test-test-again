<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\OrdersContract;

final class OrdersService implements OrdersContract
{
    /**
     * @api
     */
    public OrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OrdersRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
