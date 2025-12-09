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
 *   category?: string, maxPrice?: float, minPrice?: float, search?: string
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
        $obj = new self;

        null !== $category && $obj['category'] = $category;
        null !== $maxPrice && $obj['maxPrice'] = $maxPrice;
        null !== $minPrice && $obj['minPrice'] = $minPrice;
        null !== $search && $obj['search'] = $search;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withMaxPrice(float $maxPrice): self
    {
        $obj = clone $this;
        $obj['maxPrice'] = $maxPrice;

        return $obj;
    }

    public function withMinPrice(float $minPrice): self
    {
        $obj = clone $this;
        $obj['minPrice'] = $minPrice;

        return $obj;
    }

    public function withSearch(string $search): self
    {
        $obj = clone $this;
        $obj['search'] = $search;

        return $obj;
    }
}
