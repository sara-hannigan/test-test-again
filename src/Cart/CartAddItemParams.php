<?php

declare(strict_types=1);

namespace SaraOnboarded\Cart;

use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Add item to cart.
 *
 * @see SaraOnboarded\Services\CartService::addItem()
 *
 * @phpstan-type CartAddItemParamsShape = array{productID: string, quantity: int}
 */
final class CartAddItemParams implements BaseModel
{
    /** @use SdkModel<CartAddItemParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('product_id')]
    public string $productID;

    #[Required]
    public int $quantity;

    /**
     * `new CartAddItemParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CartAddItemParams::with(productID: ..., quantity: ...)
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
    public static function with(string $productID, int $quantity): self
    {
        $obj = new self;

        $obj['productID'] = $productID;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    public function withProductID(string $productID): self
    {
        $obj = clone $this;
        $obj['productID'] = $productID;

        return $obj;
    }

    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }
}
