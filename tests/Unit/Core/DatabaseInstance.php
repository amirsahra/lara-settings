<?php

use Amirsahra\LaraSetting\Core\Contracts\Setting;
use Amirsahra\LaraSetting\Core\Database;
use Tests\TestCase;

class DatabaseInstance extends TestCase
{
    public function testDatabaseCoreImplementsSettingsInterface()
    {
        $databaseCore = new Database();
        $this->assertInstanceOf(Setting::class, $databaseCore);
    }
}