<?php

/**
 *
 * get_usercom.php gets the recipe comments for the correct recipe page.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

//\set_time_limit(0);

$recPage = $_SESSION['page'];

//$timestamp = $_GET['timestamp'];
$contr = Controller::getController();
$commentArray = $contr->getComments($recPage);
//$commentArray = $contr->getComments($timestamp, $recPage, true);

echo \json_encode($commentArray);
