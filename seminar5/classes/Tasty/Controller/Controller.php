<?php

namespace Tasty\Controller;

use Tasty\Model\UserHandler;
use Tasty\Model\CommentHandler;
use Tasty\DTO\LoginData;
use Tasty\DTO\User;
use Tasty\DTO\Comment;

/**
 * This is the applications controller. All calls from the view pass through here.
 */

class Controller {
    private const CONTROLLER_KEY = 'controller';
    private $username;
    
    /**
     * This method checks if a user can be logged in
     * @param $username
     * @param $password
     * @return $loginStatus true or false
     */ 
    public function loginUser($username, $password) {
        $userHandler = new UserHandler();
        $loginStatus = $userHandler->authorizeUser(new LoginData($username, $password));
        if($loginStatus) {
            $this->username = $username;
        }
        return $loginStatus;
    }
    
    /**
     * This method checks if a user can be registered
     * @param $username
     * @param $password
     * @return $registerStatus true or false
     */  
    public function registerUser($username, $password) {
        $userHandler = new UserHandler();
        $registerStatus = $userHandler->registerUser(new User($username, $password));
        return $registerStatus;
    }
    
    /**
     * This method adds the $comment on the the $recPage with the specified $timestamp and $username
     * @param $timestamp
     * @param $username
     * @param $comment
     * @param $recPage
     */    
    public function addComment($timestamp, $username, $comment, $recPage) {
        $commentHandler = new CommentHandler();
        $commentHandler->addComment(new Comment($timestamp, $username, $comment, $recPage));
    }
    
    /**
     * This method deletes the comment on the the $recPage with the specified $timestamp
     * @param $timestamp
     * @param $recPage
     */
    public function deleteComment($timestamp, $recPage, $username) {
        $commentHandler = new CommentHandler();
        $commentHandler->deleteComment($timestamp, $recPage, $username);
    }
    
    /**
     * This method returns all comments in a $commentArray of the specified $recPage
     * @param $recPage
     * @return $commentArray
     */
    public function getComments($recPage) {
    //public function getComments($lastReadTime, $recPage, $blocking) {
        $commentHandler = new CommentHandler();
        $commentArray = $commentHandler->getComments($recPage);
        //$commentArray = $commentHandler->getComments($lastReadTime, $recPage, $blocking);
        return $commentArray;
    }
    
    /**
     * @return The users username.
     */
    public function getUsername() {
        return $this->username;
    }
    
    /**
     * If there is a controller object in the current session, it is returned. If there is not,
     * a new controller is instantiated and returned.
     * 
     * @return \Tasty\Controller\Controller the controller.
     */
    public static function getController() {
        if (isset($_SESSION[self::CONTROLLER_KEY])) {
            return unserialize($_SESSION[self::CONTROLLER_KEY]);
        } else {
            return new Controller();
        }
    }

    /**
     * The specified controller instance is stored in the current session.
     */
    public function __destruct() {
        $_SESSION[self::CONTROLLER_KEY] = serialize($this);
    }
}

