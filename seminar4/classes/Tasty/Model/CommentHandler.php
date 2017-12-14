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
        $commentDAO = new CommentDAO();
        $commentDAO->storeNewComment($commentData->getTimestamp(), $commentData->getUsername(), $commentData->getComment(), $commentData->getRecPage());
    }
    
    /**
     * This method deletes the comment on the the $recPage with the specified $timestamp
     * @param $timestamp
     * @param $recPage
     */    
    public function deleteComment($timestamp, $recPage) {
        $commentDAO = new CommentDAO();
        $commentDAO->deleteComment($timestamp, $recPage);
    }

    /**
     * This method returns all comments in a $commentArray of the specified $recPage
     * @param $recPage
     * @return $commentArray
     */ 
    public function getComments($recPage) {
    //public function getComments($lastReadTime, $recPage, $blocking) {    
        $commentDAO = new CommentDAO();
        $commentArray = $commentDAO->getCommentFile($recPage);
        //$commentArray = $commentDAO->getCommentFile($lastReadTime, $recPage, $blocking);
        return $commentArray;
    }
}   