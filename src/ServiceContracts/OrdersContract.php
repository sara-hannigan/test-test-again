<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface OrdersContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): Order;

    /**
     * @api
     *
     * @return list<Order>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array;
}
