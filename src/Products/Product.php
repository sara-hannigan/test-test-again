<?php

declare(strict_types=1);

namespace SaraOnboarded\Products;

use SaraOnboarded\Core\Attributes\Optional;
use SaraOnboarded\Core\Attributes\Required;
use SaraOnboarded\Core\Concerns\SdkModel;
use SaraOnboarded\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProductShape = array{
 *   id: string,
 *   category: string,
 *   name: string,
 *   price: float,
 *   stock: int,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   imageURL?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Product implements BaseModel
{
    /** @use SdkModel<ProductShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $category;

    #[Required]
    public string $name;

    #[Required]
    public float $price;

    #[Required]
    public int $stock;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional('image_url')]
    public ?string $imageURL;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $imageURL = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['category'] = $category;
        $obj['name'] = $name;
        $obj['price'] = $price;
        $obj['stock'] = $stock;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $description && $obj['description'] = $description;
        null !== $imageURL && $obj['imageURL'] = $imageURL;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
        $obj['createdAt'] = $createdAt;

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
        $obj['imageURL'] = $imageURL;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
