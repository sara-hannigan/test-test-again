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
        $self = new self;

        $self['addressID'] = $addressID;
        $self['paymentMethodID'] = $paymentMethodID;

        return $self;
    }

    public function withAddressID(string $addressID): self
    {
        $self = clone $this;
        $self['addressID'] = $addressID;

        return $self;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $self = clone $this;
        $self['paymentMethodID'] = $paymentMethodID;

        return $self;
    }
}
