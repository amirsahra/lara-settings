<?php

namespace Amirsahra\LaraSetting\Core\Creator;

use Amirsahra\LaraSetting\Core\Contracts\Createable;
use Amirsahra\LaraSetting\Core\Traits\HasContentsValidation;
use Amirsahra\LaraSetting\Facades\LaraSetting;

class LaraSettingDefaultData implements Createable
{
    use HasContentsValidation;

    /**
     * @throws \Amirsahra\LaraSetting\Core\Exceptions\ContentsKeysNotExists
     * @throws \Amirsahra\LaraSetting\Core\Exceptions\ContentsValuesIsEmpty
     */
    public function run(int $number = null)
    {
        $contents = config('larasetting.default_settings_contents');
        foreach ($contents as $content) {
            (array_key_exists('description', $content)) ?: $content['description'] = '';
            array_key_exists('is_active', $content) || ($content['is_active'] = true);
            $this->validation($content);
            LaraSetting::set($content['name'], $content['value'], $content['description'], $content['is_active']);
        }
    }
}