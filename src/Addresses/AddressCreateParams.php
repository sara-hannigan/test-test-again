<?php

declare(strict_types=1);

namespace SaraOnboarded\Addresses;

use SaraOnboarded\Core\Attributes\Optional;
use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * Add a new address.
 *
 * @see SaraOnboarded\Services\AddressesService::create()
 *
 * @phpstan-type AddressCreateParamsShape = array{
 *   city: string,
 *   country: string,
 *   line1: string,
 *   postalCode: string,
 *   state: string,
 *   line2?: string,
 * }
 */
final class AddressCreateParams implements BaseModel
{
    /** @use SdkModel<AddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $city;

    #[Required]
    public string $country;

    #[Required]
    public string $line1;

    #[Required('postal_code')]
    public string $postalCode;

    #[Required]
    public string $state;

    #[Optional]
    public ?string $line2;

    /**
     * `new AddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddressCreateParams::with(
     *   city: ..., country: ..., line1: ..., postalCode: ..., state: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AddressCreateParams)
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
        string $postalCode,
        string $state,
        ?string $line2 = null,
    ): self {
        $obj = new self;

        $obj['city'] = $city;
        $obj['country'] = $country;
        $obj['line1'] = $line1;
        $obj['postalCode'] = $postalCode;
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
        $obj['postalCode'] = $postalCode;

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
