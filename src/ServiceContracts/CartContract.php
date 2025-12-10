<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

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
     * @throws APIException
     */
    public function addItem(
        string $productID,
        int $quantity,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
