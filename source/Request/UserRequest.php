<?php

namespace Source\Request;

use Source\Core\FormRequest;

class UserRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:email,user'],
            'password' => ['required','confirmed']
        ];
    }


}