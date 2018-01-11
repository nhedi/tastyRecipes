<?php

namespace Tasty\Model;

use Tasty\Integration\CommentDAO;
use Tasty\DTO\Comment;

/**
 * This CommentHandler handels all requests regarding comments
 */

class CommentHandler {
    
    /**
     * This method adds the comment on the the specified recipe page.
     * @param $commentData to be added
     */  
    public function addComment(Comment $commentData) {
        $commentDAO = new CommentDAO($recPage);
        echo $commentData->getUsername();
        $commentDAO->storeNewComment($commentData->getTimestamp(), $commentData->getUsername(), $commentData->getComment());
    }
    
    /**
     * This method deletes the comment on the current $recPage with the specified $timestamp and
     * $username
     * @param $timestamp
     * @param $recPage
     * @param $username
     */    
    public function deleteComment($timestamp, $recPage, $username) {
        $commentDAO = new CommentDAO($recPage);
        $commentDAO->deleteComment($timestamp, $username);
    }

    /**
     * This method returns all comments in a $commentArray of the specified $recPage
     * @param $recPage
     * @return $commentArray
     */ 
    public function getComments($recPage) {
    //public function getComments($lastReadTime, $recPage, $blocking) {    
        $commentDAO = new CommentDAO($recPage);
        $commentArray = $commentDAO->getCommentArray();
        //$commentArray = $commentDAO->getCommentFile($lastReadTime, $recPage, $blocking);
        return $commentArray;
    }
}   