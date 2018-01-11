<?php

/**
 *
 * postComment.php checks if a comment was added and sends this to the Controller for storing in the correct
 * comment file. The same recipe page that was commented on is included and the user can immediately see 
 * that his/her comment was added.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$page = $_SESSION['page'];
$t = date("Y-m-d-h-i-s-a", time());
$comment = $_POST['com'];
$username = $_SESSION['user'];

$contr = Controller::getController();
$contr->addComment($t, $username, $comment, $recPage);