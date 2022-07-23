<?php

use Tests\TestCase;

class LaraSettingKeysTest extends TestCase
{
    public function testExistenceOfLaraSettingConfigFileIndexes()
    {
        $configDeterminedIndexes = ['driver', 'namespace', 'stores', 'default_settings_feature', 'default_settings_contents'];
        $configsKeys = array_keys(config('larasetting'));
        $isExists = true;
        foreach ($configsKeys as $configKey) {
            if (!in_array($configKey, $configDeterminedIndexes)) {
                $isExists = false;
                break;
            }
        }
        $this->assertTrue($isExists);
    }

    public function testExistenceOfLaraSettingStoresConfigFileIndexes()
    {
        $storesConfigDeterminedIndexes = ['database'];
        $configsStoresKeys = array_keys(config('larasetting.stores'));
        $isExists = true;
        foreach ($configsStoresKeys as $configStoreKey) {
            if (!in_array($configStoreKey, $storesConfigDeterminedIndexes)) {
                $isExists = false;
                break;
            }
        }
        $this->assertTrue($isExists);
    }

    public function testExistenceOfLaraSettingDatabaseConfigFileIndexes()
    {
        $databaseConfigDeterminedIndexes = ['table_name', 'connection'];
        $configsDatabaseKeys = array_keys(config('larasetting.stores.database'));
        $isExists = true;
        foreach ($configsDatabaseKeys as $configStoreKey) {
            if (!in_array($configStoreKey, $databaseConfigDeterminedIndexes)) {
                $isExists = false;
                break;
            }
        }
        $this->assertTrue($isExists);
    }
}