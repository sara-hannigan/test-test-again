<?php

declare(strict_types=1);

namespace SaraOnboarded\Core\Contracts;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SaraOnboarded\Core\Conversion\Contracts\Converter;
use SaraOnboarded\Core\Conversion\Contracts\ConverterSource;

/**
 * @internal
 *
 * @template TInner
 *
 * @extends \IteratorAggregate<int, TInner>
 */
interface BaseStream extends \IteratorAggregate
{
    public function __construct(
        Converter|ConverterSource|string $convert,
        RequestInterface $request,
        ResponseInterface $response,
    );

    /**
     * Manually force the stream to close early.
     * Iterating through will automatically close as well.
     */
    public function close(): void;
}
