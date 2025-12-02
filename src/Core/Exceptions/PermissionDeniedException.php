<?php

namespace SaraOnboarded\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Permission Denied Exception';
}
