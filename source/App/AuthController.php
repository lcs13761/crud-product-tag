<?php


namespace Source\App;

use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\GoogleUser;
use Pecee\Http\Input;
use Pecee\Http\Request;
use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Auth;
use Source\Models\User;
use Source\Request\AuthRequest;
use Source\Support\Oauth2\GoogleAuth;
use Source\Support\Validate;
use Webmozart\Assert\Assert;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::auth()) redirect("/");

        return $this->view->render("web/auth-login");
    }

   final public function login(): void
    {
        if (Auth::auth()) redirect("/");

        $request = new AuthRequest();
        if (!$request->validation()) redirect(abort("error"));
        $auth = Auth::attempt($request->all(),$request->remember);
        if (!$auth) redirect("/login");
        redirect(url('dash.index'));
    }

    public function logout():void
    {
        Auth::logout();
        redirect("/login");
    }
}
