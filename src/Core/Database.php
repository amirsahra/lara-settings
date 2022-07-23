<?php

namespace Amirsahra\LaraSetting\Core;

use Amirsahra\LaraSetting\Core\Contracts\Setting;
use Amirsahra\LaraSetting\Core\Exceptions\LaraSettingTableNotFound;
use Amirsahra\LaraSetting\Core\Traits\HasContentsValidation;
use Amirsahra\LaraSetting\Core\Traits\HasDatabase;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Illuminate\Support\Facades\Schema;

class Database implements Setting
{
    use HasContentsValidation, HasDatabase;

    /**
     * @throws LaraSettingTableNotFound
     */
    public function __construct()
    {
        $this->settingTableExits(config('larasetting.stores.database.table_name'));
    }

    /**
     * @throws Exceptions\ContentsKeysNotExists
     * @throws Exceptions\ContentsValuesIsEmpty
     * @throws Exceptions\IntendedNameIsNotFree
     */
    public function create(array $contents)
    {
        $this->validation($contents);
        $this->settingNameExists($contents['name']);

        $result = LaraSetting::create($contents);
        return $result->toArray();
    }

    public function read(string $name = null, string $item = null)
    {
        $result = LaraSetting::all();
        if (!is_null($name))
            $result = $result->where('name', $name)->first();
        if (!is_null($item) && !is_null($result))
            $result = $result->$item;
        if (is_null($item) && !is_null($result))
            $result = $result->toArray();
        return $result;
    }

    /**
     * @throws Exceptions\ContentsKeysNotExists
     * @throws Exceptions\ContentsValuesIsEmpty
     * @throws Exceptions\IntendedNameIsNotFree
     */
    public function update(string $name, array $contents)
    {
        $this->validation($contents);
        if (strcmp($name, $contents['name']) != 0)
            $this->settingNameExists($contents['name']);

        $result = LaraSetting::updateOrCreate(['name' => $name], $contents);
        return $result->toArray();
    }

    public function delete(string $name)
    {
        return LaraSetting::where('name', $name)->delete();
    }
}