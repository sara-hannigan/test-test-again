<?php

namespace SaraOnboarded\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SaraOnboarded Not Found Exception';
}
