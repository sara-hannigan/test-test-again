<?php

namespace SaraOnboarded\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Unprocessable Entity Exception';
}
