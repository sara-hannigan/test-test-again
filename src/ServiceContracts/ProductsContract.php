<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Products\Product;
use SaraOnboarded\Products\ProductListParams;
use SaraOnboarded\RequestOptions;

interface ProductsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): Product;

    /**
     * @api
     *
     * @param array<mixed>|ProductListParams $params
     *
     * @return list<Product>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;
}
