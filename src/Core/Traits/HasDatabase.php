<?php

namespace Amirsahra\LaraSetting\Core\Traits;

use Amirsahra\LaraSetting\Core\Exceptions\IntendedNameIsNotFree;
use Amirsahra\LaraSetting\Core\Exceptions\LaraSettingTableNotFound;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Illuminate\Support\Facades\Schema;

trait HasDatabase
{
    /**
     * @param string $name
     * @throws IntendedNameIsNotFree
     */
    public function settingNameExists(string $name)
    {
        if (LaraSetting::where('name', $name)->exists())
            throw new IntendedNameIsNotFree();
    }

    /**
     * @throws LaraSettingTableNotFound
     */
    public function settingTableExits(string $tableName)
    {
        if (!Schema::hasTable($tableName))
            throw new LaraSettingTableNotFound();
    }
}