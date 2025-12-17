<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Cart\CartAddItemParams;
use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface CartRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<list<CartItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CartAddItemParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addItem(
        array|CartAddItemParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
