<?php

use Tests\TestCase;

class LarasettingValuesTest extends TestCase
{
    public function testNotEmptyLaraSettingConfigFileValues()
    {
        $configValues = array_values(config('larasetting'));
        $isEmpty =false;
        foreach ($configValues as $configValue) {
            if (empty($configValue)){
                $isEmpty = true;
                break;
            }
        }
        $this->assertFalse($isEmpty);
    }

    public function testNotEmptyLaraSettingDatabaseConfigFileValues()
    {
        $configDatabase = (config('larasetting.stores.database'));
        unset($configDatabase['connection']); // Because its default value is null
        $configDatabaseValues = array_values($configDatabase);
        $isEmpty =false;
        foreach ($configDatabaseValues as $configValue) {
            if (empty($configValue)){
                $isEmpty = true;
                break;
            }
        }
        $this->assertFalse($isEmpty);
    }
}