<?php

declare(strict_types=1);

namespace SaraOnboarded\Products;

use SaraOnboarded\Core\Attributes\Api;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Concerns\SdkResponse;
use SaraOnboarded\Core\Contracts\BaseModel;
use SaraOnboarded\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ProductShape = array{
 *   id: string,
 *   category: string,
 *   name: string,
 *   price: float,
 *   stock: int,
 *   created_at?: \DateTimeInterface|null,
 *   description?: string|null,
 *   image_url?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Product implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ProductShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public string $category;

    #[Api]
    public string $name;

    #[Api]
    public float $price;

    #[Api]
    public int $stock;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $image_url;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new Product()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Product::with(id: ..., category: ..., name: ..., price: ..., stock: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Product)
     *   ->withID(...)
     *   ->withCategory(...)
     *   ->withName(...)
     *   ->withPrice(...)
     *   ->withStock(...)
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
        string $id,
        string $category,
        string $name,
        float $price,
        int $stock,
        ?\DateTimeInterface $created_at = null,
        ?string $description = null,
        ?string $image_url = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['category'] = $category;
        $obj['name'] = $name;
        $obj['price'] = $price;
        $obj['stock'] = $stock;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $description && $obj['description'] = $description;
        null !== $image_url && $obj['image_url'] = $image_url;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPrice(float $price): self
    {
        $obj = clone $this;
        $obj['price'] = $price;

        return $obj;
    }

    public function withStock(int $stock): self
    {
        $obj = clone $this;
        $obj['stock'] = $stock;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withImageURL(string $imageURL): self
    {
        $obj = clone $this;
        $obj['image_url'] = $imageURL;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
