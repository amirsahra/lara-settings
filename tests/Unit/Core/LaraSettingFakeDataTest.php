<?php

use Amirsahra\LaraSetting\Core\Contracts\Createable;
use Amirsahra\LaraSetting\Core\Creator\LaraSettingFakeData;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;

class LaraSettingFakeDataTest extends LaraSettingTestUtility
{
    public function testRunMethodAndShouldInsertFiveRecordeInSettingTable()
    {
        $recordsCountBeforeRunMethodExecution = LaraSetting::count() + 5;
        $this->insertTemporarySettings(5);
        $recordsCountAfterRunMethodExecution = LaraSetting::count();
        $this->assertSame($recordsCountBeforeRunMethodExecution, $recordsCountAfterRunMethodExecution);
    }

    public function testLarasettingFakeDataImplementsCreateableInterface()
    {
        $databaseCore = new LaraSettingFakeData();
        $this->assertInstanceOf(Createable::class, $databaseCore);
    }
}