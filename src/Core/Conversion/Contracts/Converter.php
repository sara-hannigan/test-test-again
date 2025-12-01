<?php

declare(strict_types=1);

namespace SaraOnboarded\Core\Conversion\Contracts;

use SaraOnboarded\Core\Conversion\CoerceState;
use SaraOnboarded\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
