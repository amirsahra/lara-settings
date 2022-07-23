<?php

namespace Amirsahra\LaraSetting\Core\Creator;

use Amirsahra\LaraSetting\Core\Contracts\Createable;
use Amirsahra\LaraSetting\Databases\Models\LaraSetting;
use Faker\Factory as Faker;

class LaraSettingFakeData implements Createable
{

    public function run(int $number = null)
    {
        $faker = Faker::create();
        for ($i = 0; $i < $number; $i++) {
            $this->insertToLaraSettingDatabase($faker);
        }
    }

    private function insertToLaraSettingDatabase($faker)
    {
        LaraSetting::create([
            'name' => $faker->unique()->name,
            'value' => $faker->lastName,
            'description' => $faker->text(15),
            'is_active' => true,
        ]);
    }
}