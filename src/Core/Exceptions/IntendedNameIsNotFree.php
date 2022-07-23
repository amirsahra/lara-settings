<?php

namespace Amirsahra\LaraSetting\Core\Exceptions;

use Exception;

class IntendedNameIsNotFree extends Exception
{
    protected $message = "Setting with the selected name has already been created";
}