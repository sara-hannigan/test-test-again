<?php

declare(strict_types=1);

namespace SaraOnboarded\Checkout;

use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Checkout and place order.
 *
 * @see SaraOnboarded\Services\CheckoutService::createOrder()
 *
 * @phpstan-type CheckoutCreateOrderParamsShape = array{
 *   address_id: string, payment_method_id: string
 * }
 */
final class CheckoutCreateOrderParams implements BaseModel
{
    /** @use SdkModel<CheckoutCreateOrderParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $address_id;

    #[Required]
    public string $payment_method_id;

    /**
     * `new CheckoutCreateOrderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckoutCreateOrderParams::with(address_id: ..., payment_method_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckoutCreateOrderParams)->withAddressID(...)->withPaymentMethodID(...)
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
    public static function with(
        string $address_id,
        string $payment_method_id
    ): self {
        $obj = new self;

        $obj['address_id'] = $address_id;
        $obj['payment_method_id'] = $payment_method_id;

        return $obj;
    }

    public function withAddressID(string $addressID): self
    {
        $obj = clone $this;
        $obj['address_id'] = $addressID;

        return $obj;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $obj = clone $this;
        $obj['payment_method_id'] = $paymentMethodID;

        return $obj;
    }
}
