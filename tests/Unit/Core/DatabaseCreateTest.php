<?php

use Amirsahra\LaraSetting\Core\Database;
use Amirsahra\LaraSetting\Core\Exceptions\ContentsKeysNotExists;
use Amirsahra\LaraSetting\Core\Exceptions\ContentsValuesIsEmpty;
use Amirsahra\LaraSetting\Core\Exceptions\IntendedNameIsNotFree;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Amirsahra\LaraSetting\Databases\Temporary\LaraSettingData;
use Amirsahra\LaraSetting\Utilities\LaraSettingTestUtility;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseCreateTest extends LaraSettingTestUtility
{
    public function testCreateMethodWithinValidKeysContentsAndShouldThrowException()
    {
        $this->expectException(ContentsKeysNotExists::class);
        $contents = ['value' => 'value', 'age' => '99'];
        $this->database->create($contents);
    }

    public function testCreateMethodWithEmptyValueContentsAndShouldThrowException()
    {
        $this->expectException(ContentsValuesIsEmpty::class);
        $contents = ['name' => '', 'value' => 'value'];
        $this->database->create($contents);
    }

    public function testCreateMethodWithNullValueContentsAndShouldThrowException()
    {
        $this->expectException(ContentsValuesIsEmpty::class);
        $contents = ['name' => 'name', 'value' => null];
        $this->database->create($contents);
    }

    public function testCreateMethodWithExistsSettingNameAndShouldThrowException()
    {
        $this->expectException(IntendedNameIsNotFree::class);
        $this->insertTemporarySettings();
        $contents = $this->insertSetting('exist name');
        $this->database->create($contents);
    }

    public function testCreateMethodWithValidContentsAndShouldReturnArray()
    {
        $contents = ['name' => 'valid name', 'value' => 'valid value'];
        $createMethodResult = $this->database->create($contents);
        $this->assertNotNull($createMethodResult);
        $this->assertTrue(is_array($createMethodResult));
    }
}