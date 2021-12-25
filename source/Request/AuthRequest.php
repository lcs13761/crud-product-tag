<?php

namespace Source\Request;

use Source\Core\FormRequest;

class AuthRequest extends FormRequest
{
    public function attributes(){
        if(isset($this->remember)){
            $this->remember = true;
        }else{
            $this->remember = false;
        }
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

}