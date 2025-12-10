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
use SaraOnboarded\ServiceContracts\CartRawContract;

final class CartRawService implements CartRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get current user's cart
     *
     * @return BaseResponse<list<CartItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cart',
            options: $requestOptions,
            convert: new ListOf(CartItem::class),
        );
    }

    /**
     * @api
     *
     * Add item to cart
     *
     * @param array{productID: string, quantity: int}|CartAddItemParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addItem(
        array|CartAddItemParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CartAddItemParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cart/items',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
