<?php

namespace Source\App\Web;

use Source\Core\Controller;
use Source\Models\User;
use Source\Request\UserRequest;
use Source\Support\Event;

class UserController extends Controller
{


    public function create()
    {
        return $this->view->render("web/auth-register");

    }

    /**
     * @var UserRequest $request
     */

    public function store(): void
    {
        $request = new UserRequest();
        if (!$request->validation()) redirect(abort("error"));
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => passwd($request->password)
        ]);
        redirect(url('login'));
    }
}
