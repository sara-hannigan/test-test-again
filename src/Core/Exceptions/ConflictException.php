<?php

namespace SaraOnboarded\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Conflict Exception';
}
