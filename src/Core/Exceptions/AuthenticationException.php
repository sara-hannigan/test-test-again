<?php

namespace SaraOnboarded\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Authentication Exception';
}
