<?php

declare(strict_types=1);

namespace SaraOnboarded\Services;

use SaraOnboarded\Cart\CartAddItemParams;
use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Client;
use SaraOnboarded\Core\Contracts\BaseResponse;
use SaraOnboarded\Core\Conversion\ListOf;
use SaraOnboarded\Core\Exceptions\APIException;
use SaraOnboarded\RequestOptions;
use SaraOnboarded\ServiceContracts\CartContract;

final class CartService implements CartContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        /** @var BaseResponse<list<CartItem>> */
        $response = $this->client->request(
            method: 'get',
            path: 'cart',
            options: $requestOptions,
            convert: new ListOf(CartItem::class),
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add item to cart
     *
     * @param array{product_id: string, quantity: int}|CartAddItemParams $params
     *
     * @throws APIException
     */
    public function addItem(
        array|CartAddItemParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CartAddItemParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'cart/items',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
