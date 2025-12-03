<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Cart\CartAddItemParams;
use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;

interface CartContract
{
    /**
     * @api
     *
     * @return list<CartItem>
     *
     * @throws APIException
     */
    public function retrieve(?RequestOptions $requestOptions = null): array;

    /**
     * @api
     *
     * @param array<mixed>|CartAddItemParams $params
     *
     * @throws APIException
     */
    public function addItem(
        array|CartAddItemParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
