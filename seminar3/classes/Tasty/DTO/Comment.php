<?php

namespace Tasty\DTO;

/**
 * This Comment holds information of a comment
 */

class Comment {
    
    private $timestamp;
    private $username;
    private $comment;
    private $recPage;
    
    /**
     * Assigns comment data
     */
    public function __construct($timestamp, $username, $comment, $recPage) {
        $this->timestamp = $timestamp;
        $this->username = $username;
        $this->comment = $comment;
        $this->recPage = $recPage;
    }
    
    public function getTimestamp() {
        return $this->timestamp;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getComment() {
        return $this->comment;
    }

    public function getRecPage() {
        return $this->recPage;
    }
}