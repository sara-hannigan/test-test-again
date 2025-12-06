<?php

declare(strict_types=1);

namespace SaraOnboarded\Addresses;

use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   city: string,
 *   country: string,
 *   line1: string,
 *   postal_code: string,
 *   state: string,
 *   line2?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    #[Api]
    public string $city;

    #[Api]
    public string $country;

    #[Api]
    public string $line1;

    #[Api]
    public string $postal_code;

    #[Api]
    public string $state;

    #[Api(optional: true)]
    public ?string $line2;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(city: ..., country: ..., line1: ..., postal_code: ..., state: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Address)
     *   ->withCity(...)
     *   ->withCountry(...)
     *   ->withLine1(...)
     *   ->withPostalCode(...)
     *   ->withState(...)
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
        string $city,
        string $country,
        string $line1,
        string $postal_code,
        string $state,
        ?string $line2 = null,
    ): self {
        $obj = new self;

        $obj['city'] = $city;
        $obj['country'] = $country;
        $obj['line1'] = $line1;
        $obj['postal_code'] = $postal_code;
        $obj['state'] = $state;

        null !== $line2 && $obj['line2'] = $line2;

        return $obj;
    }

    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    public function withLine1(string $line1): self
    {
        $obj = clone $this;
        $obj['line1'] = $line1;

        return $obj;
    }

    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    public function withLine2(string $line2): self
    {
        $obj = clone $this;
        $obj['line2'] = $line2;

        return $obj;
    }
}
