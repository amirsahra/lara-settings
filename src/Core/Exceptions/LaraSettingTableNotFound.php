<?php

namespace Amirsahra\LaraSetting\Core\Exceptions;

use Exception;

class LaraSettingTableNotFound extends Exception
{
    protected $message = "The LaraSettings table is not created or its name is different from the configuration value";
}