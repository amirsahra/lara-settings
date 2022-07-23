<?php

use Amirsahra\LaraSetting\Core\Exceptions\ContentsKeysNotExists;
use Amirsahra\LaraSetting\Core\Exceptions\ContentsValuesIsEmpty;
use Amirsahra\LaraSetting\Core\Traits\HasContentsValidation;
use Tests\TestCase;

class HasContentsValidationTraitTest extends TestCase
{
    public function testValidationMethodWithInvalidKeyContentsAndShouldThrowException()
    {
        $this->expectException(ContentsKeysNotExists::class);
        $trait = $this->getObjectForTrait(HasContentsValidation::class);
        $contents = ['user_id'=>1,'value'=>'value'];
        $trait->validation($contents);
    }

    public function testValidationMethodWithEmptyValueContentsAndShouldThrowException()
    {
        $this->expectException(ContentsValuesIsEmpty::class);
        $trait = $this->getObjectForTrait(HasContentsValidation::class);
        $contents = ['user_id'=>'','name'=>'','value'=>'value'];
        $trait->validation($contents);
    }
}