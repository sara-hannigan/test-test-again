<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Cart\CartAddItemParams;
use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
interface CartRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<CartItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CartAddItemParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addItem(
        array|CartAddItemParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
