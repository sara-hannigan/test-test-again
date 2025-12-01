<?php

namespace SaraOnboarded\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Internal Server Exception';
}
