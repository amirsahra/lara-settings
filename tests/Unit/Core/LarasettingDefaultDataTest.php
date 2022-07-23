<?php

use Amirsahra\LaraSetting\Core\Contracts\Createable;
use Amirsahra\LaraSetting\Core\Creator\LaraSettingDefaultData;
use Tests\TestCase;

class LarasettingDefaultDataTest extends TestCase
{
    public function testLarasettingDefaultDataImplementsCreateableInterface()
    {
        $databaseCore = new LaraSettingDefaultData();
        $this->assertInstanceOf(Createable::class, $databaseCore);
    }

    public function testDefaultSettingFeatureHasBooleanValue()
    {
        $defaultDataFeature = config('larasetting.default_settings_feature');
        $this->assertTrue(is_bool($defaultDataFeature));
    }

}