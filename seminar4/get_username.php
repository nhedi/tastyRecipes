<?php

/**
 *
 * get_username.php gets the username in a JSON format.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$contr = Controller::getController();
$jsonData = $contr->getUsername();

echo \json_encode($jsonData);