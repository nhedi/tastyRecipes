<?php

namespace Tasty\Integration;

/**
 * This CommentDAO handels all comment data in the database
 */

class CommentDAO {
    
    private $servername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $databaseName = "tastyRecipes";
    private $page;
    private $connection;
    
    public function __construct($recPage) {
        $this->page = trim($recPage);
        $this->connection = mysqli_connect($this->servername, $this->dbUsername, $this->dbPassword, $this->databaseName);
        
        if(!$this->connection) {
            die("Connection to database failed: " . mysqli_connect_error);
        } else {
            mysqli_set_charset($connection, 'utf8');
        }
    }    
    
    /**
     * This method stores the $comment and it's data ($timestamp, $username) for the current recipe page in the database.
     * @param $timestamp
     * @param $username
     * @param $comment
     */    
    public function storeNewComment($timestamp, $username, $comment) {
        if ($this->page == 0) {
            $sql = "INSERT INTO Comments(page, comment, username, timestamp) VALUES ('meatballs', '$comment', '$username', '$timestamp')";
        } else {
            $sql = "INSERT INTO Comments(page, comment, username, timestamp) VALUES ('pancakes', '$comment', '$username', '$timestamp')";
        }
        mysqli_query($this->connection, $sql);
    }

    /**
     * This method returns all comments in a $commentArray of the current recipe page
     * @return $commentArray
     */ 
    public function getCommentArray() {
        $commentArray = array();
        
        if ($this->page == 0) {
            $sql = "SELECT * FROM Comments WHERE page = 'meatballs' ORDER BY timestamp";
        } else {
            $sql = "SELECT * FROM Comments WHERE page = 'pancakes' ORDER BY timestamp";
        }
        
        $result = $this->connection->query($sql);
        $rows = $result->num_rows;
        
        for($i=1; $i<=$rows; $i++) {
            $row = mysqli_fetch_assoc($result);
            array_push($commentArray, $row["username"]);
            array_push($commentArray, $row["comment"]);
            array_push($commentArray, $row["timestamp"]);
        }
        return $commentArray;
    }
    
    /**
     * This method deletes the comment on the current recipe page with the specified $timestamp
     * and $username
     * @param $timestamp
     * @param $username
     */     
    public function deleteComment($timestamp, $username) {
        if ($this->page == 0) {
            $sql = "DELETE FROM Comments WHERE username = '$username' AND timestamp = '$timestamp' AND page = 'meatballs'";
        } else {
            $sql = "DELETE FROM Comments WHERE username = '$username' AND timestamp = '$timestamp' AND page = 'pancakes'";
        }
        mysqli_query($this->connection, $sql);
    }
    
    
    /**
     * Blocks until there are comments newer than $last_read_time. The session store is closed while
     * sleeping to allow other requests to access session variables.
     * 
     * @param int $lastReadTime The last time an entry was read. Entries with timestamps
     * bigger than this have not been read.
     */
    private function waitForNewComment($lastReadTime) {
        while ($this->lastUpdateTime() <= $lastReadTime /*|| $this->convNotStarted($lastReadTime)*/) {
            \session_write_close();
            sleep(1);
            \session_start();
        }
    }

    private function lastUpdateTime() {
        \clearstatcache();
        return \filemtime($this->commentFile);
    }
    
    private function convNotStarted($readTime) {
        \clearstatcache();
        return $readTime == 0/* && \filesize($this->commentFile) == 0*/;
    }
}