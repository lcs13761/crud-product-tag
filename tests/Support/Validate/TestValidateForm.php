<?php

namespace Support\Validate;

use PHPUnit\Framework\TestCase;
use TestValidate;

class TestValidateForm extends TestCase
{
    private array $validator = array();

    public function testRequest()
    {
        $request = ['email' => 'lcs','password' => ''];

        $validatorTest = ['email' => ['required','email','unique:email,user,1,id'],'password' => 'required'];
        $this->assertEquals(['email' => []],  $this->make($request, $validatorTest));
    }


    public function make(array $request, array $validatorTest)
    {
        foreach ($validatorTest as $key => $value) {
            $this->assertEquals(false, !array_key_exists($key, $request));
            if (!array_key_exists($key, $request)) {
                $this->assertEquals('', $this->notFound($key));
                break;
            }

            if(is_array($value)){
                if(in_array("required", $value)) $this->required($request[$key],$key);
                if (in_array("email", $value))  $this->email($request[$key], $key);
                if (in_array("numeric", $value))  $this->numeric($request[$key], $key);
                if (in_array("string", $value))  $this->string($request[$key], $key);
                foreach ($value as $valueValidated){
                    if (str_contains($valueValidated, "unique:")) $this->assertEquals(true ,$this->unique($valueValidated, $request[$key], $key));
                }
            }
        }
    return $this->validator;
    }

    private  function notFound($key): void
    {
        $this->validator[$key] = 'não foi passado.';
        $message[$key] = "{$key} não foi passado.";
        //session()->set("validate", $message);
    }


    private function required(string $value, string $key)
    {

        if(empty($value)){
            $this->validator[$key]['required'] =  "is required";
            $message[$key] = $key . "is required";

           // session()->set("validate", $message);
        }

    }


    private function email(string $value, string $key): void
    {

        if (false === \filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validator[$key]['email'] =  "Invalid Email";
            $message[$key] = "Invalid Email";
            //session()->set("validate", $message);
        }
    }

    private function numeric($value, string $key): void
    {

        if (!is_numeric($value)) {
            $this->validator[$key]['numeric'] =  "Invalid Number";
            $message[$key] = "Invalid Number";
           // session()->set("validate", $message);
        }
    }

    private function string(string $value, string $key): void
    {
        if (!is_string($value)) {
            $this->validator[$key]['string'] = "Invalid type string";
            $message[$key] = "Invalid type string";
           // session()->set("validate", $message);
        }
    }

    private  function unique(string $uniqueValidateValue, string $valueRequest, string $key)
    {
        $array = explode(":", $uniqueValidateValue);
        $valuesCheck = explode(",", $array[1]);
        $column = $valuesCheck[0];
        if(count($valuesCheck) > 2){
            $valueVerification = $valuesCheck[2];
            $columnVerification = $valuesCheck[3];
        }
        $model = 'Source\Models\\' . ucfirst($valuesCheck[1]);
        $this->assertEquals('Source\Models\User',$model);

        if (class_exists($model)) {
            $model = new $model();
            if(count($valuesCheck) > 2){
//                $this->assertEquals('', $model->where($column, $value)->orWhere($columnVerification,$valueVerification,'!=')->query);
                $exists = $model->where($column, $valueRequest)->orWhere($columnVerification,$valueVerification,'!=')->count();
            }else{
                $exists = $model->where($column, $valueRequest)->count();
            }

            $this->assertCount(10,$exists);

            if ($exists > 0) {
                $this->validator[$key] = " indiponivel";
                $message[$key] = $key . " indiponivel";
              //  session()->set("validate", $message);
            }
        }
        return true;
    }

}
