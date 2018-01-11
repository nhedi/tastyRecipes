<?php

/**
 *
 * do_register.php passes the given $username and it's corresponding $password to the controller for validation.
 * User is then directed to reg_redirection.php.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$username = htmlentities($_POST["username"], ENT_QUOTES);
$password = htmlentities($_POST["password"], ENT_QUOTES);
$regStatus;

if(empty($_POST["username"]) && empty($_POST["password"])) {
    $regStatus = "tryagain";
    include 'views/reg_redirection.php';
    return;
}

elseif(isset($_POST["username"]) && isset($_POST["password"]) && ctype_print($_POST["username"]) && ctype_print($_POST["password"])) {
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $contr = Controller::getController();
        $regStatus = $contr->registerUser($username, $password);
        $registeredUser = $username;
    
        include 'views/reg_redirection.php';
    }else{
        $regStatus = "tryagain";
        include 'views/reg_redirection.php';
    }
}else{
    $regStatus = "tryagain";
    include 'views/reg_redirection.php';
}