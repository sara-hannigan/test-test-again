<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\CartContract;

final class CartService implements CartContract
{
    /**
     * @api
     */
    public CartRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CartRawService($client);
    }

    /**
     * @api
     *
     * Get current user's cart
     *
     * @return list<CartItem>
     *
     * @throws APIException
     */
    public function retrieve(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add item to cart
     *
     * @throws APIException
     */
    public function addItem(
        string $productID,
        int $quantity,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['productID' => $productID, 'quantity' => $quantity];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addItem(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
