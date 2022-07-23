<?php

namespace Amirsahra\LaraSetting\Core\Exceptions;

use Exception;

class ContentsValuesIsEmpty extends Exception
{
    protected $message = "In the content array, one or more specified keys have an empty value";
}