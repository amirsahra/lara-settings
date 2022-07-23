<?php

namespace Amirsahra\LaraSetting\Utilities;

use Amirsahra\LaraSetting\Core\Creator\LaraSettingFakeData;
use Amirsahra\LaraSetting\Core\Database;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LaraSettingTestUtility extends TestCase
{
    const NUMBER_TEMPORARY_RECORDS = 5;

    protected $database;
    private $fakeData;

    protected function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->database = new Database();
        $this->fakeData = new LaraSettingFakeData();
    }

    public function tearDown()
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function insertTemporarySettings(int $numberTemporaryRecords = null)
    {
        $this->fakeData->run(($numberTemporaryRecords) ?? self::NUMBER_TEMPORARY_RECORDS);
    }

    public function insertSetting(string $name, string $value = 'value', string $des = '', bool $isActive = true)
    {
        return $this->database->create([
            'name' => $name,
            'value' => $value,
            'description' => $des,
            'is_active' => $isActive,
        ]);
    }

    public function updateSetting(string $settingName, string $name, string $value = 'value', string $des = '', bool $isActive = true)
    {
        return $this->database->update($settingName, [
            'name' => $name,
            'value' => $value,
            'description' => $des,
            'is_active' => $isActive,
        ]);
    }


}