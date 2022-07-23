<?php

namespace Amirsahra\LaraSetting\Core\Contracts;

interface Setting
{
    public function create(array $contents);

    public function read(string $name = null, string $item = null);

    public function update(string $name, array $contents);

    public function delete(string $name);
}