<?php

use Amirsahra\LaraSetting\Core\Database;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Databases\Temporary\LaraSettingData;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseReadTest extends LaraSettingTestUtility
{
    public function testReadMethodWithoutAnyParametersAndShouldReturnAllSettings()
    {
        $this->insertTemporarySettings();
        $countRecordsInSettingTable = LaraSetting::count();
        $readMethodResult = $this->database->read();
        $this->assertNotNull($readMethodResult);
        $this->assertTrue(is_array($readMethodResult));
        $this->assertCount($countRecordsInSettingTable, $readMethodResult);

    }

    public function testReadMethodWithExistsNameParameterAndShouldReturnSetting()
    {
        $this->insertTemporarySettings();
        $contents = ['user_id' => 1, 'name' => 'name', 'value' => 'value'];
        $this->database->create($contents);
        $readMethodResult = $this->database->read($contents['name']);
        $this->assertNotNull($readMethodResult);
        $this->assertTrue(is_array($readMethodResult));
        $this->assertEquals($readMethodResult['name'], $contents['name']);
        $this->assertEquals($readMethodResult['value'], $contents['value']);
    }

    public function testReadMethodWithExistsNameAndExistsItemParametersAndShouldReturnSettingItem()
    {
        $this->insertTemporarySettings();
        $contents = ['user_id' => 1, 'name' => 'name', 'value' => 'value'];
        $this->database->create($contents);
        $readMethodResult = $this->database->read($contents['name'], 'value');
        $this->assertNotNull($readMethodResult);
        $this->assertEquals($readMethodResult, $contents['value']);
    }

    public function testReadMethodWithNotExistsNameParameterAndShouldReturnNull()
    {
       $this->insertTemporarySettings();
        $readMethodResult = $this->database->read('not exists name');
        $this->assertNull($readMethodResult);
    }
}