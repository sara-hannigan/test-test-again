<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Client;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Conversion\ListOf;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Core\Util;
use SaraOnboarded\Products\Product;
use SaraOnboarded\Products\ProductListParams;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\ProductsContract;

final class ProductsService implements ProductsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get product details by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): Product {
        /** @var BaseResponse<Product> */
        $response = $this->client->request(
            method: 'get',
            path: ['products/%1$s', $id],
            options: $requestOptions,
            convert: Product::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all products with filters
     *
     * @param array{
     *   category?: string, maxPrice?: float, minPrice?: float, search?: string
     * }|ProductListParams $params
     *
     * @return list<Product>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = ProductListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<Product>> */
        $response = $this->client->request(
            method: 'get',
            path: 'products',
            query: Util::array_transform_keys(
                $parsed,
                ['maxPrice' => 'max_price', 'minPrice' => 'min_price']
            ),
            options: $options,
            convert: new ListOf(Product::class),
        );

        return $response->parse();
    }
}
