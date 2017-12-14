<?php

namespace Tasty\Integration;

/**
 * This UserDAO handels all user data in the database
 */

class UserDAO {
    
    private $userFile;
    
    public function getUserFile() {
        $userFile = fopen("classes/Tasty/Database/users.txt", "r+") or die("Unable to open userfile!");
        return $userFile;
    }
    
    public function closeUserFile() {
        fclose($userFile); 
    }
}