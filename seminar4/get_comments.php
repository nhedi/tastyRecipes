<?php

/**
 *
 * get_comments.php gets the recipe comments for the correct recipe page.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$recPage = $_SESSION['page'];
$contr = Controller::getController();
$commentArray = $contr->getComments($recPage);
//$commentArray = $contr->getComments(0, $recPage, true);
$username = $contr->getUsername();