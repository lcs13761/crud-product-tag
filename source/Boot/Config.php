<?php


define("CONF_DB_HOST","mysql");
define("CONF_DB_USER","root");
define("CONF_DB_NAME","project");
define("CONF_DB_PASSWD","root");

define("CONF_URL","http://localhost");

/**
 * View
 */
define("CONF_VIEW_PATH" , "/../../shared/view");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "web");
define("CONF_VIEW_ADMIN", "admin");


/**
 * Passoword
 */

define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);