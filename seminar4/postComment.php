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
    
if ($page === 0) {$recPage = "meatballs";}
else{$recPage = "pancakes";}

$t = time("Y-m-d h:i:sa");
$comment = $_POST['com'];
$username = $_SESSION['user'];

$contr = Controller::getController();
$contr->addComment($t, $username, $comment, $recPage);