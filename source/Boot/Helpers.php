<?php

use Source\Core\Session;

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;
use Source\Models\Auth;

if (!function_exists('abort')) {

    function abort($message = '')
    {
        session()->set('flash', $message);
        return url_back();
    }
}


/**
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 * @return \Pecee\Http\Response
 */
function response(): Response
{
    return Router::response();
}

/**
 * @return \Pecee\Http\Request
 */
function request(): Request
{
    return Router::request();
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param string|mixed|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return \Pecee\Http\Input\InputHandler|array|string|null
 */
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 * @param string $url
 * @param int|null $code
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}


function str_search(?string $search): string
{
    $search = preg_replace("/[^a-z0-9A-Z\@\ ]/", "", $search);
    return $search;
}

/**
 * URL_BACK
 * @return string
 */
function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
}
/**
 * walks to the content of the view
 */
/**
 * theme
 * @return string
 */
function theme(string $path = null,$theme =  CONF_VIEW_THEME): string
{
    if ($path) {
        return CONF_URL . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL . "/themes/{$theme}";
}

if (!function_exists('csrf_field')) {

    function csrf_field()
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '" />';
    }
}


if (!function_exists('csrf_token')) {

    function csrf_token()
    {
        $session = new Session();
        $session->csrf();
        if (isset($session->csrf_token)) {
            return $session->csrf_token;
        }

        throw new Exception('Application session store not set.');
    }
}

if (!function_exists('csrf_verify')) {

    /**
     * @param $request
     * @return bool
     */
    function csrf_verify($request): bool
    {
        $session = new \Source\Core\Session();
        if (empty($session->csrf_token) || $request != $session->csrf_token) {
            return false;
        }
        return true;
    }
}

if (!function_exists('session')) {

    function session()
    {
        return new Session();
    }
}

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!function_exists("errors_validation")) {

    function errors_validation()
    {

        if (session()->has('errors')) {
            $errors = session()->errors;
            session()->unset("error");
            foreach ($errors as $key => $value) {
                echo "<p  class='text-dark'>{$value[0]}</p>";
            }
            return;
        }

        if(session()->has('message')){
            $message = session()->message;
            session()->unset("message");
            return "<p  class='text-dark'>{$message}</p>";
        }
    }
}


if(!function_exists('errors')){

    function errors() {
        $errors = session()->errors;
        session()->unset("errors");
        return $errors;
    }
}

if(!function_exists('tokenEmailVerification')) {

    function tokenEmailVerification($email): bool|string
    {
        return  hash("sha256", base64_encode($email));
    }
}


/**
 * ####################
 * ###   PASSWORD   ###
 * ####################
 */

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }
    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

function auth(): ?\Source\Models\User
{
    return Auth::auth();
}

function name($name): string
{
    $name = explode(' ', $name);
    return $name[0];
}

