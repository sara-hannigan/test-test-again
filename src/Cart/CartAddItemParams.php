<?php

declare(strict_types=1);

namespace SaraOnboarded\Cart;

use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Add item to cart.
 *
 * @see SaraOnboarded\Services\CartService::addItem()
 *
 * @phpstan-type CartAddItemParamsShape = array{product_id: string, quantity: int}
 */
final class CartAddItemParams implements BaseModel
{
    /** @use SdkModel<CartAddItemParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $product_id;

    #[Api]
    public int $quantity;

    /**
     * `new CartAddItemParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CartAddItemParams::with(product_id: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CartAddItemParams)->withProductID(...)->withQuantity(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $product_id, int $quantity): self
    {
        $obj = new self;

        $obj->product_id = $product_id;
        $obj->quantity = $quantity;

        return $obj;
    }

    public function withProductID(string $productID): self
    {
        $obj = clone $this;
        $obj->product_id = $productID;

        return $obj;
    }

    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
