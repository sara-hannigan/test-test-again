<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\Products\Product;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\ProductsContract;

final class ProductsService implements ProductsContract
{
    /**
     * @api
     */
    public ProductsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProductsRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all products with filters
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
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'category' => $category,
            'maxPrice' => $maxPrice,
            'minPrice' => $minPrice,
            'search' => $search,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
