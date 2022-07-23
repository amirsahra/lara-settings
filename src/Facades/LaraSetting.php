<?php

namespace Amirsahra\LaraSetting\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static set(string $name, string $value, string $description = '', bool $isActive = true)
 * @method static find(string $name = null, string $item = null)
 * @method static get(string $name, string $default = '')
 * @method static edit(string $name, array $contents)
 * @method static remove(string $name)
 * @method static has(string $name)
 *
 * @see \Amirsahra\LaraSetting\
 * @package Amirsahra\LaraSetting\Facades
 */
class LaraSetting extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'LaraSetting';
    }
}