<?php

/**
 *
 * do_deleteComment.php checks if a comment was deleted and sends the timestamp and recipe page 
 * index to the Controller for deleting. The same recipe page where a commet was deleted is included and the 
 * user can immediately see that his/her comment was deleted.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$recPage = $_SESSION['page'];
$timestamp = $_POST['timestamp'];
$username = $_SESSION['user'];

$contr = Controller::getController();
$contr->deleteComment($timestamp, $recPage, $username);