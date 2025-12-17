<?php

declare(strict_types=1);

namespace SaraOnboarded\Products;

use SaraOnboarded\Core\Attributes\Optional;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkParams;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * List all products with filters.
 *
 * @see SaraOnboarded\Services\ProductsService::list()
 *
 * @phpstan-type ProductListParamsShape = array{
 *   category?: string|null,
 *   maxPrice?: float|null,
 *   minPrice?: float|null,
 *   search?: string|null,
 * }
 */
final class ProductListParams implements BaseModel
{
    /** @use SdkModel<ProductListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $category;

    #[Optional]
    public ?float $maxPrice;

    #[Optional]
    public ?float $minPrice;

    #[Optional]
    public ?string $search;

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
        ?string $category = null,
        ?float $maxPrice = null,
        ?float $minPrice = null,
        ?string $search = null,
    ): self {
        $self = new self;

        null !== $category && $self['category'] = $category;
        null !== $maxPrice && $self['maxPrice'] = $maxPrice;
        null !== $minPrice && $self['minPrice'] = $minPrice;
        null !== $search && $self['search'] = $search;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withMaxPrice(float $maxPrice): self
    {
        $self = clone $this;
        $self['maxPrice'] = $maxPrice;

        return $self;
    }

    public function withMinPrice(float $minPrice): self
    {
        $self = clone $this;
        $self['minPrice'] = $minPrice;

        return $self;
    }

    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }
}
