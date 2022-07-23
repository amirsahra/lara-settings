<?php

namespace Amirsahra\LaraSetting\Core\Exceptions;

use Exception;

class TheUserIsNotLoggedIn extends Exception
{
    protected $message = "The user is not logged in";
}