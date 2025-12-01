<?php

declare(strict_types=1);

namespace SaraOnboarded\Core\Conversion;

use SaraOnboarded\Core\Conversion\Concerns\ArrayOf;
use SaraOnboarded\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
