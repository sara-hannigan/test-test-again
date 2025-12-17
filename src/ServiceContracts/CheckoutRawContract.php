<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Checkout\CheckoutCreateOrderParams;
use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface CheckoutRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CheckoutCreateOrderParams $params
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function createOrder(
        array|CheckoutCreateOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
