<?php

declare(strict_types=1);

namespace SaraOnboarded\Checkout;

use SaraOnboarded\Cart\CartItem;
use SaraOnboarded\Checkout\Order\Status;
use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrderShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   items: list<CartItem>,
 *   status: value-of<Status>,
 *   totalAmount: float,
 * }
 */
final class Order implements BaseModel
{
    /** @use SdkModel<OrderShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<CartItem> $items */
    #[Required(list: CartItem::class)]
    public array $items;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('total_amount')]
    public float $totalAmount;

    /**
     * `new Order()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Order::with(id: ..., createdAt: ..., items: ..., status: ..., totalAmount: ...)
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
     * @param list<CartItem|array{productID: string, quantity: int}> $items
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $items,
        Status|string $status,
        float $totalAmount,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['items'] = $items;
        $self['status'] = $status;
        $self['totalAmount'] = $totalAmount;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<CartItem|array{productID: string, quantity: int}> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTotalAmount(float $totalAmount): self
    {
        $self = clone $this;
        $self['totalAmount'] = $totalAmount;

        return $self;
    }
}
