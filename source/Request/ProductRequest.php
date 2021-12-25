<?php

namespace Source\Request;

use Source\Core\FormRequest;

class ProductRequest extends FormRequest
{

    public function attributes(){

        if(isset($this->value)){
            $this->value = format_money($this->value);
        }
    }

    public function rules()
    {

        switch ($this->method) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string','unique:name,product'],
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required', 'string','unique:name,product,' . $this->id .',id'],
                ];
            }
            default:
                break;
        }
    }
}