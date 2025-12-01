<?php

namespace SaraOnboarded\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Bad Request Exception';
}
