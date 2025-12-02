<?php

declare(strict_types=1);

namespace SaraOnboarded\Checkout;

use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Checkout\Order\Status;
use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkResponse;
use SaraOnboarded\Core\Contracts\BaseModel;
use SaraOnboarded\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type OrderShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   items: list<CartItem>,
 *   status: value-of<Status>,
 *   total_amount: float,
 * }
 */
final class Order implements BaseModel, ResponseConverter
{
    /** @use SdkModel<OrderShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created_at;

    /** @var list<CartItem> $items */
    #[Api(list: CartItem::class)]
    public array $items;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public float $total_amount;

    /**
     * `new Order()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Order::with(
     *   id: ..., created_at: ..., items: ..., status: ..., total_amount: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Order)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withItems(...)
     *   ->withStatus(...)
     *   ->withTotalAmount(...)
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
     *
     * @param list<CartItem> $items
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        \DateTimeInterface $created_at,
        array $items,
        Status|string $status,
        float $total_amount,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created_at = $created_at;
        $obj->items = $items;
        $obj['status'] = $status;
        $obj->total_amount = $total_amount;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * @param list<CartItem> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTotalAmount(float $totalAmount): self
    {
        $obj = clone $this;
        $obj->total_amount = $totalAmount;

        return $obj;
    }
}
