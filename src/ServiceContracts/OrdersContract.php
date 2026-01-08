<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
interface OrdersContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): Order;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Order>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
