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
use SaraOnboarded\ServiceContracts\ProductsRawContract;

/**
 * @phpstan-import-type RequestOpts from \SaraOnboarded\RequestOptions
 */
final class ProductsRawService implements ProductsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get product details by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Product>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['products/%1$s', $id],
            options: $requestOptions,
            convert: Product::class,
        );
    }

    /**
     * @api
     *
     * List all products with filters
     *
     * @param array{
     *   category?: string, maxPrice?: float, minPrice?: float, search?: string
     * }|ProductListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Product>>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProductListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'products',
            query: Util::array_transform_keys(
                $parsed,
                ['maxPrice' => 'max_price', 'minPrice' => 'min_price']
            ),
            options: $options,
            convert: new ListOf(Product::class),
        );
    }
}
