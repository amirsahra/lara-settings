<?php

namespace Amirsahra\LaraSetting\Core\Traits;

use Amirsahra\LaraSetting\Core\Exceptions\ContentsKeysNotExists;
use Amirsahra\LaraSetting\Core\Exceptions\ContentsValuesIsEmpty;

trait HasContentsValidation
{
    /**
     * @throws ContentsKeysNotExists
     * @throws ContentsValuesIsEmpty
     */
    public function validation(array $contents)
    {
        if (!$this->contentsKeysExists($contents))
            throw new ContentsKeysNotExists();
        if (!$this->contentsValuesIsNotEmpty($contents))
            throw new ContentsValuesIsEmpty();
    }

    private function contentsValuesIsNotEmpty(array $contents): bool
    {
        $isNotEmpty = true;
        if (empty(trim($contents['name'])))
            $isNotEmpty = false;
        if (empty(trim($contents['value'])))
            $isNotEmpty = false;
        return $isNotEmpty;
    }

    private function contentsKeysExists(array $contents): bool
    {
        $isExists = true;
        $validKeys = ['name', 'value'];
        foreach ($validKeys as $key) {
            if (!array_key_exists($key, $contents)) {
                $isExists = false;
                break;
            }
        }
        return $isExists;
    }
}