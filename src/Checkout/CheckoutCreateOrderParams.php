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
 *   addressID: string, paymentMethodID: string
 * }
 */
final class CheckoutCreateOrderParams implements BaseModel
{
    /** @use SdkModel<CheckoutCreateOrderParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('address_id')]
    public string $addressID;

    #[Required('payment_method_id')]
    public string $paymentMethodID;

    /**
     * `new CheckoutCreateOrderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckoutCreateOrderParams::with(addressID: ..., paymentMethodID: ...)
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
        string $addressID,
        string $paymentMethodID
    ): self {
        $obj = new self;

        $obj['addressID'] = $addressID;
        $obj['paymentMethodID'] = $paymentMethodID;

        return $obj;
    }

    public function withAddressID(string $addressID): self
    {
        $obj = clone $this;
        $obj['addressID'] = $addressID;

        return $obj;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $obj = clone $this;
        $obj['paymentMethodID'] = $paymentMethodID;

        return $obj;
    }
}
