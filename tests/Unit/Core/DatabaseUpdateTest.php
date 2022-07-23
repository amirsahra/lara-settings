<?php

use Amirsahra\LaraSetting\Core\Database;
use Amirsahra\LaraSetting\Core\Exceptions\IntendedNameIsNotFree;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Databases\Temporary\LaraSettingData;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseUpdateTest extends LaraSettingTestUtility
{
    public function testUpdateMethodWitNotExistsSettingNameAndShouldCreateAndReturnIt()
    {
        $this->insertTemporarySettings();
        $recordsCountBeforeCreateNewSetting = LaraSetting::count();
        $createMethodResult = $this->insertSetting('not exists name');
        $recordsCountAfterCreateNewSetting = LaraSetting::count();
        $this->assertNotNull($createMethodResult);
        $this->assertSame(++$recordsCountBeforeCreateNewSetting, $recordsCountAfterCreateNewSetting);
        $this->assertTrue(is_array($createMethodResult));
    }

    public function testUpdateMethodWitExistsSettingNameAndShouldReturnIt()
    {
        $createMethodResult = $this->insertSetting('exists name','old value');
        $recordsCountBeforeUpdateSetting = LaraSetting::count();

        $updateMethodResult = $this->updateSetting('exists name','exists name','new value');
        $recordsCountAfterUpdateSetting = LaraSetting::count();

        $this->assertNotNull($updateMethodResult);
        $this->assertSame($recordsCountBeforeUpdateSetting, $recordsCountAfterUpdateSetting);
        $this->assertTrue(is_array($createMethodResult));
        $this->assertTrue(is_array($updateMethodResult));
        $this->assertEquals($updateMethodResult['value'], 'new value');
    }

    public function testUpdateMethodWitCurrentAndNewSettingNamesAreExistsAndShouldReturnException()
    {
        $this->expectException(IntendedNameIsNotFree::class);
        $this->insertSetting('name','old value');
        $this->insertSetting('exists name','old value');

        $this->updateSetting('exists name','name','new value');

    }
}