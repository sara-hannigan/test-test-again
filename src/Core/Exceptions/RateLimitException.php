<?php

namespace SaraOnboarded\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Rate Limit Exception';
}
