<?php

namespace Request;
require __DIR__ . "/../Validate/TestValidateForm.php";

use JetBrains\PhpStorm\ArrayShape;
use PHPUnit\Framework\TestCase;
use Support\Validate\TestValidateForm;


class TestRequestUser extends TestCase
{


    public function testValue()
    {
        $request = ['name' => '123'];
        $this->assertEquals([], (new TestValidateForm())->make($request,$this->requestVerification()));
    }

    #[ArrayShape(['name' => "string[]"])] public function requestVerification()
    {
        $method = "POST";
        switch ($method) {
            case 'POST':
            {
                return [
                    'name' => ['string'],
                ];
            }
        }

    }


}
