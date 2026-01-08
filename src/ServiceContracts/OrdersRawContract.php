<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Checkout\Order;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
interface OrdersRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Order>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
