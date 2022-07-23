<?php

namespace Amirsahra\LaraSetting;

use Amirsahra\LaraSetting\Core\Exceptions\TheUserIsNotLoggedIn;
use Carbon\Carbon;

class LaraSetting
{
    const SETTING_VALUE = 'value';
    private $setting;

    public function __construct()
    {
        $driver = ucfirst(config('larasetting.driver'));
        $namespace = config('larasetting.namespace');
        $settingClassname = ($namespace . $driver);
        $this->setting = new $settingClassname();
    }

    /**
     * @throws TheUserIsNotLoggedIn
     */
    public function set(string $name, string $value, string $description = '', bool $isActive = true)
    {
        $contents = [
            'name' => $name,
            'value' => $value,
            'description' => $description,
            'is_active' => $isActive,
            'created_at' => Carbon::now()->toString(),
        ];
        return $this->setting->create($contents);
    }

    public function find(string $name = null, string $item = null)
    {
        return $this->setting->read($name, $item);
    }

    public function get(string $name, string $default = '')
    {
        return $this->setting->read($name, self::SETTING_VALUE) ?? $default;
    }

    /**
     * @throws TheUserIsNotLoggedIn
     */
    public function edit(string $name, $value, string $description = '', bool $isActive = true)
    {
        $contents = [
            'name' => $name,
            'value' => $value,
            'description' => $description,
            'is_active' => $isActive,
            'updated_at' => Carbon::now()->toString(),
        ];
        return $this->setting->update($name, $contents);
    }

    public function remove(string $name)
    {
        return $this->setting->delete($name);
    }

    public function has(string $name)
    {
        (is_null($this->get($name))) ? $result = false : $result = true;
        return $result;
    }


}