<?php

/**
 *
 * do_login.php passes the given $username and it's corresponding $password to the Controller for validation.
 * User is then directed to login_redirection.php.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$username = htmlentities($_POST["username"], ENT_QUOTES);
$password = htmlentities($_POST["password"], ENT_QUOTES);
$loginStatus;

if(empty($_POST["username"]) && empty($_POST["password"])) {
    $loginStatus = "tryagain";
    include 'views/login_redirection.php';
    return;
}

elseif(isset($_POST["username"]) && isset($_POST["password"]) && ctype_print($_POST["username"]) && ctype_print($_POST["password"])) {
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $contr = Controller::getController();
        $loginStatus = $contr->loginUser($username, $password);
        $loggedinUser = $contr->getUsername();
        include 'views/login_redirection.php';
    }
}else{
    $loginStatus = "tryagain";
    include 'views/login_redirection.php';
}