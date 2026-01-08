<?php

declare(strict_types=1);

namespace SaraOnboarded\Core\Conversion;

use SaraOnboarded\Core\Conversion\Concerns\ArrayOf;
use SaraOnboarded\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
