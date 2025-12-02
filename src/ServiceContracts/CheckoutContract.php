<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Checkout\CheckoutCreateOrderParams;
use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface CheckoutContract
{
    /**
     * @api
     *
     * @param array<mixed>|CheckoutCreateOrderParams $params
     *
     * @throws APIException
     */
    public function createOrder(
        array|CheckoutCreateOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): Order;
}
