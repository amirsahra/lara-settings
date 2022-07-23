<?php

use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;

class DatabaseDeleteTest extends LaraSettingTestUtility
{
    public function testDeleteMethodWithExistsSettingNameAndShouldReturnTrue()
    {
        $this->insertTemporarySettings();
        $this->insertSetting('name');
        $deleteMethodResult = $this->database->delete('name');
        ($deleteMethodResult == 1) ? $deleteMethodResult = true : $deleteMethodResult = false;
        $this->assertTrue($deleteMethodResult);
    }

    public function testDeleteMethodWithNotExistsSettingNameAndShouldReturnFalse()
    {
        $this->insertTemporarySettings();
        $this->insertSetting('name');
        $deleteMethodResult = $this->database->delete('not exists');
        ($deleteMethodResult == 1) ? $deleteMethodResult = true : $deleteMethodResult = false;
        $this->assertFalse($deleteMethodResult);
    }

    public function testDeleteMethodWithExistsSettingNameAndThatRecordShouldBeDeletedFromSettingTable()
    {
        $this->insertTemporarySettings();
        $this->insertSetting('setting name');
        $recordsCountBeforeDeleteSetting = LaraSetting::count();
        $this->database->delete('setting name');
        $recordsCountAfterDeleteSetting = LaraSetting::count();
        $this->assertSame(--$recordsCountBeforeDeleteSetting, $recordsCountAfterDeleteSetting);
        $this->assertFalse(LaraSetting::where('name','setting name')->exists());
    }
}