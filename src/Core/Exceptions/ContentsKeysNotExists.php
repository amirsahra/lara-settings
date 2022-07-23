<?php

namespace Amirsahra\LaraSetting\Core\Exceptions;

use Exception;

class ContentsKeysNotExists extends Exception
{
    protected $message = "The content array does not have the required keys";
}