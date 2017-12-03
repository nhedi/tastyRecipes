<?php

/**
 *
 * do_addComment.php checks if a comment was added and sends this to the Controller for storing in the correct
 * comment file. The same recipe page that was commented on is included and the user can immediately see 
 * that his/her comment was added.
 *
 */
namespace Tasty\View;
use Tasty\Controller\Controller;
require_once 'resources/fragments/init.php';

$recPage = $_POST['page'];

if(empty($_POST['comment'])) {
    if($recPage === 'meatballs') {
        include 'show_meatballs.php';
    }else{
        include 'show_pancakes.php';
    }
}

elseif(isset($_POST['comment']) && ctype_print($_POST['comment'])) {
    if(!empty($_POST['comment'])) {
        $username = $_SESSION['user'];
        $comment = htmlentities(trim($_POST['comment']), ENT_QUOTES);
        $contr = Controller::getController();
        $contr->addComment($_POST['timestamp'], $username, $comment, $recPage);
    
        if($recPage === 'meatballs') {
            include 'show_meatballs.php';
        }else{
            include 'show_pancakes.php';
        }
    }else{
        if($recPage === 'meatballs') {
            include 'show_meatballs.php';
        }else{
            include 'show_pancakes.php';
        }
    }
}else{
    if($recPage === 'meatballs') {
        include 'show_meatballs.php';
    }else{
        include 'show_pancakes.php';
    }
}
