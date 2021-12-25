<?php

namespace Source\Request;

use Source\Core\FormRequest;

class TagRequest extends FormRequest
{

    public function rules()
    {
        switch ($this->method) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string','unique:name,tag']
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required', 'string','unique:name,tag,' . $this->id .',id'],
                ];
            }
            default:
                break;
        }
    }

}