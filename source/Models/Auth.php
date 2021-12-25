<?php

namespace Source\Models;

use Source\Core\Session;
use Source\Request\AuthRequest;

class Auth
{


    public static function auth(): User|null
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }
        return User::find($session->authUser);
    }

    /**
     * log-out
     */
    public static function logout(): void
    {
        $session = new Session();
        $session->unset("authUser");
        if(isset($_COOKIE['authUser'])){
            unset($_COOKIE['authUser']);
        }
    }

    /**
     * @param array $credentials
     * @param bool $save
     * @return bool
     */
    public static function attempt(array $credentials, bool $save = false): bool
    {
        $credentials = (object)$credentials;
        $user = (new User)->where("email",$credentials->email)->fetch();
        if (!$user) {
            session()->set("message","O usuario informado não está cadastrado");
            return false;
        }

        if (!password_verify($credentials->password, $user->password)) {
            session()->set("message","A senha informada não confere");
            return false;
        }

        if ($save) {
            setcookie("authUser", base64_encode($user->id), time() + 604800, "/");
        } else {
            setcookie("authUser", null, time() - 3600, "/");
        }

        //LOGIN
        (new Session())->set("authUser", $user->id);
        return true;
    }

}
