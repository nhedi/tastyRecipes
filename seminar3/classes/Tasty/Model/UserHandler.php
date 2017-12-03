<?php

namespace Tasty\Model;

use Tasty\Integration\UserDAO;
use Tasty\DTO\LoginData;
use Tasty\DTO\User;

/**
 * This UserHandler handels all requests regarding users
 */

class UserHandler {
    
    /**
     * This method checks if a user can be logged in with the specified $userLoginData
     * @param $userLoginData
     * @return $loginStatus true or false
     */ 
    public function loginUser(LoginData $userLoginData) {
        $userDAO = new UserDAO();
        $userFile = $userDAO->getUserFile();
        
        $trim = trim($userLoginData->getPassword());
        
        while(!feof($userFile)) {
            if(trim(fgets($userFile)) === $userLoginData->getUsername()) {
                $filePW = trim(fgets($userFile));
				if(password_verify($trim, $filePW)) {
                    session_regenerate_id();
				    $_SESSION["user"] = $userLoginData->getUsername();
                    return true;
				}
            }
            fgets($userFile);
            fgets($userFile);
        }
        
        if(fgets($userFile) ===  false) {
            return false;
        }
        $userDAO->closeUserFile(); 
    }
    
    /**
     * This method checks if a user can be registered with the specified $userRegData
     * @param $userRegData
     * @return $registerStatus true or false
     */
    public function registerUser(User $userRegData) {
        $userDAO = new UserDAO();
        $userFile = $userDAO->getUserFile();
        
        $hashPW = password_hash(trim($userRegData->getPassword()), PASSWORD_DEFAULT);
        
        while(!feof($userFile)) {
            if(trim(fgets($userFile)) === $userRegData->getUsername()) {
                return false;
            }
            fgets($userFile);
            fgets($userFile);
        }

        if(fgets($userFile) ===  false) {
            $txt = PHP_EOL . $userRegData->getUsername();
            fwrite($userFile, $txt);
            $txt = PHP_EOL . $hashPW;
            fwrite($userFile, $txt);
            $txt = PHP_EOL . "end";
            fwrite($userFile, $txt);
            return true;
        }
        $userDAO->closeUserFile(); 
    }    
}   