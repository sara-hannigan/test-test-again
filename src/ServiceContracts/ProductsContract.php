<?php

declare(strict_types=1);

namespace SaraOnboarded\ServiceContracts;

use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Products\Product;
use SaraOnboarded\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
interface ProductsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): Product;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Product>
     *
     * @throws APIException
     */
    public function list(
        ?string $category = null,
        ?float $maxPrice = null,
        ?float $minPrice = null,
        ?string $search = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
