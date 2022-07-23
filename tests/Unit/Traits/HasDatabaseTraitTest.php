<?php

use Amirsahra\LaraSetting\Core\Exceptions\IntendedNameIsNotFree;
use Amirsahra\LaraSetting\Core\Traits\HasDatabase;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class HasDatabaseTraitTest extends LaraSettingTestUtility
{
    public function testSettingNameExistsMethodWithExistsSettingNameShouldThrowException()
    {
        $this->expectException(IntendedNameIsNotFree::class);
        $this->insertTemporarySettings(2);
        $setting = $this->insertTestSetting();
        $hasDatabaseTrait = $this->getObjectForTrait(HasDatabase::class);
        $hasDatabaseTrait->settingNameExists($setting['name']);

    }

    public function testSettingNameExistsMethodWithNotExistsSettingNameShouldReturnNull()
    {
        $this->insertTemporarySettings(2);
        $hasDatabaseTrait = $this->getObjectForTrait(HasDatabase::class);
        $resultSettingNameExists = $hasDatabaseTrait->settingNameExists('not_Exists');
        $this->assertNull($resultSettingNameExists);
    }

    private function insertTestSetting()
    {
        return LaraSetting::create([
            'user_id' => '99',
            'name' => 'lara_settings',
            'value' => 'lara settings value',
            'description' => 'description',
            'is_active' => true,
        ]);
    }
}