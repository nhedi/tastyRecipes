<?php

namespace Tasty\Integration;

/**
 * This CommentDAO handels all comment data in the database
 */

class CommentDAO {
    
    private $commentFile;
    private $copy;
    
    /**
     * This method stores the $comment and it's data ($timestamp, $username) on the the specified $recPage in the database.
     * @param $timestamp
     * @param $username
     * @param $comment
     * @param $recPage
     */    
    public function storeNewComment($timestamp, $username, $comment, $recPage) {
        if($recPage === "meatballs") {
           $commentFile = fopen("classes/Tasty/Database/commentsMeatballs.txt", "a") or die("Unable to open commentfile for storing!");
        }else{
            $commentFile = fopen("classes/Tasty/Database/commentsPancakes.txt", "a") or die("Unable to open commentfile for storing!");
        }
        fwrite($commentFile, "\n". $timestamp. "\n". $username. "\n". $comment);
        fclose($commentFile);
    }  
        
    /**
     * This method returns all comments in a $commentArray of the specified $recPage
     * @param $recPage
     * @return $commentArray
     */ 
    public function getCommentFile($recPage) {
        if($recPage === 0) {
            $commentFile = fopen("classes/Tasty/Database/commentsMeatballs.txt", "r") or die("Unable to open commentfile for getting!");
        }else{
            $commentFile = fopen("classes/Tasty/Database/commentsPancakes.txt", "r") or die("Unable to open commentfile for getting!");
        }

        $commentArray = array();
        
        while(!feof($commentFile)) {
            $id = fgets($commentFile);
            array_push($commentArray, $id);
            $u = fgets($commentFile);
            array_push($commentArray, $u);
            $c = fgets($commentFile);
            array_push($commentArray, $c);
        }
        fclose($commentFile);
        return $commentArray;
    }
    
    /**
     * This method deletes the comment on the the $recPage with the specified $timestamp
     * @param $timestamp
     * @param $recPage
     */     
    public function deleteComment($timestamp, $recPage) {
        if($recPage === 0) {
            $c = copy("classes/Tasty/Database/commentsMeatballs.txt", "classes/Tasty/Database/copyMeatballs.txt");
            $copy = fopen("classes/Tasty/Database/copyMeatballs.txt", "r") or die("Unable to open comments copy file!");
            $commentFile = fopen("classes/Tasty/Database/commentsMeatballs.txt", "a") or die("Unable to open empty comments file!");
            file_put_contents('classes/Tasty/Database/commentsMeatballs.txt', '');
        }else{
            $c = copy("classes/Tasty/Database/commentsPancakes.txt", "classes/Tasty/Database/copyPancakes.txt");
            $copy = fopen("classes/Tasty/Database/copyPancakes.txt", "r") or die("Unable to open comments copy file!");
            $commentFile = fopen("classes/Tasty/Database/commentsPancakes.txt", "a") or die("Unable to open empty comments file!");
            file_put_contents('classes/Tasty/Database/commentsPancakes.txt', '');
        }
                     
        while(!feof($copy)) {
            $id = fgets($copy);
            $u = fgets($copy);
            $c = fgets($copy);

            if(trim($timestamp) !== trim($id)) {
                fwrite($commentFile, $id. $u. $c);
            }
        }
        fclose($commentFile); 
        fclose($copy);
    }
}